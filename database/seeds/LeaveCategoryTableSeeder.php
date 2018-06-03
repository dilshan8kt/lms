<?php

use Illuminate\Database\Seeder;
use App\LeaveCategory;

class LeaveCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lcat1 = new LeaveCategory();
        $lcat1->name = 'Casual';
        $lcat1->days = 3;
        $lcat1->save();

        $lcat2 = new LeaveCategory();
        $lcat2->name = 'Medical';
        $lcat2->days = 2;
        $lcat2->save();
    }
}
