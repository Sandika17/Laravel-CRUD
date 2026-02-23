<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Daftar nama produk yang realistis untuk konteks toko.
     */
    private array $productNames = [
        'Aqua Air Mineral 240ml',
        'Aqua Air Mineral 330ml',
        'Aqua Air Mineral 600ml',
        'Aqua Air Mineral 1500ml',
        'Aqua Air Mineral 5L (Galon Kecil)',
        'Aqua Galon 19L',
        'Aqua Sparkling 350ml',
        'Aqua Sparkling 750ml',
        'Aqua Multipack 240ml (isi 24)',
        'Aqua Multipack 600ml (isi 12)',
        'Aqua Multipack 1500ml (isi 6)',
        'Aqua GO 600ml (Sport Cap)',
        'Aqua Reflections 750ml (Botol Kaca)',
        'Aqua Kids 200ml',
        'Aqua Slim 330ml',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->unique()->randomElement($this->productNames),
            'description' => $this->faker->realText(200),
            'stock'       => $this->faker->numberBetween(0, 150),
            'price'       => $this->faker->randomElement([
                // Harga realistis produk Air Aqua
                2500, 3500, 4000, 5000, 6000,
                7500, 8000, 10000, 12000, 15000,
                20000, 25000, 35000, 55000, 75000,
            ]),
            'image'       => null,
        ];
    }

    /**
     * State: produk dengan stok habis.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }

    /**
     * State: produk dengan gambar (placeholder via picsum).
     */
    public function withImage(): static
    {
        return $this->state(fn (array $attributes) => [
            'image' => null, // di-set null karena gambar asli harus di-download
        ]);
    }
}
