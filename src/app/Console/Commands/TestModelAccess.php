<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class TestModelAccess extends Command
{
    protected $signature = 'db-test-model {model}';
    protected $description = 'Test database access and read data via an Eloquent model';

    public function handle()
    {
        $modelClass = $this->argument('model');

        if (!class_exists($modelClass)) {
            $this->error("Model class {$modelClass} does not exist.");
            return 1;
        }

        /** @var \Illuminate\Database\Eloquent\Model $model */
        $model = new $modelClass;

        $table = $model->getTable();

        $this->info("Testing model {$modelClass} linked to table: {$table}");

        if (!Schema::hasTable($table)) {
            $this->error("Table {$table} does not exist in the database.");
            return 1;
        }

        $columns = Schema::getColumnListing($table);
        $this->info("Columns: " . implode(', ', $columns));

        $rows = $modelClass::limit(5)->get();

        if ($rows->isEmpty()) {
            $this->warn("No rows found in table {$table}");
            return 0;
        }

        foreach ($rows as $index => $row) {
            $this->info("Row " . ($index + 1));
            foreach ($columns as $column) {
                $value = $row->$column;
                $this->line("  {$column}: " . (is_null($value) ? 'NULL' : $value));
            }
            $this->line('---');
        }

        return 0;
    }
}
