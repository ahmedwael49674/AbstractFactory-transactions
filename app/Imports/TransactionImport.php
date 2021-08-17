<?php

namespace App\Imports;

use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return Maatwebsite\Excel\Concerns\ToCollection
    */
    public function collection(Collection $rows)
    {
    }
}
