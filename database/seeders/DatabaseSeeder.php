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

        $renters = \App\Models\User::factory(10)->create();

        foreach ($renters as $renter) {
            $renter->assignRole('Renter');
        }

        $members_rentee = \App\Models\User::factory(20)->create();

        foreach ($members_rentee as $member_rentee) {
            $member_rentee->assignRole('Renteee');
        }

        $admin_created = \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'password' => bcrypt('admin'),

         ]);

        $admin_created->assignRole('Admin');

         $this->call([
            ProductCategorySeeder::class
         ]);



    }
}
