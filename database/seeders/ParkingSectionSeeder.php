<?php
namespace Database\Seeders;

use App\Models\ParkingSection;
use Illuminate\Database\Seeder;

class ParkingSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParkingSection::insert([
            [
                'name'  => 'Primary Section',
                'left'  => 'A',
                'right' => 'B',
            ],
            [
                'name'  => 'Secondary Section',
                'left'  => 'C',
                'right' => 'D',
            ],
            [
                'name'  => 'ternary Section',
                'left'  => 'E',
                'right' => 'F',
            ],
        ]
        );
    }
}
