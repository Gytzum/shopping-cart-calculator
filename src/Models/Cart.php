<?php
namespace Models;
use \Exception as Exception;
class Cart{
        private $cart = array();
        public $total = 0;

        public function __construct(){
            $this->cart;
            $this->total;
        }
        public function totalCart($product){
            $this->isProductInCart($product['id'], $this->cart);
            $this->checkQuantity($product);
        }
        public function checkQuantity($product){
            if($product['quantity'] > 0){
                $this->addToCart($product);
            }  
            if($product['quantity'] == 0){
                throw new Exception('You can add or remove products only!');
            }
        }
        public function isProductInCart($id, $products){
            foreach($products as $key => $product){
                if($products[$key]['id'] == $id){
                    $this->removeFromCart($key);
                }
            }
        }

        private function addToCart($product){
            array_push($this->cart, $product);
        }

        private function removeFromCart($key){
            unset($this->cart[$key]);
        }

        public function printResult(){
            
            $cart = $this->cart;
            $total = 0;
            echo "\nPRODUCTS IN CART\n \n";
            foreach($cart as $key => $item){
                $total += $item['price'];
                echo $item['id']." ". $item['name']." ".$item['quantity'] ." ". $item['price'] ." ". $item['currency']."\n";
            }
            return "TOTAL IS : $total EUR\n";
        }
    }