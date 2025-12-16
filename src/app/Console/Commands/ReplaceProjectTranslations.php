<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ReplaceProjectTranslations extends Command
{
    protected $signature = 'translations:replace 
                            {--path= : Path to scan (default: resources/views)}
                            {--dry-run : Show changes without modifying files}
                            {--keep-class : Keep the translated_text class}';
    
    protected $description = 'Replace static text with translation functions';

    public function handle()
    {
        $path = $this->option('path') ?? resource_path('views');
        $dryRun = $this->option('dry-run');
        $keepClass = $this->option('keep-class');
        
        $this->info("Scanning files in: {$path}");
        $this->info($dryRun ? "Dry run - no files will be modified" : "Will modify files");
        
        $files = File::allFiles($path);
        $totalReplacements = 0;

        foreach ($files as $file) {
            $contents = File::get($file);
            $originalContents = $contents;
            
            $newContents = $this->processContent($contents, $keepClass);
            
            if ($newContents !== $originalContents) {
                $totalReplacements += $this->countReplacements($originalContents, $newContents);
                $this->info("Changes in {$file->getRelativePathname()}:");
                $this->line($this->getDiff($originalContents, $newContents));

                if (!$dryRun) {
                    File::put($file, $newContents);
                }
            }
        }

        $this->info("\nTotal replacements made: {$totalReplacements}");
        if ($dryRun) {
            $this->info("Dry run complete. No files were modified.");
        }
    }
    
    protected function processContent($content, $keepClass = false)
    {
        // 1. Process text content in elements with translated_text class
        $content = preg_replace_callback(
            '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>([^<{]+)(<\/\1>)/',
            function($matches) use ($keepClass) {
                $tag = $matches[1];
                $attributes = $matches[2];
                $text = $this->normalizeSpaces(trim($matches[3]));
                $closingTag = $matches[4];
                
                if (empty($text)) {
                    return $matches[0];
                }
                
                // Remove class if not keeping it
                if (!$keepClass) {
                    $attributes = preg_replace('/(\s*)class="([^"]*)\btranslated_text\b([^"]*)"/', '$1class="$2$3"', $attributes);
                    $attributes = preg_replace('/class="\s*"/', '', $attributes);
                }
                
                return "<{$tag}{$attributes}>{{ __(\"{$text}\") }}{$closingTag}";
            },
            $content
        );
        
        // 2. Process placeholder attributes
        $content = preg_replace_callback(
            '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>/',
            function($matches) {
                $tag = $matches[1];
                $attributes = $matches[2];
                
                $attributes = preg_replace_callback(
                    '/(placeholder)="([^"]+)"/',
                    function($attrMatches) {
                        $text = $this->normalizeSpaces($attrMatches[2]);
                        return "{$attrMatches[1]}=\"{{ __(\"{$text}\") }}\"";
                    },
                    $attributes
                );
                
                return "<{$tag}{$attributes}>";
            },
            $content
        );
        
        return $content;
    }
    
    protected function normalizeSpaces($text)
    {
        // Remove HTML tags first
        $text = strip_tags($text);
        // Normalize all whitespace to single spaces
        $text = preg_replace('/\s+/', ' ', $text);
        // Trim both ends
        return trim($text);
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
        $count = 0;
        $count += substr_count($new, "{{ __('") - substr_count($old, "{{ __('");
        $count += substr_count($new, '="{{ __(\'') - substr_count($old, '="{{ __(\'');
        return $count;
    }
}