<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $admin = Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Renter']);
        Role::create(['name' => 'Rentee']);

        \App\Models\User::factory(10)->create();

        $admin_created = \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'password' => bcrypt('admin'),
             'role' => 1,
         ]);

        $admin_created->assignRole('Admin');

         $this->call([
            ProductCategorySeeder::class
         ]);



    }
}
