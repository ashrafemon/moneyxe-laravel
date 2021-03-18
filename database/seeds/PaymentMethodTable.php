<?php

use Illuminate\Database\Seeder;

use App\Model\PaymentMethod;

class PaymentMethodTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::truncate();

        PaymentMethod::create([
            'title' => 'PAYPAL',
            'code' => 'paypal',
            'method_id' => 'admin@paypal.com'
        ]);

        PaymentMethod::create([
            'title' => 'SKRILL',
            'code' => 'skrill',
            'method_id' => 'admin@skrill.com'
        ]);

        PaymentMethod::create([
            'title' => 'NETELLAR',
            'code' => 'netellar',
            'method_id' => 'admin@neteller.com'
        ]);
    }
}
