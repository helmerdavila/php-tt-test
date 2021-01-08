<?php

namespace Tests\Unit;

use App\Instances\Cart;
use App\Models\ElectronicItem;
use App\Models\ElectronicType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @var Cart $cart */
    private $cart;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cart = Cart::instance();
    }

    public function test_add_item_to_cart()
    {
        $itemType = ElectronicType::factory()->create();

        $item = ElectronicItem::factory()->create(['electronic_type_id' => $itemType->id]);

        $this->cart->clean();

        $this->cart->add($item);

        $this->assertTrue($this->cart->count() === 1);
    }

    public function test_count_items_in_cart()
    {
        $this->cart->clean();

        $this->assertTrue($this->cart->count() === 0);

        $itemType = ElectronicType::factory()->create();

        $items = ElectronicItem::factory(2)->create(['electronic_type_id' => $itemType->id]);

        foreach ($items as $item) {
            $this->cart->add($item);
        }

        $this->assertTrue($this->cart->count() === $items->count());
    }

    public function test_remove_item_from_cart()
    {
        $this->cart->clean();

        $itemType = ElectronicType::factory()->create();

        $item = ElectronicItem::factory()->create(['electronic_type_id' => $itemType->id]);
        $moreItems = ElectronicItem::factory(2)->create(['electronic_type_id' => $itemType->id]);

        $this->cart->add($item);
        $this->cart->add($item);

        foreach ($moreItems as $itemPlus) {
            $this->cart->add($itemPlus);
        }

        $this->cart->remove($item);

        $this->assertTrue($this->cart->count() === 3);

        foreach ($moreItems as $itemPlus) {
            $this->cart->remove($itemPlus);
        }

        $this->cart->remove($item);

        $this->assertTrue($this->cart->count() === 0);
    }

    public function test_calculating_total()
    {
        $itemType = ElectronicType::factory()->create();

        $firstAmount = $this->faker->numberBetween(300, 900);
        $secondAmount = $this->faker->numberBetween(300, 900);

        $item = ElectronicItem::factory()->create(['electronic_type_id' => $itemType->id, 'price' => $firstAmount]);
        $moreItems = ElectronicItem::factory(2)->create(['electronic_type_id' => $itemType->id, 'price' => $secondAmount]);

        $this->cart->clean();

        foreach ($moreItems as $anotherItem) {
            $this->cart->add($anotherItem);
        }

        $this->assertTrue(floatval($this->cart->total()) === floatval($secondAmount * 2));

        $this->cart->add($item);

        $this->assertTrue(floatval($this->cart->total()) === floatval($secondAmount * 2 + $firstAmount));
    }

    public function test_contains_or_not_an_item()
    {
        $itemType = ElectronicType::factory()->create();

        /** @var ElectronicItem $item */
        $item = ElectronicItem::factory()->create(['electronic_type_id' => $itemType->id]);

        $this->cart->clean();

        $this->assertFalse($this->cart->contains($item));

        $this->cart->add($item);

        $this->assertTrue($this->cart->contains($item));
    }
}
