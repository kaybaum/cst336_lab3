<?php
    

    //Lol the way I tried doing this didn't work so I did it the hard way
    $cards = array("clubs"=> [1,2,3,4,5,6,7,8,9,10,11,12,13],
    "diamonds" => [1,2,3,4,5,6,7,8,9,10,11,12,13],
    "hearts" => [1,2,3,4,5,6,7,8,9,10,11,12,13], 
    "spades" => [1,2,3,4,5,6,7,8,9,10,11,12,13]);
    //A 2D array that works like $cards{"diamonds"][2]
    
   
    function getCard(){
        global $cards;
        $randSuit = array_rand($cards); //Getting a random suit
        $randNum = array_rand($cards[$randSuit]); //Geting a random card number for given suit
        $actualCardNum = $cards[$randSuit][$randNum]; //Storing actual card number before deleting the index it was at
        $isEmpty = 0;
        
        array_splice($cards[$randSuit], $randNum, 1); //Deletes the index we used for card number
    
        if(sizeof($cards[$randSuit]) == 0){//Checks if card numbers array for given suit is empty
            unset($cards[$randSuit]); //Deletes the suit from array if it has no numbers left
        }
       
        if(sizeof($cards) == 0){
            $isEmpty = 1;
        }
        return array($actualCardNum, $randNum, $randSuit, $isEmpty); //lol
    }
    
$count=0;
function displayCharacter($count){
   
     switch ($count){
        case 0: $character = "spongebob";
                break;
        case 1: $character = "patrick";
                break;
        case 2: $character = "squidward";
                break;
        case 3: $character = "sandy";
                break;
     }
    echo "<img id='player' src='img/spongebob/$character.jpg' title='". ucfirst($symbol) ."' width='70'/>";
  }
    
    
    function play(){//create & return array of cards per player 
        $handTotals = array("SpongeBob" => 0, "Patrick" => 0, "Squidward" => 0, "Sandy" => 0);    
        $differences = [];
        $winner = "No winner";
        echo "<div id='results'>";
        foreach($handTotals as $player => $hand)
        {
            displayCharacter($count);
            $count++;
           //echo "<br>";
            echo "Player: $player ";
           echo '&nbsp';
            $random = rand(4,6);
            for($i = 0; $i < $random; $i++){
                if($handTotals[$player] < 42){
                    $returnArray = getCard();
                    $cardNum = $returnArray[0];
                    $suit = $returnArray[2];
                    $handTotals[$player] += $cardNum;
                    echo "<img src='img/$suit/$cardNum.png' alt='$suit'>";
                }
            }
            $differences[$player] = 42-$handTotals[$player];
            echo $handTotals[$player] ;
            echo "</br>";
        }
        echo "</div>";
        
        $min = 9999;
        foreach($differences as $player => $difference){
            if($difference >= 0){
                if($difference < $min){
                    $winner = $player;
                    $min = $difference;
                }
            }
        }
        echo "<div id='winner'> <br> Winner is: $winner</div>";
        
    }
    
?>