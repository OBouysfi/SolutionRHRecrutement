<?php
// app/Console/Commands/TestTranslationReplace.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TestTranslationReplace extends Command
{
    protected $signature = 'translate:test 
                            {file : Path to the file to test}
                            {--save : Save the changes (otherwise just show diff)}';
    
    protected $description = 'Test translation replacement on a single file';

    public function handle()
    {
        $filePath = $this->argument('file');
        $saveChanges = $this->option('save');
        
        if (!File::exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return;
        }

        $contents = File::get($filePath);
        $originalContents = $contents;
        
        // Process the file content
        $newContents = $this->processContent($contents);
        
        // Show the diff
        $this->showDiff($originalContents, $newContents);
        
        // Save if requested
        if ($saveChanges) {
            File::put($filePath, $newContents);
            $this->info("Changes saved to: {$filePath}");
        } else {
            $this->info("\nDry run complete. Add --save to actually modify the file.");
        }
    }
    
    protected function processContent($content)
    {
        // 1. Process elements with translated_text class
        $pattern = '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>([^<{]*(?:{{[^}]+}}[^<{]*)*)(<\/\1>)/';
        
        $content = preg_replace_callback($pattern, function($matches) {
            $tag = $matches[1];
            $attributes = $matches[2];
            $innerContent = trim($matches[3]);
            $closingTag = $matches[4];
            
            // Skip if already has translation function
            if (str_contains($innerContent, '__(')) {
                return $matches[0];
            }
            
            // Handle variables
            if (preg_match('/{{\s*([^}]+)\s*}}/', $innerContent, $varMatches)) {
                $varContent = $varMatches[1];
                $newContent = preg_replace(
                    '/{{\s*([^}]+)\s*}}/',
                    '{{ __($1) }}',
                    $innerContent
                );
                return "<{$tag}{$attributes}>{$newContent}{$closingTag}";
            }
            
            // Handle plain text
            $cleanText = trim(preg_replace('/\s+/', ' ', $innerContent));
            if (empty($cleanText)) {
                return $matches[0];
            }
            
            $attributes = preg_replace('/\s*translated_text\s*/', '', $attributes);
            return "<{$tag}{$attributes}>{{ __(\"generated.{$cleanText}\") }}{$closingTag}";
        }, $content);
        
        // 2. Process attributes in elements with translated_text class
        $attributePattern = '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>/';
        
        $content = preg_replace_callback($attributePattern, function($matches) {
            $tag = $matches[1];
            $attributes = $matches[2];
            
            // Process translatable attributes
            $attributePatterns = [
                '/(title|placeholder|tooltip|alt|data-tooltip|data-title|aria-label)="([^"]+)"/'
            ];
            
            foreach ($attributePatterns as $attrPattern) {
                $attributes = preg_replace_callback($attrPattern, function($attrMatches) {
                    $attrName = $attrMatches[1];
                    $attrValue = $attrMatches[2];
                    
                    // Skip if already has translation function
                    if (str_contains($attrValue, '__(')) {
                        return $attrMatches[0];
                    }
                    
                    return "{$attrName}=\"{{ __('{$attrValue}') }}\"";
                }, $attributes);
            }
            
            return "<{$tag}{$attributes}>";
        }, $content);
        
        return $content;
    }
    
    protected function showDiff($old, $new)
    {
        $oldLines = explode("\n", $old);
        $newLines = explode("\n", $new);
        
        $this->line("\nChanges that would be made:");
        $this->line(str_repeat('-', 50));
        
        foreach ($oldLines as $i => $line) {
            if (!isset($newLines[$i])) continue;
            if ($line !== $newLines[$i]) {
                $this->line("Line " . ($i + 1) . ":");
                $this->line("< " . $line);
                $this->line("> " . $newLines[$i]);
                $this->line(str_repeat('-', 50));
            }
        }
    }
}