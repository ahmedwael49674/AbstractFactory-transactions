<?php

namespace App\Services\Transactions;

use Throwable;
use App\Exceptions\InvalidSourceException;

class TransactionFactory
{
    /**
     * using polymorphism and abstract factory design pattern
     * create an object by provided source
     *
     * @param String $source
     *
     * @return object
     */
    public function create(String $source):Object
    {
        $class =  "App\\Services\\Transactions\\Sources\\" . \strtoupper($source);
        try {
            return new $class();
        } catch (Throwable $e) {
            throw new InvalidSourceException;
        }
    }
}
