<?php

namespace Database\Factories;

use App\Models\Astrologer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AstrologerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Astrologer::class;

    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // Static password for all instances
            'phone' => $this->faker->phoneNumber, // Generate a phone number
            'img_url' => Str::random(10) . '.png', // Ensure the extension is properly concatenated
            'experience_years' => $this->faker->numberBetween(0, 30), // Generate a realistic datetime
            'specialization' => $this->faker->jobTitle(), // Use Faker's city generator for birth place
            'bio' => $this->faker->paragraph(),
            'gender' => $this->faker->randomElement(['Male', 'Female']), // Randomize gender
            'cash_amount' => $this->faker->randomFloat(2, 1000, 10000), // Generate a realistic float amount
            'date_created' => $this->faker->dateTime(),
        ];
    }
}
