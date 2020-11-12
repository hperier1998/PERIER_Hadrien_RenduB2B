<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\BoardUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BoardUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'board_id' => Board::factory()
        ];
    }
}
