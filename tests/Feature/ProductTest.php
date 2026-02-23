<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_products()
    {
        Product::factory()->count(3)->create();

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertViewHas('products');
    }

    public function test_can_create_product_with_image()
    {
        Storage::fake('public');

        $image = UploadedFile::fake()->image('product.jpg');

        $data = [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'stock' => 10,
            'price' => 100.00,
            'image' => $image,
        ];

        $response = $this->post(route('products.store'), $data);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'stock' => 10,
            'price' => 100.00,
        ]);

        $product = Product::first();
        Storage::disk('public')->assertExists($product->image);
    }

    public function test_can_update_product_and_replace_image()
    {
        Storage::fake('public');

        $oldImage = UploadedFile::fake()->image('old.jpg');
        $product = Product::create([
            'name' => 'Old Product',
            'stock' => 5,
            'price' => 50.00,
            'image' => $oldImage->store('products', 'public'),
        ]);

        Storage::disk('public')->assertExists($product->image);
        $oldImagePath = $product->image;

        $newImage = UploadedFile::fake()->image('new.jpg');
        $data = [
            'name' => 'Updated Product',
            'stock' => 15,
            'price' => 150.00,
            'image' => $newImage,
        ];

        $response = $this->put(route('products.update', $product), $data);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Updated Product',
            'stock' => 15,
            'price' => 150.00,
        ]);

        $product->refresh();
        Storage::disk('public')->assertExists($product->image);
        Storage::disk('public')->assertMissing($oldImagePath);
    }

    public function test_can_delete_product_and_remove_image()
    {
        Storage::fake('public');

        $image = UploadedFile::fake()->image('product.jpg');
        $product = Product::create([
            'name' => 'Delete Me',
            'stock' => 1,
            'price' => 10.00,
            'image' => $image->store('products', 'public'),
        ]);

        Storage::disk('public')->assertExists($product->image);
        $imagePath = $product->image;

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        Storage::disk('public')->assertMissing($imagePath);
    }
}
