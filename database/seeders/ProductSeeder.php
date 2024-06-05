<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed roles
        $adminRole = Role::create(['name' => 'Admin']);
        $renterRole = Role::create(['name' => 'Renter']);

        // Create users and assign roles
        $adminUser = User::factory()->create();
        $adminUser->assignRole('Admin');

        $renterUser = User::factory()->create();
        $renterUser->assignRole('Renter');

        // Seed subcategories
        $this->call(SubCategorySeeder::class);

        // Create products
        Product::factory()->count(10)->create();
    }
}
