var roll = 0;
var dices = [];
var dicestwo = []; 

var dicepointerone = 0;
var dicepointertwo = 0;
var score1=0;
var score2=0;


function roll(){
    let dice = dices[dicepointerone];
    if(dice.getStates() >= 2){
        alert("this dice has hit max number of rolls of 2");
    } else{
        dice.rollDice();    
    }
    updateDice();
}

function roll2(){
    let dice = dicestwo[dicepointertwo];
    if(dice.getStates() >= 2){
        alert("this dice has hit max number of rolls of 2");
    } else{
        dice.rollDice();    
    }
    updateDice();
}

function next(){
    if (dicepointerone >= 5){
        alert("All 5 dice are rolled, it is the next person's turn");
    } else{
        dicepointerone += 1;
    }
}

function next2(){
    if (dicepointertwo >= 5){
        alert("All 5 dice are rolled, it is the next person's turn");
    } else{
        dicepointertwo += 1;
    }
}



function init(){

    roll = 0;
    dices = [];
    dicestwo = []; 
    dicepointerone = 0;
    dicepointertwo = 0;
    score1=0;
    score2=0;
    
    for (i = 0 ; i<5; i++){
        let dice = new Dice(i);
        dices.push(dice);
    }

    for (i = 0 ; i<5; i++){
        let dice = new Dice(i);
        dicestwo.push(dice);
    }
    
    
    
}

function updateDice(){
    var dicearrayonePrinted =  document.getElementById("dices1");
    var dicearrayonePrintedTwo =  document.getElementById("dices2");

    var dicestring = "";
    var dicestringTwo = "";

    for (i  = 0; i<5; i++){
        var diceprint = dices[i].getDiceValue().toString();
        var diceprinttwo = dicestwo[i].getDiceValue().toString();
        dicestring += diceprint;
        dicestring += " ";
        dicestringTwo +=diceprinttwo;
        dicestringTwo+=" ";
    }
    dicearrayonePrinted.textContent=dicestring;
    dicearrayonePrintedTwo.textContent=dicestringTwo;
}
