<?php

function getRandCard(){
    $suitnum = rand(0,3); 
    getNumber($suitnum);
}

/*$cards=array();
        
        $card1[3][12]; //suit,number
        $card1["value"]=10;
        $cards[]=$card1;
        */
        //
function getNumber($randomValue){
     switch ($randomValue){
        case 0: $suit = "clubs";
                break;
        case 1: $suit = "diamonds";
                break;
        case 2: $suit = "hearts";
                break;
        case 3: $suit = "spades";
                break;
     }
     
    $cardnumber = rand(1, 13);
    echo "<img id='card' src='/Labs/3/img/$suit/$cardnumber.png' alt='$suit' title='". ucfirst($suit) ."' width='70'>";

  }
  
   
  function displayPoints($randomValue1, $randomValue2, $randomValue3){
    echo "<div id='output'>";
    if($randomValue1 == $randomValue2 && $randomValue2==$randomValue3)
    {
        switch($randomValue1){
            case 0:$totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
            case 1: $totalPoints = 500;
                    break;
            case 2: $totalPoints = 250;
                    break;
            case 3: $totalPoints = 900;
        }
        
        echo "<h2> You won $totalPoints points!</h2>";
    } else {
        echo "<h3> Try Again! </h3>";
        }
     echo "</div>";
    
    }
    
  function play(){
     for ($i=1;$i<4;$i++){
        ${"randomValue" . $i } = rand(0,3);
        displaySymbol(${"randomValue" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
    }
    
    getRandCard(2);
    
    
?>