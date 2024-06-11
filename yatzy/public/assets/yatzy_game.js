
var dices = [];
var dicestwo = []; 

var dicepointerone = 0;
var dicepointertwo = 0;
var score1=0;
var score2=0;
var turn=0;


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
    if (dicepointerone >= 4){
        alert("All 5 dice are rolled, it is the next person's turn");
    } else{
        dicepointerone += 1;
    }
}

function next2(){
    if (dicepointertwo >= 4){
        alert("All 5 dice are rolled, it is the next person's turn");
    } else{
        dicepointertwo += 1;
    }
    
}

function nextTurn(){
    if(turn>5){
        alert("This is the last turn");
    }else{
        if(dicepointerone<4||dicepointertwo<4){
            alert("Please wait all players finish this turn");
        }else{
            let container=document.getElementById("records");
            let container2=document.getElementById("records2");
            let element=document.createElement("p");
            element.id="record";
            let element2=document.createElement("p");
            element2.id="record";
            let record=getDices(1);
            let record2=getDices(2);
            element.textContent=record;
            element2.textContent=record2;
            container.appendChild(element);
            container2.appendChild(element2);
            dices = [];
            dicestwo = []; 
            dicepointerone = 0;
            dicepointertwo = 0;
            for (i = 0 ; i<5; i++){
                let dice = new Dice(i);
                dices.push(dice);
            }

            for (i = 0 ; i<5; i++){
                let dice = new Dice(i);
                dicestwo.push(dice);
            }
            updateDice();   
        }
    }




}



function init(){

    dices = [];
    dicestwo = []; 
    dicepointerone = 0;
    dicepointertwo = 0;
    score1=0;
    score2=0;
    turn=0;
    
    for (i = 0 ; i<5; i++){
        let dice = new Dice(i);
        dices.push(dice);
    }

    for (i = 0 ; i<5; i++){
        let dice = new Dice(i);
        dicestwo.push(dice);
    }   
    updateDice();
    removeAllRecordElements();
}

function updateDice(){
    let dicearrayonePrinted =  document.getElementById("dices1");
    let dicearrayonePrintedTwo =  document.getElementById("dices2");

    let dicestring = getDices(1);
    let dicestringTwo = getDices(2);

    
    dicearrayonePrinted.textContent=dicestring;
    dicearrayonePrintedTwo.textContent=dicestringTwo;
}

function getDices(player){
    let dicestring = "";
    if (player==1){
        for (i  = 0; i<5; i++){
            let diceprint = dices[i].getDiceValue().toString();
            dicestring += diceprint;
            dicestring += " ";
        }
    }else{
        for (i  = 0; i<5; i++){
            var diceprinttwo = dicestwo[i].getDiceValue().toString();
            dicestring += diceprinttwo;
            dicestring += " ";
        }
    }
    return dicestring;
}

function removeAllRecordElements() {
    let recordElements = document.querySelectorAll('#record');
    recordElements.forEach(record => record.parentNode.removeChild(record));
}
