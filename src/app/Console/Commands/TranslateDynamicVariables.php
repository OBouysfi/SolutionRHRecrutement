<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TranslateDynamicVariables extends Command
{
    protected $signature = 'translations:variables 
                            {--path= : Path to scan (default: resources/views)}
                            {--dry-run : Show changes without modifying files}
                            {--skip-attributes : Skip variables in HTML attributes}';
    
    protected $description = 'Wrap dynamic variables with translation functions';

    public function handle()
    {
        $path = $this->option('path') ?? resource_path('views');
        $dryRun = $this->option('dry-run');
        $skipAttributes = $this->option('skip-attributes');
        
        $this->info("Scanning files in: {$path}");
        $this->info($dryRun ? "Dry run - no files will be modified" : "Will modify files");
        
        $files = File::allFiles($path);
        $totalReplacements = 0;

        foreach ($files as $file) {
            $contents = File::get($file);
            $originalContents = $contents;
            
            $newContents = $this->processContent($contents, $skipAttributes);
            
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
    
    protected function processContent($content, $skipAttributes = false)
    {
        // Pattern to match most common variable syntax in Blade
        // $variablePattern = '/\{\{\s*([^\}\s]+)\s*\}\}/';
        $variablePattern = '/\{\{\s*(.+?)\s*\}\}/s';
        
        // Process content outside of attributes
        $content = preg_replace_callback(
            $variablePattern,
            function ($matches) {
                $expression = trim($matches[1]);

                // Avoid double wrapping
                if (preg_match('/^__\((.*)\)$/s', $expression)) {
                    return $matches[0];
                }

                // Skip string literals
                if (preg_match('/^[\'"].*[\'"]$/', $expression)) {
                    return $matches[0];
                }
                // Skip if already translated
                if (preg_match('/^__\((.*)\)$/s', $expression)) {
                    return $matches[0];
                }

                // Only wrap string literals (not variables)
                if (preg_match('/^[\'"].+[\'"]$/', $expression)) {
                    return "{{ __($expression) }}";
                }

                // Otherwise, leave it untouched (variable, expression, number, etc.)
                return $matches[0];
            },
            $content
        );

        
        // Process variables in attributes if not skipped
        if (!$skipAttributes) {
            $content = preg_replace_callback(
                '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*)>/',
                function($matches) {
                    $tag = $matches[1];
                    $attributes = $matches[2];
                    
                    $attributes = preg_replace_callback(
                        '/(\w+)="\{\{\s*([^\}\s]+)\s*\}\}"/',
                        function($attrMatches) {
                            $attrName = $attrMatches[1];
                            $var = trim($attrMatches[2]);
                            
                            // Skip if already wrapped with __()
                            if (str_starts_with($var, '__(') && str_ends_with($var, ')')) {
                                return $attrMatches[0];
                            }
                            
                            // Skip if it's a function call or complex expression
                            if (str_contains($var, '(') || str_contains($var, ' ') || str_contains($var, '|')) {
                                return $attrMatches[0];
                            }
                            
                            return "{$attrName}=\"{{ __($var) }}\"";
                        },
                        $attributes
                    );
                    
                    return "<{$tag}{$attributes}>";
                },
                $content
            );
        }
        
        return $content;
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
    
    // protected function countReplacements($old, $new)
    // {
    //     // Count the number of new translation wrappers added
    //     $oldCount = preg_match_all('/\{\{\s*([^\}\s]+)\s*\}\}/', $old, $oldMatches);
    //     $newCount = preg_match_all('/\{\{\s*__\(([^\)]+)\)\s*\}\}/', $new, $newMatches);
        
    //     return max(0, $newCount - $oldCount);
    // }

    protected function countReplacements($old, $new)
    {
        $oldCount = substr_count($old, '{{');
        $newCount = substr_count($new, '{{ __(');
        return max(0, $newCount - $oldCount);
    }
}