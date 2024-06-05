<?php

namespace Tests\Feature;

use App\Livewire\Product\Create;
use App\Models\Product;
use App\Models\ProductSubCategory;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;


class AdminLoginTest extends TestCase
{

    use RefreshDatabase;

    public function test_admin_login_page_can_be_viewed(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    public function test_admin_can_view_dashboard(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Admin")->first();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
    }

    public function test_admin_can_view_product_create_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Admin")->first();

        $response = $this->actingAs($user)->get(route('product.create'));

        $response->assertStatus(200);
    }



    public function test_admin_can_view_product_index_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Admin")->first();

        $response = $this->actingAs($user)->get(route('product.index'));

        $response->assertStatus(200);
    }


    public function test_admin_can_view_sub_category_create_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Admin")->first();

        $response = $this->actingAs($user)->get(route('product-sub-categories.create'));

        $response->assertStatus(200);
    }

    public function test_admin_can_view_sub_category_index_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Admin")->first();

        $response = $this->actingAs($user)->get(route('product-sub-categories-view'));

        $response->assertStatus(200);
    }

    public function test_only_admin_can_view_sub_category_create_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Renter")->first();

        $response = $this->actingAs($user)->get(route('product-sub-categories.create'));

        $response->assertStatus(403);
    }


    public function test_admin_can_add_a_product(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Admin")->first();

        $sub_category = ProductSubCategory::inRandomOrder()->first();

        Storage::fake('public');
        $file = UploadedFile::fake()->image('image.png');
//        var_dump($file);

        Livewire::actingAs($user)
            ->test(Create::class)
            ->set([
                'sub_category' => $sub_category->id,
                'title' => "Test Title",
                'price' => 5000,
                'description' => "Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet",
                'image' => $file
            ])
            ->assertStatus(200);
    }

    public function test_admin_cannot_view_dashboard_without_login(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));

    }

    public function test_admin_can_view_user_create(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Admin")->first();

        $response = $this->actingAs($user)->get(route('user.create'));

        $response->assertStatus(200);
    }

    public function test_only_admin_can_view_user_create(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Renter")->first();

        $response = $this->actingAs($user)->get(route('user.create'));

        $response->assertStatus(403);
    }

    public function test_admin_can_create_user(): void
    {

        $this->seed(DatabaseSeeder::class);

        $user = User::role("Admin")->first();

        $this->actingAs($user)->withoutMiddleware();


        $userData = [

            'name' => 'Test User',
            'email' => 'test3654@gmail.com',
            'mobile' => '0776523256',
            'address' => 'No 32, Colombo Road, Colombo 07',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 1
        ];

        $response = $this->post(route('user.store'), $userData);

        $response->assertStatus(302);
    }


}
