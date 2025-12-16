<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ExtractStaticTexts extends Command
{
    protected $signature = 'i18n:extract-texts';
    protected $description = 'Extract French texts';

    public function handle()
    {
        $bladeFiles = File::allFiles(resource_path('views'));
        $texts = [];

        foreach ($bladeFiles as $file) {
            $content = File::get($file->getRealPath());

            // Ignorer Blade directives
            $cleaned = preg_replace('/@\w+\(.*?\)/', '', $content);
            $cleaned = preg_replace('/\{\{.*?\}\}/', '', $cleaned);

            // Extraire texte entre >text<
            preg_match_all('/>([^<\{\}@]+)</', $cleaned, $matches);

            foreach ($matches[1] as $text) {
                $text = trim($text);
                if ($text && strlen($text) > 1 && !is_numeric($text)) {
                    $texts[$text] = $text;
                }
            }
        }

        // Générer le fichier de traduction
        $translationFile = resource_path('lang/fr/messages.php');
        File::put($translationFile, '<?php return ' . var_export($texts, true) . ';');

        $this->info(' Extraction terminée. Fichier généré : lang/fr/messages.php');
    }
}
