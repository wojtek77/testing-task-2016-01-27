<?php

namespace App\Library;

/**
 * @author Wojciech Brüggemann <wojtek77@o2.pl>
 */
class Cart implements CartInterface
{
    /**
     * @var array of CartItem
     */
    protected $items = [];


    /**
     * @param bool $quantity
     * @return int
     */
    public function count($quantity = false)
    {
        if ($quantity) {
            return count($this->items);
        } else {
            $count = 0;
            foreach ($this->items as $item) {
                $count += $item->quantity;
            }
            return $count;
        }
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        unset($this->items[$id]);
    }

    /**
     * @param int $id
     * @return CartItem
     */
    public function get($id)
    {
        return isset($this->items[$id]) ? $this->items[$id] : null;
    }

    /**
     * @param int $id
     * @param string $name
     * @param float $grossPrice
     * @param int $percentVat
     * @param int $quantity
     */
    public function set($id, $name, $grossPrice, $percentVat, $quantity = 1)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]->set($id, $name, $grossPrice, $percentVat, $quantity);
        } else {
            $item = new CartItem($id, $name, $grossPrice, $percentVat, $quantity);
            $this->items[$id] = $item;
        }
    }

    public function show()
    {
//        echo '<pre>';
//        var_dump($this->items);
//        echo '</pre>';
        echo '<pre>'.print_r($this->items, true).'</pre>';
    }

    /**
     * @return float
     */
    public function total()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->grossPrice;
        }
        return $total;
    }
}
