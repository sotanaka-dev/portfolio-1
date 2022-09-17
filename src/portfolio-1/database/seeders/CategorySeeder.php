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
    {
        $param = [
            'name' => 'カテゴリ-1',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'カテゴリ-2',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'カテゴリ-3',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'カテゴリ-4',
        ];
        DB::table('categories')->insert($param);
    }
}
