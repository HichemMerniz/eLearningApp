<?php

namespace Database\Factories;

use App\Models\CoursePublier;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursePublierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CoursePublier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomCourse' => $this->faker->word,
        'description' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
