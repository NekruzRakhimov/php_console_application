<?php
     $input = fopen("input.txt", 'r');
     $positive = fopen("positive.txt", 'w+t');
     $negative = fopen("negative.txt", 'w+t');
        
     $op = $argv[1];

     if(strpos("*/+-xX", $op) === false)
          echo "Ошибка! Неправильный символ";
     else{
          $positiveResult = "";
          $negativeResult = "";

          while(!feof($input)){
               $str = htmlentities(fgets($input));
               if($str == "") 
                    continue;
               $arr = explode(" ", $str);
               $num1 = $arr[0];
               $num2 = $arr[1];

               if($op == "*" || $op == "x" || $op == "X") {
                    if($num1 * $num2 >= 0)
                         $positiveResult .= $num1 * $num2."\n";
                    else
                         $negativeResult .= $num1 * $num2."\n";
               }
               else if($op == "/") {
                    if($num2 == 0)
                         $positiveResult .= "Division by zero is impossible"."\n"; 
                    else if($num1 / $num2 >= 0)
                         $positiveResult .= $num1 / $num2."\n";
                    else
                         $negativeResult .= $num1 / $num2."\n";
                    }
               else if($op == "+") {
                    if($num1 + $num2 >= 0)
                         $positiveResult .= $num1 + $num2."\n";
                    else
                         $negativeResult .= $num1 + $num2."\n";
               }
               else if($op == "-") {
                    if($num1 - $num2 >= 0)
                         $positiveResult .= $num1 - $num2."\n";
                    else
                         $negativeResult .= $num1 - $num2."\n";
               }
          }

          echo "Данные успешно сохранены!";
          fwrite($negative, $negativeResult);
          fwrite($positive, $positiveResult);
     }

     fclose($input);
     fclose($positive);
     fclose($negative);
     
?>
