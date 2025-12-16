<?php

namespace App\Services;

use App\Models\TestResult;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class TestPerformanceResultService
{

    public function create(array $data)
    {
        return TestResult::create($data);
    }












}
