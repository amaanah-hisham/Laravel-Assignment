<?php

namespace Tests\Feature;

use App\Livewire\Product\Create;
use App\Models\ProductSubCategory;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class SellerLoginTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_seller_login_page_can_be_viewed(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

//    public function test_seller_login_attempt_successful(): void
//    {
//        $this->seed(DatabaseSeeder::class);
//
//        $user = User::role("Renter")->first();
//
//        $response = $this->post(route('login'), [
//            'email' => $user->email,
//            'password' => $user->password,
//        ]);
//
//        $this->assertAuthenticated();
//    }


    public function test_seller_can_view_dashboard(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Renter")->first();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
    }

    public function test_seller_can_view_product_create_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Renter")->first();

        Livewire::actingAs($user)
            ->test(Create::class)
            ->assertStatus(200);
    }

    public function test_seller_can_view_product_index_page(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Renter")->first();

        $response = $this->actingAs($user)->get(route('product.index'));

        $response->assertStatus(200);
    }

    public function test_seller_can_add_a_product(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Renter")->first();

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

    public function test_seller_has_errors_adding_a_product(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::role("Renter")->first();

        $sub_category = ProductSubCategory::inRandomOrder()->first();

        Storage::fake('public');
        $file = UploadedFile::fake()->image('image.png');
//        var_dump($file);

        Livewire::actingAs($user)
            ->test(Create::class)
            ->call('save')
            ->set([
                'sub_category' => "",
                'title' => ""
            ])
            ->assertHasErrors(['sub_category','title']);
    }

    public function test_seller_cannot_view_dashboard_without_login(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));

    }
}
