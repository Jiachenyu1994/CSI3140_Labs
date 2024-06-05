var roll = 0;
var dices = [];
var dicestwo = []; 

var dicepointerone = 0;
var dicepointertwo = 0;



function getRoll(){
    return roll;
}

function getDiceValue(Dice){
    return Dice.diceValue;
}

function getState(Dice){
    return Dice.state;
}

function roll(){
    var dice = dices[dicepointerone];
    if(dice.getNumofRolls() >= 2){
        alert("this dice has hit max number of rolls of 2");
    } else{
        dice.rollDice();
        
    }

}

function rollTwo(){
    var dice = dices[dicepointertwo];
    if(dice.getNumofRolls() >= 2){
        alert("this dice has hit max number of rolls of 2");
    } else{
        dice.rollDice();
        
    }

}

function nextOne(){
    if (dicepointerone >= 5){
        alert("All 5 dice are rolled, it is the next person's turn");
    } else{
        dicepointerone += 1;
    }
}

function nextTwo(){
    if (dicepointertwo >= 5){
        alert("All 5 dice are rolled, it is the next person's turn");
    } else{
        dicepointertwo += 1;
    }
}



function test(){
    

    for (i = 0 ; i<5; i++){
        let dice = new Dice(i);
        dices.push(dice);
    }

    for (i = 0 ; i<5; i++){
        let dice = new Dice(i);
        dicestwo.push(dice);
    }
    
    var dicearrayonePrinted =  document.getElementById("diceArrayOne")
    var dicearrayonePrintedTwo =  document.getElementById("diceArrayTwo")

    var dicestring = "";
    var dicestringTwo = "";

    for (i  = 0; i<5; i++){
        var diceprint = dices[i].getDiceValue().toString();
        var diceprinttwo = dicestwo[i].getDiceValue().toString();
        dicestring += diceprint;
        dicestringTwo +=diceprinttwo;

    }
    
}
