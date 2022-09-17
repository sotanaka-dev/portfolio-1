<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'product-1',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 5000,
            'stock' => 9,
            'path' => 'storage/images/products/product-1/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-2',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 900,
            'stock' => 5,
            'path' => 'storage/images/products/product-2/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-3',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 3000,
            'stock' => 0,
            'path' => 'storage/images/products/product-3/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-4',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 10000,
            'stock' => 45,
            'path' => 'storage/images/products/product-4/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-5',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 2000,
            'stock' => 5,
            'path' => 'storage/images/products/product-5/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-6',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 900,
            'stock' => 100,
            'path' => 'storage/images/products/product-6/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-7',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 500,
            'stock' => 10,
            'path' => 'storage/images/products/product-7/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-8',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 20000,
            'stock' => 9,
            'path' => 'storage/images/products/product-8/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-9',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 1000,
            'stock' => 100,
            'path' => 'storage/images/products/product-9/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-10',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 12000,
            'stock' => 8,
            'path' => 'storage/images/products/product-10/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-11',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 15000,
            'stock' => 100,
            'path' => 'storage/images/products/product-11/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-12',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 5000,
            'stock' => 15,
            'path' => 'storage/images/products/product-12/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-13',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 4000,
            'stock' => 20,
            'path' => 'storage/images/products/product-13/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-14',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 28000,
            'stock' => 10,
            'path' => 'storage/images/products/product-14/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-15',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 30000,
            'stock' => 9,
            'path' => 'storage/images/products/product-15/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-16',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 6000,
            'stock' => 5,
            'path' => 'storage/images/products/product-16/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-17',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 7000,
            'stock' => 20,
            'path' => 'storage/images/products/product-17/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-18',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 9000,
            'stock' => 60,
            'path' => 'storage/images/products/product-18/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-19',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 1000,
            'stock' => 100,
            'path' => 'storage/images/products/product-19/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-20',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 3000,
            'stock' => 40,
            'path' => 'storage/images/products/product-20/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-21',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 5000,
            'stock' => 30,
            'path' => 'storage/images/products/product-21/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-22',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 7000,
            'stock' => 40,
            'path' => 'storage/images/products/product-22/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-23',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 13000,
            'stock' => 20,
            'path' => 'storage/images/products/product-23/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-24',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 14000,
            'stock' => 15,
            'path' => 'storage/images/products/product-24/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-25',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 600,
            'stock' => 100,
            'path' => 'storage/images/products/product-25/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-26',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 1500,
            'stock' => 100,
            'path' => 'storage/images/products/product-26/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-27',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 9000,
            'stock' => 30,
            'path' => 'storage/images/products/product-27/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-28',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 6000,
            'stock' => 50,
            'path' => 'storage/images/products/product-28/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-29',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 50000,
            'stock' => 5,
            'path' => 'storage/images/products/product-29/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-30',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 19000,
            'stock' => 15,
            'path' => 'storage/images/products/product-30/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-31',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 3000,
            'stock' => 10,
            'path' => 'storage/images/products/product-31/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-32',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 16000,
            'stock' => 9,
            'path' => 'storage/images/products/product-32/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-33',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 5000,
            'stock' => 50,
            'path' => 'storage/images/products/product-33/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-34',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 3000,
            'stock' => 10,
            'path' => 'storage/images/products/product-34/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-35',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 10000,
            'stock' => 20,
            'path' => 'storage/images/products/product-35/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-36',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 1000,
            'stock' => 8,
            'path' => 'storage/images/products/product-36/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-37',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 2000,
            'stock' => 0,
            'path' => 'storage/images/products/product-37/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-38',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 20000,
            'stock' => 5,
            'path' => 'storage/images/products/product-38/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-39',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 900,
            'stock' => 15,
            'path' => 'storage/images/products/product-39/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-40',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 9000,
            'stock' => 10,
            'path' => 'storage/images/products/product-40/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-41',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 10000,
            'stock' => 9,
            'path' => 'storage/images/products/product-41/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-42',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 12000,
            'stock' => 0,
            'path' => 'storage/images/products/product-42/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-43',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 1000,
            'stock' => 50,
            'path' => 'storage/images/products/product-43/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-44',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 6000,
            'stock' => 9,
            'path' => 'storage/images/products/product-44/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-45',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 5000,
            'stock' => 30,
            'path' => 'storage/images/products/product-45/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-46',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 3000,
            'stock' => 15,
            'path' => 'storage/images/products/product-46/',
            'category_id' => 3,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-47',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 2000,
            'stock' => 8,
            'path' => 'storage/images/products/product-47/',
            'category_id' => 2,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-48',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 10000,
            'stock' => 0,
            'path' => 'storage/images/products/product-48/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-49',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 6000,
            'stock' => 7,
            'path' => 'storage/images/products/product-49/',
            'category_id' => 4,
        ];
        DB::table('products')->insert($param);

        $param = [
            'name' => 'product-50',
            'description' =>
            'TextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextTextText',
            'price' => 5000,
            'stock' => 20,
            'path' => 'storage/images/products/product-50/',
            'category_id' => 1,
        ];
        DB::table('products')->insert($param);
    }
}
