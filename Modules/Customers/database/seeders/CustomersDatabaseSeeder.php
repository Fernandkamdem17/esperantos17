<?php

namespace Modules\Customers\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Customers\Models\Customer;

class CustomersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'user_id' => 1,
            'name' => 'customer1',
            'surname' => '',
            'email' => 'customer1@email.com',
            'phone' => '656898745',
            'coordonnates_gps' => 'customer1customer1customer1customer1customer1customer1',
            'account_balance' => 1500,
            'credit_limit' => 500,
            'slug' => 'customer1'
        ]);
        Customer::create([
            'user_id' => 2,
            'name' => 'customer2',
            'surname' => '',
            'email' => 'customer2@email.com',
            'phone' => '6895231475',
            'coordonnates_gps' => 'customer2customer2customer2customer2customer2customer2',
            'account_balance' => 2500,
            'credit_limit' => 500,
            'slug' => 'customer2'
        ]);
        Customer::create([
            'user_id' => 3,
            'name' => 'customer3',
            'surname' => '698521358',
            'email' => 'customer3@email.com',
            'phone' => '',
            'coordonnates_gps' => 'customer3customer3customer3customer3customer3customer3',
            'account_balance' => 3500,
            'credit_limit' => 500,
            'slug' => 'customer3'
        ]);
    }
}
