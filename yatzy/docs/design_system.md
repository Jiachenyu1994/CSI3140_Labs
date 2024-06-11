# Documentation of Yatzy Game

The following is a documentation of the different aspects and components used to build a yatzy game using HTML, CSS, and JS

## Fonts and Colours Used

The Yatzy game uses a basic HTML layout with black and white colors. The font used is the standard HTML default font, typically

Times New Roman or the browser's default serif font. The background is white, and the text is rendered in black for high contrast

and readability. No additional styling or custom fonts were applied beyond the default HTML settings.

## Look and Feel of Dice

* Shape and Size: Each die is a perfect square with dimensions of 100px by 100px.

* Color Scheme: The dice have a white background, creating a clean and classic look, with black dots representing the numbers, ensuring high contrast and easy readability.

* Border: Each die has a solid black border with a width of 2px, and the corners of the dice are slightly rounded with a border-radius of 10px, giving a modern touch while maintaining a familiar appearance.

* Dot Design: The dots are black circles with a diameter of 20px. They are perfectly round, achieved by setting the border-radius to 50%.

* Dot Positioning: The dots are positioned to represent the numbers 1 through 6, using absolute positioning within the dice container. This positioning mimics the layout of traditional dice faces

### 1. Starting a new game

Initialize the game by calling the init function, which sets up two arrays of dice (dices and dicestwo) with five dice each, resets

scores, turn counters, and updates the dice display.

### 2. In-Game Play

Players take turns rolling dice using roll and roll2 functions, which ensure a dice can only be rolled twice. The next and next2

functions advance to the next die. updateDice function updates the visual display of the dice values.

### 3. End of the Game

The game checks for the end by monitoring the number of turns in nextTurn. When all players have completed the allowed turns, a

final alert notifies the end of the game.

