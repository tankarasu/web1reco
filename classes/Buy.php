<?php
class Buy
{
    public function calculateTotal($quantity,$price){
        return intval($quantity) * floatval($price);
    }
}
?>