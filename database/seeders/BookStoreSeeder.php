<?php

namespace Database\Seeders;

use App\Models\BookStore;
use Illuminate\Database\Seeder;

class BookStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookStore::factory(500)->create();
    }
}
