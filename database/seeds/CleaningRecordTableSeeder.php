<?php

use Illuminate\Database\Seeder;
use App\CleaningRecord;

class CleaningRecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CleaningRecord::truncate();
        factory(CleaningRecord::class, 20)->create();
    }
}
