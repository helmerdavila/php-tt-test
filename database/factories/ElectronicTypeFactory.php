<?php

namespace Database\Factories;

use App\Models\ElectronicType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ElectronicTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ElectronicType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $typeName = $this->faker->word;

        return [
            'name'           => $typeName,
            'slug'           => Str::slug($typeName),
            'maximum_extras' => $this->faker->randomNumber(1),
        ];
    }
}
