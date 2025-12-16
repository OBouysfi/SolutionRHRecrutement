<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Exception;

class TranslateDbLabels extends Command
{
    protected $signature = 'translations:db-labels
                            {--models= : Comma-separated list of full model class names (optional, will auto-discover if not provided)}
                            {--source=fr : Source language code}
                            {--targets=en,ar,es,pt : Comma-separated target languages}
                            {--column=label : Column name to translate}
                            {--auto-discover : Automatically discover all tables with label columns}';

    protected $description = 'Translate label columns from all database tables and save organized translations into lang/db_generated.php files';

    protected $supportedLanguages = [
        'fr' => 'fr',
        'ar' => 'ar',
        'es' => 'es',
        'pt' => 'pt',
        'en' => 'en',
        'zh' => 'zh',
    ];

    protected $translationServices = [
        'mymemory' => 'MyMemory',
        'libretranslate' => 'LibreTranslate',
        'googletrans' => 'Google Translate (Free)',
    ];

    protected $client;
    protected $translationCache = [];

    public function __construct()
    {
        parent::__construct();
        $this->client = new \GuzzleHttp\Client();
    }

    public function handle()
    {
        $sourceLang = $this->option('source');
        $targetLangs = array_map('trim', explode(',', $this->option('targets')));
        $columnName = $this->option('column');
        $autoDiscover = $this->option('auto-discover');

        // Validate languages
        if (!$this->validateLanguages($sourceLang, $targetLangs)) {
            return 1;
        }

        // Test translation API connection
        if (!$this->testTranslationApi()) {
            $this->error("❌ Translation API is not available. Please check your internet connection.");
            return 1;
        }

        // Get models to process
        $modelsToProcess = $this->getModelsToProcess($columnName, $autoDiscover);
        
        if (empty($modelsToProcess)) {
            $this->warn("No models found with '{$columnName}' column to process.");
            return 0;
        }

        $this->info("🔍 Found " . count($modelsToProcess) . " models with '{$columnName}' column:");
        foreach ($modelsToProcess as $modelInfo) {
            $this->info("   • {$modelInfo['display_name']} ({$modelInfo['table']})");
        }
        $this->line("");

        // Store all translations organized by language and table
        $allTranslations = [];
        $modelInfo = [];

        // Initialize translation structure
        foreach ($targetLangs as $lang) {
            $allTranslations[$lang] = [];
        }

        // Process each model
        foreach ($modelsToProcess as $model) {
            $result = $this->processModel($model, $columnName, $sourceLang, $targetLangs);
            
            if ($result) {
                $tableName = $model['table'];
                $displayName = $model['display_name'];
                $translations = $result['translations'];
                
                $modelInfo[$tableName] = $displayName;
                
                foreach ($targetLangs as $lang) {
                    if (!empty($translations[$lang])) {
                        $allTranslations[$lang][$tableName] = $translations[$lang];
                    }
                }
            }
        }

        // Save organized translations to files
        foreach ($targetLangs as $lang) {
            if (!empty($allTranslations[$lang])) {
                $this->saveOrganizedTranslations($allTranslations[$lang], $modelInfo, $lang, $columnName);
            }
        }

        $this->info("\n✅ All translations saved successfully!");
        $this->displaySummary($allTranslations, $modelInfo);
        
        return 0;
    }

    protected function validateLanguages(string $sourceLang, array $targetLangs): bool
    {
        // Validate source language
        if (!isset($this->supportedLanguages[$sourceLang])) {
            $this->error("Unsupported source language: {$sourceLang}");
            $this->info("Supported languages: " . implode(', ', array_keys($this->supportedLanguages)));
            return false;
        }

        // Validate target languages
        foreach ($targetLangs as $lang) {
            if (!isset($this->supportedLanguages[$lang])) {
                $this->error("Unsupported target language: {$lang}");
                $this->info("Supported languages: " . implode(', ', array_keys($this->supportedLanguages)));
                return false;
            }
        }

        return true;
    }

    protected function getModelsToProcess(string $columnName, bool $autoDiscover): array
    {
        $modelsOption = $this->option('models');
        
        if ($autoDiscover || !$modelsOption) {
            // Auto-discover models with the specified column
            return $this->discoverModelsWithColumn($columnName);
        } else {
            // Use provided models
            $modelClasses = array_map('trim', explode(',', $modelsOption));
            $models = [];
            
            foreach ($modelClasses as $modelClass) {
                if (class_exists($modelClass)) {
                    $model = new $modelClass;
                    $tableName = $model->getTable();
                    
                    if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, $columnName)) {
                        $models[] = [
                            'class' => $modelClass,
                            'instance' => $model,
                            'table' => $tableName,
                            'display_name' => $this->getModelDisplayName($modelClass)
                        ];
                    }
                }
            }
            
            return $models;
        }
    }

    protected function discoverModelsWithColumn(string $columnName): array
    {
        $this->info("🔍 Discovering models with '{$columnName}' column...");
        
        $models = [];
        $modelPath = app_path('Models');
        
        if (!is_dir($modelPath)) {
            // Fallback to app directory for older Laravel versions
            $modelPath = app_path();
        }
        
        $modelFiles = File::allFiles($modelPath);
        
        foreach ($modelFiles as $file) {
            if ($file->getExtension() === 'php') {
                $className = $this->getClassNameFromFile($file->getPathname());
                
                if ($className && class_exists($className)) {
                    try {
                        $reflection = new \ReflectionClass($className);
                        
                        if ($reflection->isSubclassOf(Model::class) && !$reflection->isAbstract()) {
                            $model = new $className;
                            $tableName = $model->getTable();
                            
                            if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, $columnName)) {
                                $models[] = [
                                    'class' => $className,
                                    'instance' => $model,
                                    'table' => $tableName,
                                    'display_name' => $this->getModelDisplayName($className)
                                ];
                            }
                        }
                    } catch (Exception $e) {
                        // Skip models that can't be instantiated
                        continue;
                    }
                }
            }
        }
        
        return $models;
    }

    protected function getClassNameFromFile(string $filePath): ?string
    {
        $content = file_get_contents($filePath);
        
        // Extract namespace
        preg_match('/namespace\s+([^;]+);/', $content, $namespaceMatches);
        $namespace = $namespaceMatches[1] ?? '';
        
        // Extract class name
        preg_match('/class\s+(\w+)/', $content, $classMatches);
        $className = $classMatches[1] ?? '';
        
        if ($className) {
            return $namespace ? $namespace . '\\' . $className : $className;
        }
        
        return null;
    }

    protected function getModelDisplayName(string $modelClass): string
    {
        $className = class_basename($modelClass);
        // Convert PascalCase to Title Case
        $readable = preg_replace('/([A-Z])/', ' $1', $className);
        return trim($readable);
    }

    protected function processModel(array $modelInfo, string $columnName, string $sourceLang, array $targetLangs): ?array
    {
        try {
            $model = $modelInfo['instance'];
            $tableName = $modelInfo['table'];
            $displayName = $modelInfo['display_name'];
            
            $this->info("🔄 Processing {$displayName} ({$tableName})...");

            // Get all records with non-empty labels using the model
            $records = $model->whereNotNull($columnName)
                ->where($columnName, '!=', '')
                ->select('id', $columnName)
                ->get();

            if ($records->isEmpty()) {
                $this->warn("   No records with '{$columnName}' found in {$tableName}");
                return null;
            }

            // Get unique labels to avoid duplicate translations
            $uniqueLabels = $records->pluck($columnName)->unique()->filter()->values();
            $this->info("   Found " . $uniqueLabels->count() . " unique labels to translate");

            // Initialize translations structure
            $translations = [];
            foreach ($targetLangs as $lang) {
                $translations[$lang] = [];
            }

            // Calculate total operations for progress bar
            $totalOperations = 0;
            foreach ($uniqueLabels as $label) {
                foreach ($targetLangs as $targetLang) {
                    if ($targetLang !== $sourceLang) {
                        $totalOperations++;
                    }
                }
            }

            if ($totalOperations === 0) {
                $this->warn("   No translations needed for {$tableName}");
                return null;
            }

            $bar = $this->output->createProgressBar($totalOperations);
            $bar->setFormat('   %current%/%max% [%bar%] %percent:3s%% %message%');

            // Process each unique label
            foreach ($uniqueLabels as $originalText) {
                $originalText = trim($originalText);
                
                if (empty($originalText)) {
                    continue;
                }

                foreach ($targetLangs as $targetLang) {
                    if ($targetLang === $sourceLang) {
                        // Same language, no translation needed
                        $translations[$targetLang][$originalText] = $originalText;
                        continue;
                    }

                    $bar->setMessage("Translating: " . substr($originalText, 0, 30) . "...");

                    try {
                        $translation = $this->translateTextWithCache($originalText, $sourceLang, $targetLang);
                        $translations[$targetLang][$originalText] = $translation;
                        
                        // Log successful translation
                        if ($translation !== $originalText) {
                            $this->info("\n   ✓ '{$originalText}' → '{$translation}' ({$targetLang})", 'v');
                        }
                        
                    } catch (Exception $e) {
                        $this->error("\n   ❌ Error translating '{$originalText}' to {$targetLang}: " . $e->getMessage());
                        $translations[$targetLang][$originalText] = $originalText; // fallback
                    }
                    
                    $bar->advance();
                    
                    // Rate limiting to avoid overwhelming the APIs
                    usleep(1000000); // 1 second delay between translations
                }
            }

            $bar->finish();
            $this->line("");

            return [
                'translations' => $translations
            ];

        } catch (Exception $e) {
            $this->error("Error processing model {$modelInfo['class']}: " . $e->getMessage());
            return null;
        }
    }

    protected function translateTextWithCache(string $text, string $sourceLang, string $targetLang): string
    {
        $cacheKey = md5($text . $sourceLang . $targetLang);
        
        if (isset($this->translationCache[$cacheKey])) {
            return $this->translationCache[$cacheKey];
        }

        $translation = $this->translateText($text, $sourceLang, $targetLang);
        $this->translationCache[$cacheKey] = $translation;
        
        return $translation;
    }

    protected function translateText(string $text, string $sourceLang, string $targetLang): string
    {
        $services = ['mymemory', 'libretranslate', 'googletrans'];
        
        foreach ($services as $service) {
            try {
                $translation = $this->callTranslationService($service, $text, $sourceLang, $targetLang);
                
                if ($translation && $translation !== $text) {
                    // Log successful translation
                    \Log::info("Translation via {$service}: '{$text}' ({$sourceLang}) → '{$translation}' ({$targetLang})");
                    return $translation;
                }
                
            } catch (Exception $e) {
                \Log::warning("Translation service '{$service}' failed: " . $e->getMessage());
                continue; // Try next service
            }
        }
        
        // All services failed, return original text
        \Log::error("All translation services failed for: '{$text}' ({$sourceLang} → {$targetLang})");
        return $text;
    }

    protected function callTranslationService(string $service, string $text, string $sourceLang, string $targetLang): ?string
    {
        // switch ($service) {
        //     case 'mymemory':
        //         return $this->translateWithMyMemory($text, $sourceLang, $targetLang);
                
        //     case 'libretranslate':
        //         return $this->translateWithLibreTranslate($text, $sourceLang, $targetLang);
                
        //     case 'googletrans':
            return $this->translateWithGoogleTranslate($text, $sourceLang, $targetLang);
                
            // default:
            //     return null;
        // }
    }

    protected function translateWithMyMemory(string $text, string $sourceLang, string $targetLang): ?string
    {
        $apiUrl = 'https://api.mymemory.translated.net/get';
        
        $response = $this->client->get($apiUrl, [
            'query' => [
                'q' => $text,
                'langpair' => $this->supportedLanguages[$sourceLang] . '|' . $this->supportedLanguages[$targetLang]
            ],
            'timeout' => 10,
            'connect_timeout' => 5,
            'headers' => [
                'User-Agent' => 'Laravel Translation Command/1.0'
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        
        // Check for rate limit or quota exceeded
        if (isset($data['responseData']['translatedText'])) {
            $translation = $data['responseData']['translatedText'];
            
            // Check if it's an error message
            if (strpos(strtoupper($translation), 'MYMEMORY WARNING') !== false || 
                strpos(strtoupper($translation), 'QUOTA EXCEEDED') !== false) {
                throw new Exception('MyMemory quota exceeded');
            }
            
            return $translation;
        }
        
        throw new Exception('MyMemory API returned invalid response');
    }

    protected function translateWithLibreTranslate(string $text, string $sourceLang, string $targetLang): ?string
    {
        // Try public LibreTranslate instances
        $instances = [
            'https://libretranslate.de/translate',
            'https://translate.terraprint.co/translate',
            'https://libretranslate.com/translate'
        ];
        
        foreach ($instances as $apiUrl) {
            try {
                $response = $this->client->post($apiUrl, [
                    'json' => [
                        'q' => $text,
                        'source' => $this->supportedLanguages[$sourceLang],
                        'target' => $this->supportedLanguages[$targetLang],
                        'format' => 'text'
                    ],
                    'timeout' => 10,
                    'connect_timeout' => 5,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'User-Agent' => 'Laravel Translation Command/1.0'
                    ]
                ]);

                $data = json_decode($response->getBody(), true);
                
                if (isset($data['translatedText'])) {
                    return $data['translatedText'];
                }
                
            } catch (Exception $e) {
                continue; // Try next instance
            }
        }
        
        throw new Exception('All LibreTranslate instances failed');
    }

    protected function translateWithGoogleTranslate(string $text, string $sourceLang, string $targetLang): ?string
    {
        // Using unofficial Google Translate API endpoint
        $apiUrl = 'https://translate.googleapis.com/translate_a/single';
        
        $response = $this->client->get($apiUrl, [
            'query' => [
                'client' => 'gtx',
                'sl' => $this->supportedLanguages[$sourceLang],
                'tl' => $this->supportedLanguages[$targetLang],
                'dt' => 't',
                'q' => $text
            ],
            'timeout' => 10,
            'connect_timeout' => 5,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        
        if (isset($data[0][0][0])) {
            return $data[0][0][0];
        }
        
        throw new Exception('Google Translate API returned invalid response');
    }

    protected function testTranslationApi(): bool
    {
        $this->info("🔗 Testing translation APIs...");
        
        $services = ['mymemory', 'libretranslate', 'googletrans'];
        $workingServices = [];
        
        foreach ($services as $service) {
            try {
                $this->info("   Testing {$this->translationServices[$service]}...");
                
                $translation = $this->callTranslationService($service, 'hello', 'en', 'fr');
                
                if ($translation && strtolower($translation) !== 'hello') {
                    $workingServices[] = $service;
                    $this->info("   ✅ {$this->translationServices[$service]}: 'hello' → '{$translation}'");
                } else {
                    $this->warn("   ⚠️ {$this->translationServices[$service]}: No translation received");
                }
                
            } catch (Exception $e) {
                $this->warn("   ❌ {$this->translationServices[$service]}: " . $e->getMessage());
            }
        }
        
        if (!empty($workingServices)) {
            $this->info("✅ Found " . count($workingServices) . " working translation service(s)");
            return true;
        }
        
        $this->error("❌ No translation services are currently available");
        $this->info("💡 Possible solutions:");
        $this->info("   • Wait and try again later (rate limits reset)");
        $this->info("   • Use a VPN to change your IP address");
        $this->info("   • Set up your own LibreTranslate instance");
        
        return false;
    }

    protected function saveOrganizedTranslations(array $translations, array $modelInfo, string $lang, string $columnName)
    {
        try {
            $langPath = lang_path($lang);
            File::ensureDirectoryExists($langPath, 0755, true);

            $content = $this->generateTranslationFileContent($translations, $modelInfo, $lang, $columnName);

            File::put("{$langPath}/db_generated.php", $content);
            $this->info("💾 Saved translations to {$lang}/db_generated.php");
        } catch (Exception $e) {
            $this->error("Error saving translations for {$lang}: " . $e->getMessage());
        }
    }

    protected function generateTranslationFileContent(array $translations, array $modelInfo, string $lang, string $columnName): string
    {
        $content = "<?php\n\n";
        $content .= "/**\n";
        $content .= " * Auto-generated database translations for language: {$lang}\n";
        $content .= " * Generated on: " . now()->format('Y-m-d H:i:s') . "\n";
        $content .= " * Column: {$columnName}\n";
        $content .= " * \n";
        $content .= " * This file contains translations for database '{$columnName}' values organized by table.\n";
        $content .= " * Each section represents a different database table.\n";
        $content .= " * API Used: MyMemory Translation (Free)\n";
        $content .= " */\n\n";
        $content .= "return [\n\n";

        foreach ($translations as $tableName => $tableTranslations) {
            if (empty($tableTranslations)) {
                continue;
            }

            $displayName = $modelInfo[$tableName] ?? ucfirst($tableName);
            
            $content .= "    // " . str_repeat('=', 60) . "\n";
            $content .= "    // {$displayName} ({$tableName}.{$columnName})\n";
            $content .= "    // " . str_repeat('=', 60) . "\n";
            
            foreach ($tableTranslations as $original => $translation) {
                if (empty($original)) continue;

                $escapedOriginal = $this->escapeForPhp($original);
                $escapedTranslation = $this->escapeForPhp($translation);
                $content .= "    '{$escapedOriginal}' => '{$escapedTranslation}',\n";
            }
            
            $content .= "\n";
        }

        $content .= "];\n";
        
        return $content;
    }

    protected function displaySummary(array $allTranslations, array $modelInfo)
    {
        $this->info("\n📊 Translation Summary:");
        $this->info("========================");

        foreach ($allTranslations as $lang => $translations) {
            $totalTranslations = 0;
            $tableCount = count($translations);

            foreach ($translations as $tableTranslations) {
                $totalTranslations += count($tableTranslations);
            }

            $this->info("🌐 {$lang}: {$totalTranslations} translations across {$tableCount} models");
        }

        $this->info("\n📋 Processed Models:");
        foreach ($modelInfo as $tableName => $displayName) {
            $this->info("   • {$displayName} ({$tableName})");
        }

        $this->info("\n💡 Usage in your app:");
        $this->info("   __('db_generated.your_original_text')");
        $this->info("   or access specific translations from the generated files.");
        
        $this->info("\n🔗 Translation APIs: Multiple free services with fallback");
        $this->info("   • MyMemory (1000 words/day)");
        $this->info("   • LibreTranslate (Multiple public instances)"); 
        $this->info("   • Google Translate (Unofficial, use sparingly)");
        $this->info("   💡 The command automatically tries different services if one fails");
    }

    protected function escapeForPhp(string $text): string
    {
        return str_replace(
            ['\\', "'"],
            ['\\\\', "\\'"],
            $text
        );
    }
}