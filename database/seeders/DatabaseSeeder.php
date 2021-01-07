<?php

namespace Database\Seeders;

use App\Models\ElectronicItem;
use App\Models\ElectronicType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $consoleType = ElectronicType::factory()->create([
            'name'           => 'Console',
            'slug'           => 'console',
            'maximum_extras' => 4,
        ]);
        $televisionType = ElectronicType::factory()->create([
            'name'           => 'Television',
            'slug'           => 'television',
            'maximum_extras' => 99999,
        ]);
        $microwaveType = ElectronicType::factory()->create([
            'name'           => 'Microwave',
            'slug'           => 'microwave',
            'maximum_extras' => 0,
        ]);
        $controllerType = ElectronicType::factory()->create([
            'name'           => 'Controller',
            'slug'           => 'controller',
            'maximum_extras' => 0,
        ]);

        $wirelessController = ElectronicItem::factory()->create([
            'electronic_type_id'    => $controllerType->id,
            'name'                  => "Xbox Wireless {$controllerType->name}",
            "price"                 => 150,
            "is_wired"              => false,
            "is_single_purchasable" => true,
            "image"                 => "https://assets.taskalia.com/tracktik/xbox_controller.jpg",
        ]);

        $wiredController = ElectronicItem::factory()->create([
            'electronic_type_id'    => $controllerType->id,
            'name'                  => "Xbox Wired {$controllerType->name}",
            "price"                 => 100,
            "is_wired"              => true,
            "is_single_purchasable" => true,
            "image"                 => "https://assets.taskalia.com/tracktik/wired_controller.jpg",
        ]);

        $tvController = ElectronicItem::factory()->create([
            'electronic_type_id'    => $controllerType->id,
            'name'                  => "TV {$controllerType->name}",
            "price"                 => 30,
            "is_wired"              => false,
            "is_single_purchasable" => true,
            "image"                 => "https://assets.taskalia.com/tracktik/tv-controller.jpg",
        ]);

        $console = ElectronicItem::factory()->create([
            'electronic_type_id'    => $consoleType->id,
            'name'                  => "Xbox {$consoleType->name}",
            "price"                 => 500,
            "is_wired"              => true,
            "is_single_purchasable" => true,
            "image"                 => "https://assets.taskalia.com/tracktik/xbox.jpg",
        ]);
        $console->extras()->sync([$wiredController->id => ['quantity' => 2], $wirelessController->id => ['quantity' => 2]]);

        $televisionOne = ElectronicItem::factory()->create([
            'electronic_type_id'    => $televisionType->id,
            'name'                  => "Samsung {$televisionType->name}",
            "price"                 => 1000,
            "is_wired"              => true,
            "is_single_purchasable" => true,
            "image"                 => "https://assets.taskalia.com/tracktik/samsung-tv.png",
        ]);
        $televisionOne->extras()->sync([$tvController->id => ['quantity' => 2]]);

        $televisionTwo = ElectronicItem::factory()->create([
            'electronic_type_id'    => $televisionType->id,
            'name'                  => "LG {$televisionType->name}",
            "price"                 => 900,
            "is_wired"              => true,
            "is_single_purchasable" => true,
            "image"                 => "https://assets.taskalia.com/tracktik/lg-tv.jpg",
        ]);
        $televisionTwo->extras()->sync([$tvController->id => ['quantity' => 1]]);

        ElectronicItem::factory()->create([
            'electronic_type_id'    => $microwaveType->id,
            'name'                  => "Samsung {$microwaveType->name}",
            "price"                 => 900,
            "is_wired"              => true,
            "is_single_purchasable" => true,
            "image"                 => "https://assets.taskalia.com/tracktik/microwave.png",
        ]);
    }
}
