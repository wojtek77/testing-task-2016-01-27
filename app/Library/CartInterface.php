<?php


namespace App\Library;

interface CartInterface
{
    public function set($id, $name, $grossPrice, $vat, $quantity = 1);
    
    public function delete($id);
    
    public function show();
    
    public function get($id);
        
    public function total();

    public function count($quantity = false);
}
