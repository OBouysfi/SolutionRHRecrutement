<?php
// app/Console/Commands/ReplaceAllTranslations.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ReplaceAllTranslations extends Command
{
    protected $signature = 'translate:all 
                            {--path= : Path to scan (default: resources/views)}
                            {--dry-run : Show changes without modifying files}';
    
    protected $description = 'Replace all translatable content in elements with translated_text class';

    public function handle()
    {
        $path = $this->option('path') ?? resource_path('views');
        $dryRun = $this->option('dry-run');
        
        $files = File::allFiles($path);
        $totalReplacements = 0;

        foreach ($files as $file) {
            $contents = File::get($file);
            $originalContents = $contents;

            // Process all tags with translated_text class
            $newContents = preg_replace_callback(
                '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>(.*?)<\/\1>/s',
                function($matches) {
                    $tag = $matches[1];
                    $attributes = $matches[2];
                    $content = $matches[3];

                    // Process attributes first
                    $attributes = preg_replace_callback(
                        '/(title|placeholder|tooltip|alt|data-tooltip|data-title|aria-label)="([^"]+)"/',
                        function($attrMatches) {
                            $attrName = $attrMatches[1];
                            $attrValue = $attrMatches[2];
                            return $attrName . '="{{ __(\'' . addslashes($attrValue) . '\') }}"';
                        },
                        $attributes
                    );

                    // Process content
                    $processedContent = preg_replace_callback(
                        '/(?:{{\s*(.+?)\s*}}|([^{<\s][^{<]*))/',
                        function($contentMatches) {
                            // Handle variables
                            if (!empty($contentMatches[1])) {
                                $varContent = $contentMatches[1];
                                return '{{ __(' . $varContent . ') }}';
                            }
                            // Handle plain text
                            elseif (!empty($contentMatches[2])) {
                                $text = trim($contentMatches[2]);
                                if (!empty($text)) {
                                    return '{{ __(\'' . addslashes($text) . '\') }}';
                                }
                            }
                            return $contentMatches[0];
                        },
                        $content
                    );

                    return "<{$tag}{$attributes}>{$processedContent}</{$tag}>";
                },
                $contents
            );

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

    protected function getDiff($old, $new)
    {
        $diff = '';
        $oldLines = explode("\n", $old);
        $newLines = explode("\n", $new);
        
        foreach ($oldLines as $i => $line) {
            if (!isset($newLines[$i])) continue;
            if ($line !== $newLines[$i]) {
                $diff .= "Line " . ($i + 1) . ":\n";
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