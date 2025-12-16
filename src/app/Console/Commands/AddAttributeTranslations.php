<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AddAttributeTranslations extends Command
{
    protected $signature = 'translations:attributes
                            {--path= : Path to scan (default: resources/views)}
                            {--dry-run : Show changes without modifying files}';

    protected $description = 'Wrap title, placeholder, and tooltip attributes with translation functions in elements with translated_text class';

    public function handle()
    {
        $path = $this->option('path') ?? resource_path('views');
        $dryRun = $this->option('dry-run');

        $this->info("Scanning files in: {$path}");
        $this->info($dryRun ? "Dry run - no files will be modified" : "Will modify files");

        $files = File::allFiles($path);
        $totalReplacements = 0;

        foreach ($files as $file) {
            $contents = File::get($file);
            $originalContents = $contents;

            $newContents = $this->processAttributes($contents);

            if ($newContents !== $originalContents) {
                $totalReplacements += $this->countReplacements($originalContents, $newContents);
                $this->info("Changes in {$file->getRelativePathname()}:");
                $this->line($this->getDiff($originalContents, $newContents));

                if (!$dryRun) {
                    File::put($file, $newContents);
                }
            }
        }

        $this->info("\nTotal attribute translations made: {$totalReplacements}");
        if ($dryRun) {
            $this->info("Dry run complete. No files were modified.");
        }
    }

    protected function processAttributes($content)
    {
        return preg_replace_callback(
            '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>/',
            function ($matches) {
                $tag = $matches[1];
                $attributes = $matches[2];

                $attributes = preg_replace_callback(
                    '/\b(title|placeholder)="([^"{][^"]*)"/',
                    function ($attrMatches) {
                        $attr = $attrMatches[1];
                        $text = $this->normalizeSpaces($attrMatches[2]);
                        return "{$attr}=\"{{ __(\"{$text}\") }}\"";
                    },
                    $attributes
                );

                return "<{$tag}{$attributes}>";
            },
            $content
        );
    }

    protected function normalizeSpaces($text)
    {
        return trim(preg_replace('/\s+/', ' ', strip_tags($text)));
    }

    protected function getDiff($old, $new)
    {
        $diff = '';
        $oldLines = explode("\n", $old);
        $newLines = explode("\n", $new);

        foreach ($oldLines as $i => $line) {
            if (!isset($newLines[$i])) continue;
            if ($line !== $newLines[$i]) {
                $diff .= "--- Line " . ($i + 1) . ":\n";
                $diff .= "< " . $line . "\n";
                $diff .= "> " . $newLines[$i] . "\n\n";
            }
        }

        return $diff ?: "No changes detected";
    }

    protected function countReplacements($old, $new)
    {
        return substr_count($new, '{{ __("') - substr_count($old, '{{ __("');
    }
}
