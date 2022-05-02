<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::insert([
            [
                'name' => 'Photoshop'
            ],
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'Illustrator'
            ],
            [
                'name' => 'Python'
            ],
            [
                'name' => 'Database Management'
            ],
            [
                'name' => 'Statistics'
            ],
            [
                'name' => 'jQuery'
            ],
            [
                'name' => 'Content Marketing'
            ],
            [
                'name' => 'E-mail Marketing'
            ],
            [
                'name' => 'Google Ads'
            ],
            [
                'name' => 'Facebook & Instagram Ads'
            ],
            [
                'name' => 'Machine Learning'
            ],
            [
                'name' => 'Search Engine Optimization'
            ],
            [
                'name' => 'Pandas'
            ]
        ]);
    }
}