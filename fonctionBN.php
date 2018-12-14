<?php

// CLEAN PUIS AFFICHAGE DU TABLEAU (à jour)

function affichageTab($tab1, $tab2){
   
    print("\033[2J\033[;H");

   echo "    | #Camionneur                    |    | #GiletsJaunes                  |".PHP_EOL;
   echo "  * |  A  B  C  D  E  F  G  H  I  J  |  * |  A  B  C  D  E  F  G  H  I  J  |".PHP_EOL;
   echo " -- |  -  -  -  -  -  -  -  -  -  -  | -- |  -  -  -  -  -  -  -  -  -  -  |".PHP_EOL;

   for($i=1; $i<10; $i++){

       $nbCase = $i;

       echo "  $nbCase | ";
       for($j=1; $j <11; $j++){
           echo " " . $tab1[$i][$j] . " ";
       }
       echo " |  $nbCase | ";
       for($j=1; $j <11; $j++){
           echo " " . $tab2[$i][$j] . " ";
       }
       echo " |".PHP_EOL;
   }

   echo " 10 | ";
       for($j=1; $j <11; $j++){
           echo " " . $tab1[10][$j] . " ";
       }
       echo " | 10 | ";
       for($j=1; $j <11; $j++){
           echo " " . $tab2[10][$j] . " ";
       }
       echo " |".PHP_EOL;

       echo " -- |  -  -  -  -  -  -  -  -  -  -  | -- |  -  -  -  -  -  -  -  -  -  -  |".PHP_EOL;
       echo PHP_EOL;

}

// TESTER SI INPUT EST VALIDE

function testSkinInput($input){

    
    preg_match("/^[a-zA-Z]+$/i", $input, $matches);
 
    if($matches == null){
        return $matches;
    } else {
        return $matches;
    }
 }

function testInput($input){

    
   preg_match("/([A-J]){1}([0-9]+)/", strtoupper($input), $matches);

   if($matches == null){
       $test = 0;
       return $test;
   } else {
       $test = [1];
       $test[] = convInput($matches);
       return $test;
   }
}

// CONVERTIR INPUT EN COORDONNEES (si input valide)
function convInput($matches){
   
   $indexI = [];

   for($i=1; $i<3; $i++){
       switch ($matches[$i]){
           case "A" :
           $indexI[] = 1;
           break;
           case "B" :
           $indexI[] = 2;
           break;
           case "C" :
           $indexI[] = 3;
           break;
           case "D" :
           $indexI[] = 4;
           break;
           case "E" :
           $indexI[] = 5;
           break;
           case "F" :
           $indexI[] = 6;
           break;
           case "G" :
           $indexI[] = 7;
           break;
           case "H" :
           $indexI[] = 8;
           break;
           case "I" :
           $indexI[] = 9;
           break;
           case "J" :
           $indexI[] = 10;
           break;
           case "1" :
           $indexI[] = 1;
           break;
           case "2" :
           $indexI[] = 2;
           break;
           case "3" :
           $indexI[] = 3;
           break;
           case "4" :
           $indexI[] = 4;
           break;
           case "5" :
           $indexI[] = 5;
           break;
           case "6" :
           $indexI[] = 6;
           break; 
           case "7" :
           $indexI[] = 7;
           break;
           case "8" :
           $indexI[] = 8;
           break;
           case "9" :
           $indexI[] = 9;
           break;
           case "10" :
           $indexI[] = 10;
           break;

           
       }
   }
   return $indexI;
}


//  FONCTIONS POUR START
function testInputStart($input){

    preg_match("/([A-J]){1}([0-9]+)-([A-J]){1}([0-9]+)/", strtoupper($input), $matches);
 
    if($matches == null){
        //echo "no".PHP_EOL;
        $test = 0;
        return $test;
    } else {
        //echo "yes".PHP_EOL;
        $test = [1];
        $test[] = convInputStart($matches);
        return $test;
    }
    // var_dump($matches);
 }
 
 // CONVERTIR INPUT EN COORDONNEES (si input valide)
 function convInputStart($matches){
    
    $indexI = [];
 
    for($i=1; $i<5; $i++){
        switch ($matches[$i]){
            case "A" :
            $indexI[] = 1;
            break;
            case "B" :
            $indexI[] = 2;
            break;
            case "C" :
            $indexI[] = 3;
            break;
            case "D" :
            $indexI[] = 4;
            break;
            case "E" :
            $indexI[] = 5;
            break;
            case "F" :
            $indexI[] = 6;
            break;
            case "G" :
            $indexI[] = 7;
            break;
            case "H" :
            $indexI[] = 8;
            break;
            case "I" :
            $indexI[] = 9;
            break;
            case "J" :
            $indexI[] = 10;
            break;
            case "1" :
            $indexI[] = 1;
            break;
            case "2" :
            $indexI[] = 2;
            break;
            case "3" :
            $indexI[] = 3;
            break;
            case "4" :
            $indexI[] = 4;
            break;
            case "5" :
            $indexI[] = 5;
            break;
            case "6" :
            $indexI[] = 6;
            break; 
            case "7" :
            $indexI[] = 7;
            break;
            case "8" :
            $indexI[] = 8;
            break;
            case "9" :
            $indexI[] = 9;
            break;
            case "10" :
            $indexI[] = 10;
            break;
 
            
        }
    }
    return $indexI;
 }

 function hit($var1, $var2, $tab){
    
            
                if($tab[$var2][$var1] == "U"){
                    $test = 1;
                    return $test;
                } elseif(($tab[$var2][$var1]) == " "){
                    $test = 0;
                    return $test;
                }
}

?>