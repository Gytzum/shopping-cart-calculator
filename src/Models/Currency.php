<?php
namespace Models;

define("DEFAULTCURRENCY", "EUR");
define("CURRENCIES", ["EUR" => 1 ,"USD" => 1.14 ,"GBP" => 0.88]);

class Currency
{
  public string $currency;

  public float $price;
  
  public function __construct(){
  } 

  public static function convert($row){
    $row['currency'] = trim($row['currency']);

    if($row['currency'] !== DEFAULTCURRENCY){
      foreach(CURRENCIES as $key => $value){
        if($row['currency'] == $key){
          $row['price'] = round($row['price'] / $value, 2);
          $row['currency'] = DEFAULTCURRENCY;
          break;
        }
      }
    }
    return $row;
  }
  
}
