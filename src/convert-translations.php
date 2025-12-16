<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\File;

$basePath = resource_path('lang');
$locales = array_filter(glob($basePath . '/*'), 'is_dir');

foreach ($locales as $localePath) {
    $locale = basename($localePath);
    $messagesFile = $localePath . '/messages.php';
    $jsonFile = $basePath . "/$locale.json";

    if (file_exists($messagesFile)) {
        $translations = include $messagesFile;

        if (!is_array($translations)) {
            echo "Invalid messages file in $locale\n";
            continue;
        }

        // Optional: Merge with existing JSON content
        $existing = [];
        if (file_exists($jsonFile)) {
            $existing = json_decode(file_get_contents($jsonFile), true) ?? [];
        }

        // Merge and write
        $merged = array_merge($existing, $translations);
        ksort($merged);

        file_put_contents($jsonFile, json_encode($merged, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo "✅ Converted $locale/messages.php to $locale.json\n";
    }
}
