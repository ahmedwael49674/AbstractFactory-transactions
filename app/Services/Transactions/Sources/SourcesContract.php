<?php

namespace App\Services\Transactions\Sources;

use Illuminate\Support\Collection;

interface SourcesContract
{
    public function index():Collection;
}
