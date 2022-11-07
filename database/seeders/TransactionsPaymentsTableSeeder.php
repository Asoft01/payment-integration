<?php

namespace Database\Seeders;

use App\Models\TransactionPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionsPaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction_payments = [
            ['id' => 1, 'customer_name' => 'Admin Admin', 'payment_id' => 1, 'amount' => 100.00, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()], 

        ];

        TransactionPayment::insert($transaction_payments);
    }
}
