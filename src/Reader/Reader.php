<?php
namespace Reader;

class Reader {
  //Get Rows from data provided
    public static function getRows($fileLocation): array {
        $lines = array();
        $fh = fopen($fileLocation, 'r');
        while ($line = fgets($fh)) {
          $lines[] = $line;
        }
        fclose($fh);
        return $lines;
      }
}