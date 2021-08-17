<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Services\Transactions\TransactionFactory;

class TransactionService
{
    protected $factory;

    public function __construct(TransactionFactory $transactionFactory)
    {
        $this->factory = $transactionFactory;
    }

    /**
    * index transactions
    *
    * @param string $source
    *
    * @return Collection
    */
    public function index(string $source):Collection
    {
        $transaction    = $this->factory->create($source);
        $transactions   = $transaction->index();
        
        return $transactions;
    }
}
