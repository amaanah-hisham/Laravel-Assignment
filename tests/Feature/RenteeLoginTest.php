<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RenteeLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_example(): void
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    public function test_rentee_can_view_dashboard(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Rentee")->first();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
    }


    public function test_rentee_cannot_view_products_create_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Rentee")->first();

        $response = $this->actingAs($user)->get(route('product.create'));

        $response->assertStatus(403);
    }

    public function test_rentee_cannot_view_sub_category_create_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Rentee")->first();

        $response = $this->actingAs($user)->get(route('product-sub-categories.create'));

        $response->assertStatus(403);
    }

    public function test_rentee_cannot_view_create_user_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Rentee")->first();

        $response = $this->actingAs($user)->get(route('user.create'));

        $response->assertStatus(403);
    }
}
