<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('companies')->truncate();
        DB::table('customers')->truncate();
        DB::table('invoices')->truncate();
        DB::table('invoice_items')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Company::factory(1)->create();
        Customer::factory(50)->create();
        Invoice::factory(50)
            ->withDynamicDetails()
            ->create();
        InvoiceItem::factory(5000)
            ->withInvoice()
            ->create();

        $this->call([
            UsersTableSeeder::class,
            PerformInvoiceCalculations::class,
        ]);
    }
}
