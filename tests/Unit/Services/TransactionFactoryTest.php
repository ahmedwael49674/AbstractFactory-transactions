<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\Transactions\Sources\DB;
use App\Exceptions\InvalidSourceException;
use App\Services\Transactions\Sources\CSV;
use App\Services\Transactions\TransactionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * should call factory->create
     *
     * @return void
     */
    public function test_transaction_factory_create()
    {
        $factory = $this->app->get(TransactionFactory::class);

        $this->assertInstanceOf(DB::class, $factory->create("db"));
        $this->assertInstanceOf(CSV::class, $factory->create("csv"));
        try {
            $factory->create("html");
        } catch (InvalidSourceException $e) {
            $e = $e->render();
            $this->assertEquals(422, $e->getStatusCode());
        }
    }
}
