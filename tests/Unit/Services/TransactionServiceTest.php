<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\TransactionService;
use App\Services\Transactions\Sources\DB;
use App\Services\Transactions\TransactionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * should call factory->create
     *
     * @return void
     */
    public function test_transaction_service_index()
    {
        $mockedDB = $this->mock(DB::class, function ($mock) {
            $mock->shouldReceive('index')
                        ->once();
        });

        $this->mock(TransactionFactory::class, function ($mock) use ($mockedDB) {
            $mock->shouldReceive('create')
                ->once()
                ->andReturn($mockedDB);
        });
        
        $this->app->get(TransactionService::class)->index("db");
    }
}
