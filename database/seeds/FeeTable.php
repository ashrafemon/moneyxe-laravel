<?php

use Illuminate\Database\Seeder;

use App\Model\Fee;

class FeeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fee::truncate();

        Fee::create([
            'amount' => '4.20'
        ]);
    }
}
