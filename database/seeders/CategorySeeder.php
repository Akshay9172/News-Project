<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            DB::table('categories')->insert([
                ['category_name' => 'Lifestyle'],
                ['category_name' => 'Technology'],
                ['category_name' => 'Sports'],
                ['category_name' => 'Travel'],
                ['category_name' => 'Health'],
                ['category_name' => 'Entertainment'],
            ]);
        }
    }
}
