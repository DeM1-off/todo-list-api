<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{

    protected $model = Task::class;

    public function definition()
    {
        return [
          'status' => $this->faker->boolean(),
          'priority' => $this->faker->randomNumber(),
          'title' => $this->faker->word(),
          'description' => $this->faker->text(),
          'user_id' => $this->faker->randomNumber(),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ];
    }

}
