<?php

namespace App\Library;

/**
 * @author Wojciech Brüggemann <wojtek77@o2.pl>
 */
class CartItem
{
    public $id;
    public $name;
    public $grossPrice;
    public $percentVat;
    public $quantity;
    public $netPrice;
    
    function __construct($id, $name, $grossPrice, $percentVat, $quantity)
    {
        $this->set($id, $name, $grossPrice, $percentVat, $quantity);
    }
    
    public function set($id, $name, $grossPrice, $percentVat, $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->grossPrice = $grossPrice;
        $this->percentVat = $percentVat;
        $this->quantity = $quantity;
        $this->netPrice = round($grossPrice / ($percentVat + 100) * 100, 2);
    }
}
