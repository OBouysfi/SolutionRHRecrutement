<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TranslateSingleFile extends Command
{
    protected $signature = 'translations:test-file 
                            {file : Path to the file to process}
                            {--dry-run : Show changes without modifying files}';
    
    protected $description = 'Test translation replacements on a single file';

    public function handle()
    {
        $filePath = $this->argument('file');
        $dryRun = $this->option('dry-run');
        
        if (!File::exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return;
        }

        $this->info("Processing file: {$filePath}");
        $this->info($dryRun ? "Dry run - file will not be modified" : "Will modify file");
        
        $contents = File::get($filePath);
        $originalContents = $contents;
        
        // Process both static text and dynamic variables
        $newContents = $this->processStaticText($contents);
        $newContents = $this->processDynamicVariables($newContents);
        
        if ($newContents !== $originalContents) {
            $this->info("Changes in {$filePath}:");
            $this->line($this->getDiff($originalContents, $newContents));

            if (!$dryRun) {
                File::put($filePath, $newContents);
                $this->info("File updated successfully.");
            }
        } else {
            $this->info("No changes needed for this file.");
        }
    }
    
    protected function processStaticText($content)
    {
        // Same static text processing as in your original command
        return preg_replace_callback(
            '/<([a-zA-Z][a-zA-Z0-9]*)([^>]*class="[^"]*translated_text[^"]*"[^>]*)>([^<{]+)(<\/\1>)/',
            function($matches) {
                $tag = $matches[1];
                $attributes = $matches[2];
                $text = $this->normalizeSpaces(trim($matches[3]));
                $closingTag = $matches[4];
                
                if (empty($text)) {
                    return $matches[0];
                }
                
                $attributes = preg_replace('/(\s*)class="([^"]*)\btranslated_text\b([^"]*)"/', '$1class="$2$3"', $attributes);
                $attributes = preg_replace('/class="\s*"/', '', $attributes);
                
                return "<{$tag}{$attributes}>{{ __(\"{$text}\") }}{$closingTag}";
            },
            $content
        );
    }
    
    protected function processDynamicVariables($content)
    {
        // Same dynamic variable processing as in the new command
        return preg_replace_callback(
            '/\{\{\s*([^\}\s]+)\s*\}\}/',
            function($matches) {
                $var = trim($matches[1]);
                
                if (str_starts_with($var, '__(') && str_ends_with($var, ')')) {
                    return $matches[0];
                }
                
                if (str_contains($var, '(') || str_contains($var, ' ') || str_contains($var, '|')) {
                    return $matches[0];
                }
                
                return "{{ __($var) }}";
            },
            $content
        );
    }
    
    protected function normalizeSpaces($text)
    {
        $text = strip_tags($text);
        $text = preg_replace('/\s+/', ' ', $text);
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
}