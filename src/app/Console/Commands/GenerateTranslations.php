<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateTranslations extends Command
{
    protected $signature = 'translations:generate 
                            {--source=fr : Source language code}
                            {--targets=en,ar,es,pt : Comma-separated target languages}
                            {--api-url=http://127.0.0.1:9000/translate : Translation API endpoint}';

    protected $description = 'Generate translation files with normalized spaces';

    protected $supportedLanguages = [
        'fr' => 'français',
        'ar' => 'arabic',
        'es' => 'spanish',
        'pt' => 'portuguese',
        'en' => 'english',
        'zh' => 'chinese'
    ];

    public function handle()
    {
        $sourceLang = $this->option('source');
        $targetLangs = explode(',', $this->option('targets'));
        $apiUrl = $this->option('api-url');

        // Validate languages
        if (!array_key_exists($sourceLang, $this->supportedLanguages)) {
            $this->error("Unsupported source language: {$sourceLang}");
            return 1;
        }

        foreach ($targetLangs as $lang) {
            if (!array_key_exists($lang, $this->supportedLanguages)) {
                $this->error("Unsupported target language: {$lang}");
                return 1;
            }
        }

        $this->info("Extracting translatable text from source code...");

        // Extract and normalize text
        $translations = [];
        $translations = array_merge($translations, $this->extractFromViews());
        $translations = array_merge($translations, $this->extractFromJs());
        
        // Normalize spaces and remove duplicates
        $translations = array_unique(array_map([$this, 'normalizeSpaces'], $translations));

        $this->info(sprintf("Found %d unique text strings to translate.", count($translations)));

        // Generate translations
        foreach ($targetLangs as $targetLang) {
            if ($targetLang === $sourceLang) continue;

            $this->info("\nGenerating translations for {$this->supportedLanguages[$targetLang]}...");

            $translated = [];
            $bar = $this->output->createProgressBar(count($translations));

            foreach ($translations as $text) {
                try {
                    $translation = $this->translateText($text, $sourceLang, $targetLang, $apiUrl);
                    $translated[$text] = $this->normalizeSpaces($translation);
                } catch (\Exception $e) {
                    $this->error("\nError translating '{$text}': " . $e->getMessage());
                    $translated[$text] = $text; // Fallback to original
                }

                $bar->advance();
                usleep(200000); // Rate limiting
            }

            $bar->finish();
            $this->saveTranslations($translated, $targetLang);
        }

        $this->info("\n\nTranslation files generated successfully!");
        return 0;
    }

protected function extractFromViews(): array
{
    $translations = [];
    $viewPath = resource_path('views');
    $files = File::allFiles($viewPath);

    foreach ($files as $file) {
        $content = File::get($file);

        // 1. Extract from translation functions
        preg_match_all('/__\(([\'"])(.+?)\1\)|@lang\(([\'"])(.+?)\3\)/', $content, $matches);
        foreach (array_merge($matches[2], $matches[4]) as $text) {
            if (!empty($text)) $translations[] = $this->normalizeSpaces($text);
        }

        // 2. Extract text nodes from elements with translated_text class
        preg_match_all('/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>([^<{]+)<\/\1>/', $content, $matches);
        
        foreach ($matches[3] as $text) {
            // Remove any remaining HTML tags from the content
            $cleanText = strip_tags($text);
            $cleanText = $this->normalizeSpaces($cleanText);
            if (!empty($cleanText)) {
                $translations[] = $cleanText;
            }
        }

        // 3. Extract from attributes in elements with translated_text class
        preg_match_all('/<[a-zA-Z][a-zA-Z0-9]*[^>]*class="[^"]*translated_text[^"]*"[^>]* (title|placeholder|alt)="([^"]+)"/', $content, $matches);
        foreach ($matches[2] as $text) {
            if (!empty($text)) $translations[] = $this->normalizeSpaces($text);
        }
    }

    return array_values(array_unique(array_filter($translations)));
}

protected function normalizeSpaces(string $text): string
{
    $text = preg_replace('/\s+/', ' ', $text);
    return trim($text);
}



    protected function extractFromJs(): array
    {
        $translations = [];
        $jsPath = resource_path('js');

        if (!File::exists($jsPath)) return $translations;

        $files = File::allFiles($jsPath);

        foreach ($files as $file) {
            $content = File::get($file);

            // Match text in JavaScript translation calls
            preg_match_all('/translated_text:\s*[\'"](.+?)[\'"]/', $content, $matches);
            foreach ($matches[1] as $text) {
                if (!empty($text)) $translations[] = $text;
            }

            // Match UI text
            preg_match_all('/text:\s*[\'"](.+?)[\'"]|title:\s*[\'"](.+?)[\'"]/', $content, $matches);
            foreach (array_merge($matches[1], $matches[2]) as $text) {
                if (!empty($text)) $translations[] = $text;
            }
        }

        return $translations;
    }

    protected function translateText(string $text, string $sourceLang, string $targetLang, string $apiUrl): string
    {
        $client = new \GuzzleHttp\Client();
        
        $response = $client->post($apiUrl, [
            'json' => [
                'text' => $text,
                'source_language' => $this->supportedLanguages[$sourceLang],
                'target_language' => $this->supportedLanguages[$targetLang]
            ],
            'timeout' => 10
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['translation'] ?? $text;
    }

protected function saveTranslations(array $translations, string $lang)
{
    $langPath = lang_path($lang);
    File::ensureDirectoryExists($langPath, 0755, true);

    $content = "<?php\n\nreturn [\n";
    
    foreach ($translations as $original => $translation) {
        // Skip empty translations
        if (empty($original)) continue;
        
        $escapedOriginal = $this->escapeForPhp($original);
        $escapedTranslation = $this->escapeForPhp($translation);
        $content .= "    '{$escapedOriginal}' => '{$escapedTranslation}',\n";
    }
    
    $content .= "];\n";
    
    File::put("{$langPath}/generated.php", $content);
    $this->info("\nSaved translations to {$lang}/generated.php");
}

    protected function escapeForPhp(string $text): string
    {
        return str_replace(
            ['\\',   "'"],
            ['\\\\', "\\'"],
            $text
        );
    }
}



// # Basic usage (translate to all default languages)
// php artisan translations:generate

// # Custom source language
// php artisan translations:generate --source=fr

// # Custom target languages
// php artisan translations:generate --targets=en,es

// # Custom API endpoint
// php artisan translations:generate --api-url=http://your-translation-api.com/translate