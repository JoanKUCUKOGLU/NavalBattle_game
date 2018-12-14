<?php

require('fonctionBN.php');

function jouer(){
    
$tabUser = [["&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&"], 
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"], 
            ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"], 
            ["&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&"]];

$tabBot = [["&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&"],  
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"], 
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"], 
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
           ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
           ["&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&"]];

$tabBotInvi = [["&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&"],  
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"], 
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"], 
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
               ["&", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", "&"],  
               ["&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&", "&"]];

$hpUser = 17;
$hpBot = 17;

    do{
        affichageTab($tabUser, $tabBot);
        echo "  Salut mec, on peut pas avancer regarde, il y a des gilets jaunes qui bloquent le parking, mais d'abord, comment tu t'appelles?".PHP_EOL;
        $userPrenom = trim(fgets(STDIN));
        $name = testSkinInput($userPrenom);
    } while($name == null);

    $prenom = str_split($name[0]);
// START -SELECTIONNER BATEAU+PLACER-

    $phrases = ["          - 1 mégacamion (5 cases)", "          - 1 semi-remorque (4 cases)", "          - 1 porteur (3 cases)", "          - 1 tracteur (3 cases)", "          - 1 camionette (2 cases)"];
    $counttabUser = [5, 4, 3, 3, 2];
    

    while(count($phrases) !== 0){

        affichageTab($tabUser, $tabBot);
        
        echo "  super $name[0], place tes camions stratégiquement sur le parking (ex. A1-A5) :".PHP_EOL;

        for($i=0; $i<(count($phrases)); $i++){
            echo $phrases[$i].PHP_EOL;
        }

        $input = trim(fgets(STDIN));
        $test_coor = testInputStart($input);
        //var_dump($test_coor);

        // SI COORDONNEES CORRECTES => PLACAGE BATEAUX
        if($test_coor[0]==1){
            
            $c = 0;
            for($k=$test_coor[1][1]; $k<=$test_coor[1][3]; $k++){
                if($tabUser[$k][$test_coor[1][0]] == "$prenom[0]" || $tabUser[$k+1][$test_coor[1][0]] == "$prenom[0]" || $tabUser[$k-1][$test_coor[1][0]] == "$prenom[0]" || $tabUser[$k][$test_coor[1][0]+1] == "$prenom[0]" || $tabUser[$k][$test_coor[1][0]-1] == "$prenom[0]"){
                    $c += 1;
                }
            }
            for($k=$test_coor[1][0]; $k<=$test_coor[1][2]; $k++){
                if($tabUser[$test_coor[1][1]][$k] == "$prenom[0]" || $tabUser[$test_coor[1][1]+1][$k] == "$prenom[0]" || $tabUser[$test_coor[1][1]-1][$k] == "$prenom[0]" || $tabUser[$test_coor[1][1]][$k+1] == "$prenom[0]" || $tabUser[$test_coor[1][1]][$k-1] == "$prenom[0]"){
                    $c += 1;
                }
            }

            if($c==0){
            if(abs($test_coor[1][2]-$test_coor[1][0])+1==$counttabUser[0] ^ abs($test_coor[1][3]-$test_coor[1][1])+1==$counttabUser[0]){

                if($test_coor[1][0]==$test_coor[1][2]){

                    for($j=0; $j<$counttabUser[0]; $j++){

                        for($k=$test_coor[1][1]; $k<=$test_coor[1][3]; $k++){
                            $tabUser[$k][$test_coor[1][0]] = "$prenom[0]";                           
                        }
                        //affichageTab($tabUser, $tabBot);  

                    }

                } else if($test_coor[1][1]==$test_coor[1][3]){

                    for($j=0; $j<$counttabUser[0]; $j++){

                        for($k=$test_coor[1][0]; $k<=$test_coor[1][2]; $k++){
                            $tabUser[$test_coor[1][1]][$k] = "$prenom[0]";                            
                        }
                        //affichageTab($tabUser, $tabBot);
                    }
                }
                array_shift($counttabUser);
                array_shift($phrases);
            }
        }
    }
}

// PLACEMENT RANDOM BATEAUX ADVERSES

$counttabBot = [5, 4, 3, 3, 2];

    while(count($counttabBot) !== 0){

        $c=0;
        $bouleain = rand(0, 1); // Booleen test pour plaçage horizontal ou vertical

        if($bouleain==0){ // vertical
            $absBot = rand(1, 10); // --
            $ordBot = rand(1, 10-$counttabBot[0]); // |

            for($k=$ordBot; $k<=$ordBot+$counttabBot[0]; $k++){
                if($tabBotInvi[$k][$absBot] == "U" || $tabBotInvi[$k+1][$absBot] == "U" || $tabBotInvi[$k-1][$absBot] == "U" || $tabBotInvi[$k][$absBot+1] == "U" || $tabBotInvi[$k][$absBot-1] == "U"){
                    $c += 1;
                }
                var_dump($c);
            }

        if($c==0){
            for($k=0; $k<$counttabBot[0]; $k++){
                $tabBotInvi[$ordBot+$k][$absBot] = "U";             }
            array_shift($counttabBot);
        }

        }

        if($bouleain==1){ // horizontal
            $absBot = rand(1, 10-$counttabBot[0]); // --
            $ordBot = rand(1, 10); // |

            for($k=$absBot; $k<=$absBot+$counttabBot[0]; $k++){
                if($tabBotInvi[$ordBot][$k] == "U" || $tabBotInvi[$ordBot+1][$k] == "U" || $tabBotInvi[$ordBot-1][$k] == "U" || $tabBotInvi[$ordBot][$k+1] == "U" || $tabBotInvi[$ordBot][$k-1] == "U"){
                    $c += 1;
                }
                var_dump($c);
            }

        if($c==0){
            for($k=0; $k<$counttabBot[0]; $k++){
                $tabBotInvi[$ordBot][$absBot+$k] = "U";                              
            }
        array_shift($counttabBot);
        }

        }
        affichageTab($tabUser, $tabBot);
    }


    // TOURS DE JEU

    do{
        
        //COUP UTILISATEUR
        echo "Super $name[0], maintenant il est temps de niquer ces enfoirés de gilets jaunes !".PHP_EOL;
        echo "Vas y, choisis la case où tu veux lancer ton cocktail molotov ! (ex. A1)".PHP_EOL;

        $userInpute = trim(fgets(STDIN));
        $test_coord = testInput($userInpute);
        
        $abs = $test_coord[1][0];
        $ord = $test_coord[1][1];

        if($test_coord[0] == 1){    
            $slt = hit($abs, $ord, $tabBotInvi);
            if($slt == 1){
                $hpB -= 1;
                $tabBot[$ord][$abs] = "#";
            } elseif($slt == 0){
                $tabBot[$ord][$abs] = "O";
            }

            while(true){
                $ordBot = rand(1, 10);
                $absBot = rand(1, 10);
    
                if($tabUser[$ordBot][$absBot] == "$prenom[0]"){
                    $hpUser -= 1;
                    $tabUser[$ordBot][$absBot] = "#";
                    break;
                } elseif($tabUser[$ordBot][$absBot] == " "){
                    $tabUser[$ordBot][$absBot] = "0";
                    break;
                }
            }
        }
    
        affichageTab($tabUser, $tabBot);

    }while($hpUser !== 0 && $hpBot !== 0);

    if($hpBot==0){
        echo "OUE CHAMPION, TU LES A DEZINGUER";
    } elseif($hpUser==0){
        echo "PUTAIN " . strtoupper($name[0]) . ", T'AS DECONNER !";
    }
}

// affichageTab($tabUser, $tabBot);

    
    



jouer();

//preg_match("/([a-jA-J]){1}([0-9]+)-([a-jA-J]){1}([0-9]+)/", $yes, $matches);

?>