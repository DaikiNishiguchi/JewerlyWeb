<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        'file_name' => 100,
        'name' => 'サンプルリング',
        'comment' => 'サンプル１',
        'price' => '15000',
        'stock' => '10',
        'size' => 'L',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ]);
    }
}
