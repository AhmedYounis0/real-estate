<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'        => 1,
            'name'      => 'Free',
            'price'     => '0',
            'duration'  => 30,
            'properties_allowed' => '2',
            'featured_properties' => '0',
            'photos_allowed' => '5',
            'videos_allowed' => '1'
        ];
    }
}
