<?php
namespace Models;
use Models\Currency;

class Product extends Currency{
  
    public function __construct($line){
        $this->line = $line;
    }

    public function calculate(){
        $row = $this->setData();
        $row = Currency::convert($row);
        return $row;
    }

    //MAKE ASSOSIATIVE ARRAY FROM STRING
    private function setData(){
        $values = explode(';', $this->line);
        $formatedRow =  array(
            "id" => $values[0],
            "name" => $values[1],
            "quantity" => $values[2],
            "price" => $values[3],
            "currency" => $values[4]
        );
        return $formatedRow;
    }


}

