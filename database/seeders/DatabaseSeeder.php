<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // load transactions.sql
        // $path = str_replace("seeders", "database.sql", __DIR__);
        // DB::unprepared($path);

        $this->call([
            TransactionTableSeeder::class,
        ]);
    }
}
