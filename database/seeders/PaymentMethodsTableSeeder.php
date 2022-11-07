<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_methods = [
            ['id' => 1, 'name' => 'Payoneer', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()], 
            ['id' => 2, 'name' => 'Stripe', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()], 
            ['id' => 3, 'name' => 'Paystack', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()], 
            
        ];

        PaymentMethod::insert($payment_methods);
    }
}
