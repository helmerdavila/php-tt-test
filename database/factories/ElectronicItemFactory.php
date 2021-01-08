<?php

namespace Database\Factories;

use App\Models\ElectronicItem;
use App\Models\ElectronicType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ElectronicItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ElectronicItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                  => $this->faker->word(),
            'electronic_type_id'    => ElectronicType::factory()->create()->id,
            "price"                 => $this->faker->randomNumber(4),
            "is_wired"              => $this->faker->boolean,
            "is_single_purchasable" => $this->faker->boolean,
            "image"                 => $this->faker->imageUrl(),
        ];
    }
}
