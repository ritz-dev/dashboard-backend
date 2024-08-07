<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    protected $model = Admin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password encryption
            'phone' => $this->faker->phoneNumber,
            'profile_picture' => $this->faker->imageUrl,
            'role_id' => 1, // Create a role using the RoleFactory
            'is_active' => true,
            'remember_token' => \Illuminate\Support\Str::random(10),
        ];
    }
}
