<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * should return all transactions form db
     *
     * @return void
     */
    public function test_index_transactions_form_DB()
    {
        Transaction::factory()->count(20)->create();

        $this->get("api/v1/transactions?source=db")
            ->assertJsonStructure([
                [
                    "id"            ,
                    "code"          ,
                    "amount"        ,
                    "user_id"       ,
                    "created_at"    ,
                    "updated_at"    ,
                ]
            ])->assertJsonCount(20)
            ->assertOk();
    }

    /**
     * should return all transactions form csv
     *
     * @return void
     */
    public function test_index_transactions_form_csv()
    {
        $this->get("api/v1/transactions?source=csv")
            ->assertJsonStructure([
                [
                    "id"            ,
                    "code"          ,
                    "amount"        ,
                    "user_id"       ,
                    "created_at"    ,
                    "updated_at"    ,
                ]
            ])->assertJsonCount(100)
            ->assertOk();
    }

    /**
     * should return all transactions form csv
     *
     * @return void
     */
    public function test_index_transactions_invalid_form()
    {
        $this->get("api/v1/transactions")->assertStatus(422);
        
        $this->get("api/v1/transactions?source=html")
            ->assertJson(["source" =>"Invalid given source"])
            ->assertStatus(422);
    }
}
