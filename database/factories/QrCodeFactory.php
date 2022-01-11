<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QrCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $path = $this->faker->image('public/storage/qr-codes');
        $path = str_replace('public/storage/', '', $path);

        return [
            'path' => $path
        ];
    }
}
