<?php

use Illuminate\Database\Seeder;

use App\Model\Currency;

class CurrencyTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();

        Currency::create([
            'title' => 'American Dollar',
            'code' => 'USD',
            'avatar' => 'currency-flag-usd',
            'value' => '1',
            'symbol' => '$'
        ]);

        Currency::create([
            'title' => 'Bangladeshi Taka',
            'code' => 'BDT',
            'avatar' => 'currency-flag-bdt',
            'value' => '86',
            'symbol' => '৳'
        ]);

        Currency::create([
            'title' => 'Indian Rupee',
            'code' => 'INR',
            'avatar' => 'currency-flag-inr',
            'value' => '75',
            'symbol' => '₹'
        ]);
    }
}
