<?php

namespace App\Services\Transactions\Sources;

use App\Imports\TransactionImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\Transactions\Sources\SourcesContract;

class CSV implements SourcesContract
{
    public function index():Collection
    {
        return Excel::toCollection(new TransactionImport, storage_path('app/transactions.csv'))->first();
    }
}
