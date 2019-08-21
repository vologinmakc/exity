<?php

use App\Entity\District;
use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            'Центральный',
            'Заводской',
            'Куйбышевский',
            'Новоильинский',
            'Осинники'
        ];

        foreach ($districts as $district) {
            $dist = new District();
            $dist->name = $district;
            $dist->save();
        }
    }
}
