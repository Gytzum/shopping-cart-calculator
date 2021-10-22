<?php
namespace Models;
class Cart{
        private $cart = array();
        public $total = 0;

        public function __construct(){
            $this->cart;
            $this->total;
        }
        public function totalCart($product){
            $this->isProductInCart($product['id'], $this->cart);
            $this->updateCart($product);
        }
        public function updateCart($product){
            if($product['quantity'] > 0){
                $this->addToCart($product);
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