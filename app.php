<?php 
require_once 'vendor/autoload.php';

use Models\Product;
use Models\Cart;
use Reader\Reader;
define("FILE_LOCATION", "input.txt");

class App{
    public function run(){
        //Read Lines
        $rows = Reader::getRows(FILE_LOCATION);
        //CREATE CART
        $cart = new Cart();
        //ITERATE EACH ROW 
        foreach($rows as $row){
            $product = new Product($row);
            $line = $product->calculate();
            $total = $cart->totalCart($line);
        }   

        print_r($cart->printResult());
    }
}

$app = new App;
$app->run();