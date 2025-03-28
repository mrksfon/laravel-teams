<?php

namespace Database\Factories;

use App\Models\TeamInvite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TeamInvite>
 */
class TeamInviteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token' => str()->random(30)
        ];
    }
}
