<?php

namespace App\Services\Transactions\Sources;

use App\Models\Transaction;
use Illuminate\Support\Collection;
use App\Services\Transactions\Sources\SourcesContract;

class DB implements SourcesContract
{
    public function index():Collection
    {
        return Transaction::all();
    }
}
