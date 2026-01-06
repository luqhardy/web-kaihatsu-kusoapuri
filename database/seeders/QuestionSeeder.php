<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            ['text' => '日本の首都はどこですか？', 'created_at' => now(), 'updated_at' => now()],
            ['text' => '世界で一番高い山は？', 'created_at' => now(), 'updated_at' => now()],
            ['text' => '1年は何ヶ月ですか？', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
