<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemCategories = array(
            "Cameras" => array("DSLR Cameras", "Mirrorless Cameras", "Compact Cameras", "Action Cameras", "360-Degree Cameras"),
            "Laptops" => array("Gaming Laptops", "Ultrabooks", "2-in-1 Laptops", "Business Laptops", "Budget Laptops"),
            "Audio Devices" => array("Headphones", "Earphones", "Bluetooth Speakers", "Soundbars", "True Wireless Earbuds"),
            "Gaming Consoles" => array("PlayStation", "Xbox", "Nintendo Switch", "Gaming PCs", "Handheld Gaming Devices"),
            "Printers" => array("Inkjet Printers", "Laser Printers", "3D Printers", "All-in-One Printers", "Photo Printers"),
            "Computer Accessories" => array("Keyboards", "Mice", "Monitors", "External Hard Drives", "Webcams"),
            "Projectors" => array("HD Projectors", "4K Projectors", "Portable Projectors", "Home Theater Projectors", "Business Projectors"),
            "Other Rental Devices" => array("Audio/Visual Equipment", "Event Lighting", "Sound Systems", "Photography Equipment", "Virtual Reality Sets"),
           
        );

        foreach ($itemCategories as $categoryName => $items) {
            $category = \App\Models\ProductCategory::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
            ]);

            foreach ($items as $itemName) {
                \App\Models\ProductCategory::create([
                    'name' => $itemName,
                    'slug' => \Illuminate\Support\Str::slug($itemName),
                    'parent_id' => $category->id,
                ]);
            }
        }

    }
}
