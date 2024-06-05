
class Dice {
    constructor(rolleddice){
        this.rolleddice = rolleddice;
        this.diceValue = 0;
        this.states = 0;
    }

    rollDice(){
        this.diceValue = Math.floor((Math.random() * 6) + 1);
        this.states ++;
        return this.diceValue;
    }

    getStates(){
        return this.states;
    }

    

    
}




