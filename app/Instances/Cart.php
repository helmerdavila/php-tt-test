<?php

namespace App\Instances;

use App\Models\ElectronicItem;
use Illuminate\Support\Collection;

class Cart
{
    private static $instance = null;
    const SESSION_CART_KEY = "SESSION_CART";

    public static function instance(): Cart
    {
        if (is_null(self::$instance)) {
            self::$instance = new Cart();
        }

        return self::$instance;
    }

    public function add(ElectronicItem $item)
    {
        $content = $this->content();

        $content = $content->add($item);

        $this->setContent($content->toArray());
    }

    public function remove(ElectronicItem $item)
    {
        $content = $this->content();

        $indexFirstElement = null;

        $content->each(function ($electronicItem, $index) use ($item, &$indexFirstElement) {
            if ($electronicItem['id'] === $item->id) {
                $indexFirstElement = $index;

                return false;
            }
        });

        if ($indexFirstElement !== null) {
            $content->splice($indexFirstElement, 1);
        }

        $this->setContent($content->toArray());
    }

    public function total()
    {
        $content = $this->content();

        return sprintf("%0.2f", $content->sum('price'));
    }

    public function count()
    {
        $content = $this->content();

        return $content->count();
    }

    public function clean()
    {
        $this->setContent([]);
    }

    public function content(): Collection
    {
        return \Cache::get(self::SESSION_CART_KEY, collect([]));
    }

    public function setContent(array $items): bool
    {
        return \Cache::set(self::SESSION_CART_KEY, collect($items));
    }

    public function contains(ElectronicItem $item): bool
    {
        return $this->content()->contains(fn($electronicItem) => $electronicItem['id'] === $item->id);
    }
}
