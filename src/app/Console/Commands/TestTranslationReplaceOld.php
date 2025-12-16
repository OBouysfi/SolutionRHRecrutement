<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TestTranslationReplaceOld extends Command
{
    protected $signature = 'translate:test 
                            {file : Path to the file to test}
                            {--save : Save the changes (otherwise just show diff)}
                            {--keep-class : Keep the translated_text class}';
    
    protected $description = 'Test translation replacement on a single file';

    public function handle()
    {
        $filePath = $this->argument('file');
        $saveChanges = $this->option('save');
        $keepClass = $this->option('keep-class');
        
        if (!File::exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }

        $contents = File::get($filePath);
        $originalContents = $contents;
        
        // Process the file content
        $newContents = $this->processContent($contents, $keepClass);
        
        // Show the diff
        $this->showDiff($originalContents, $newContents);
        
        // Save if requested
        if ($saveChanges) {
            File::put($filePath, $newContents);
            $this->info("\nChanges saved to: {$filePath}");
        } else {
            $this->info("\nDry run complete. Add --save to actually modify the file.");
        }

        return 0;
    }
    
    protected function processContent($content, $keepClass = false)
    {
        // Process all tags with translated_text class
        $content = preg_replace_callback(
            '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>(.*?)<\/\1>/s',
            function($matches) use ($keepClass) {
                $tag = $matches[1];
                $attributes = $matches[2];
                $innerContent = trim($matches[3]);
                
                // Process attributes first
                $attributes = $this->processAttributes($attributes);
                
                // Remove translated_text class if not keeping it
                if (!$keepClass) {
                    $attributes = preg_replace('/(\s*)class="([^"]*)\btranslated_text\b([^"]*)"/', '$1class="$2$3"', $attributes);
                    $attributes = preg_replace('/class="\s*"/', '', $attributes);
                    $attributes = preg_replace('/\s+/', ' ', $attributes);
                }
                
                // Process inner content
                $processedContent = $this->processInnerContent($innerContent);
                
                return "<{$tag}{$attributes}>{$processedContent}</{$tag}>";
            },
            $content
        );
        
        return $content;
    }
    
    protected function processAttributes($attributes)
    {
        // Process translatable attributes
        return preg_replace_callback(
            '/(title|placeholder|tooltip|alt|data-tooltip|data-title|aria-label)="([^"]+)"/',
            function($matches) {
                $attrName = $matches[1];
                $attrValue = $matches[2];
                
                // Skip if already has translation function
                if (str_contains($attrValue, '__(')) {
                    return $matches[0];
                }
                
                // Escape double quotes
                $escapedValue = str_replace('"', '"', $attrValue);
                return "{$attrName}=\"{{ __(\"{$escapedValue}\") }}\"";
            },
            $attributes
        );
    }
    
    protected function processInnerContent($content)
    {
        // First process variables that should be translated
        $content = preg_replace_callback(
            '/{{\s*([$][^}\s]+)\s*}}/',
            function($matches) {
                $varContent = trim($matches[1]);
                // Skip if already has translation function
                if (str_contains($varContent, '__(')) {
                    return $matches[0];
                }
                return '{{ __(' . $varContent . ') }}';
            },
            $content
        );
        
        // Then process any remaining text nodes
        return preg_replace_callback(
            '/([^{<\s][^{<]*)/',
            function($matches) {
                $text = trim($matches[1]);
                if (!empty($text)) {
                    // Escape double quotes
                    $escapedText = str_replace('"', '\"', $text);
                    return '{{ __("generated.' . $escapedText . '") }}';
                }
                return $matches[0];
            },
            $content
        );
    }
    
    protected function showDiff($old, $new)
    {
        $oldLines = explode("\n", $old);
        $newLines = explode("\n", $new);
        
        $this->line("\nChanges that would be made:");
        $this->line(str_repeat('-', 60));
        
        $hasChanges = false;
        
        foreach ($oldLines as $i => $line) {
            if (!isset($newLines[$i])) continue;
            if ($line !== $newLines[$i]) {
                $hasChanges = true;
                $this->line("< " . $line);
                $this->line("> " . $newLines[$i]);
                $this->line(str_repeat('-', 60));
            }
        }
        
        if (!$hasChanges) {
            $this->line("No changes needed - file already properly formatted");
            $this->line(str_repeat('-', 60));
        }
    }
}