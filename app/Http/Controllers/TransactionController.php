<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Http\Requests\IndexTransactions;

class TransactionController extends Controller
{
    protected $service;

    public function __construct(TransactionService $transactionService)
    {
        $this->service = $transactionService;
    }

    /**
    * Index all transactions
    *
    * @param IndexTransactions $request
    *
    * @return Json
    */
    public function index(IndexTransactions $request)
    {
        $transactions = $this->service->index($request->source);

        return response()->json($transactions);
    }
}
