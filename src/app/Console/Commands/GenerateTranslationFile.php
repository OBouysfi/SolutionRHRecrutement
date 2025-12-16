<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateTranslationFile extends Command
{
    protected $signature = 'translations:generate-file 
                            {--path=resources/views : Path to scan}
                            {--output=fr : Language directory to output}';
    
    protected $description = 'Generate translation file with original text as keys and values';

    public function handle()
    {
        $path = $this->option('path');
        $outputLang = $this->option('output');
        
        $this->info("Scanning files in: {$path}");
        
        $translations = $this->extractTranslatableText($path);
        $this->saveTranslations($translations, $outputLang);
        
        $this->info("\nGenerated translation file with " . count($translations) . " entries");
        $this->info("File saved to: lang/{$outputLang}/generated.php");
    }
    
    protected function extractTranslatableText($path)
    {
        $translations = [];
        $files = File::allFiles($path);

        foreach ($files as $file) {
            $content = File::get($file);

            // Extract from elements with translated_text class
            preg_match_all('/<[^>]*class="[^"]*translated_text[^"]*"[^>]*>([^<{]+)</', $content, $matches);
            foreach ($matches[1] as $text) {
                $text = $this->normalizeText($text);
                if (!empty($text)) {
                    $translations[$text] = $text;
                }
            }

            // Extract from placeholder attributes
            preg_match_all('/<[^>]*class="[^"]*translated_text[^"]*"[^>]* placeholder="([^"]+)"/', $content, $matches);
            foreach ($matches[1] as $text) {
                $text = $this->normalizeText($text);
                if (!empty($text)) {
                    $translations[$text] = $text;
                }
            }
        }

        return $translations;
    }
    
    protected function normalizeText($text)
    {
        $text = strip_tags($text);
        $text = preg_replace('/\s+/', ' ', $text);
        return trim($text);
    }
    
    protected function saveTranslations($translations, $lang)
    {
        $langPath = lang_path($lang);
        File::ensureDirectoryExists($langPath);

        $content = "<?php\n\nreturn [\n";
        foreach ($translations as $key => $value) {
            $escapedKey = addslashes($key);
            $escapedValue = addslashes($value);
            $content .= "    '{$escapedKey}' => '{$escapedValue}',\n";
        }
        $content .= "];\n";
        
        File::put("{$langPath}/generated.php", $content);
    }
}