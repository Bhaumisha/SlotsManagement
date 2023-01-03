<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TimeSlot;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hoursArray = ['9 AM','10 AM','11 AM','10 PM','01 PM','02 PM','03 PM','04 PM','05 PM'];
        foreach ($hoursArray as $key => $value) {
        	TimeSlot::create(['hour_slots'=>$value]);
        }
    }
}
