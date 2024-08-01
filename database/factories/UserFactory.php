<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = User::class;

    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'), // Static password for all instances
            'phone' => $this->faker->phoneNumber, // Generate a phone number
            'img_url' => Str::random(10) . '.png', // Ensure the extension is properly concatenated
            'birth_datetime' => $this->faker->dateTime(), // Generate a realistic datetime
            'birth_place' => $this->faker->city(), // Use Faker's city generator for birth place
            'gender' => $this->faker->randomElement(['Male', 'Female']), // Randomize gender
            'cash_amount' => $this->faker->randomFloat(2, 1000, 10000), // Generate a realistic float amount
            'follower' => $this->faker->numberBetween(0, 10000),
            'remember_token' => Str::random(10),
            'date_created' => $this->faker->dateTime(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
