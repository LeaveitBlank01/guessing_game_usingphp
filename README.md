# Guess the Number Game

A simple PHP-based number guessing game where players try to guess a randomly generated number within a specified range. The game includes difficulty levels and provides feedback on each guess. It also features a win screen with an option to play again.

## Features

- **Difficulty Levels**: 
  - Easy (1-50)
  - Medium (1-100)
  - Hard (1-200)
- **Dynamic Feedback**: Get real-time hints ("Too high!" or "Too low!") to adjust your guesses.
- **Winning Screen**: Displays a congratulatory message upon guessing correctly and allows replay.
- **Modern Styling**: A dark theme with vibrant orange accents.

## Requirements

- **XAMPP** (or any web server with PHP support)
- PHP 7.0 or higher

## Installation

1. Clone or download the project files to your XAMPP `htdocs` directory.
   ```bash
   git clone https://github.com/your-repository/guess-the-number.git
   ```
   *(Replace with your repository link if hosted on GitHub.)*

2. Ensure the directory structure is as follows:
   ```
   htdocs/
   └── guess-game/
       ├── index.php
   ```

3. Start the XAMPP Apache server.

4. Open your browser and navigate to:
   ```
   http://localhost/guess-game/index.php
   ```

## How to Play

1. Select a difficulty level (Easy, Medium, or Hard).
2. Press "Start Game" to begin.
3. Enter your guesses in the input box. Hints will guide you until you find the correct number.
4. Upon winning, the game will display your success and allow you to play again.

## File Overview

- **index.php**: The main file containing all PHP logic and HTML structure for the game.
- **CSS Styling**: Inline styles in `index.php` provide a clean and modern UI.


## License

This project is open-source and available under the MIT License.

## Contributions

Feel free to fork this repository and submit pull requests for any improvements or new features!
