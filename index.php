<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['start'])) {
        $difficulty = $_POST['difficulty'] ?? 'medium';
        $_SESSION['difficulty'] = $difficulty;

        switch ($difficulty) {
            case 'easy':
                $_SESSION['range'] = 50;
                break;
            case 'hard':
                $_SESSION['range'] = 200;
                break;
            default:
                $_SESSION['range'] = 100;
        }

        $_SESSION['number'] = rand(1, $_SESSION['range']);
        $_SESSION['attempts'] = 0;
        $_SESSION['playing'] = true;
        $_SESSION['won'] = false;
    } elseif (isset($_POST['guess'])) {
        $_SESSION['attempts']++;
        $guess = (int)$_POST['guess'];
        $number = $_SESSION['number'];
        if ($guess < $number) {
            $_SESSION['message'] = "Too low! Try again.";
        } elseif ($guess > $number) {
            $_SESSION['message'] = "Too high! Try again.";
        } else {
            $_SESSION['message'] = "Congratulations! You guessed the number in {$_SESSION['attempts']} attempts.";
            $_SESSION['playing'] = false;
            $_SESSION['won'] = true;
        }
    } elseif (isset($_POST['restart'])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            max-width: 400px;
            width: 100%;
            background-color: #2a2a2a;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8);
        }
        h1 {
            color: #ff9900;
        }
        label, select, input {
            font-size: 16px;
            margin: 10px 0;
        }
        select, input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ff9900;
            background-color: #1c1c1c;
            color: #fff;
            width: calc(100% - 24px);
        }
        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ff9900;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #e68a00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Guess the Number Game</h1>
        <?php if (!isset($_SESSION['playing']) || !$_SESSION['playing']): ?>
            <?php if ($_SESSION['won'] ?? false): ?>
                <p><?= $_SESSION['message'] ?></p>
                <form method="post">
                    <button class="btn" type="submit" name="restart">Play Again</button>
                </form>
            <?php else: ?>
                <form method="post">
                    <label for="difficulty">Select Difficulty:</label>
                    <select id="difficulty" name="difficulty" required>
                        <option value="easy">Easy (1-50)</option>
                        <option value="medium" selected>Medium (1-100)</option>
                        <option value="hard">Hard (1-200)</option>
                    </select>
                    <button class="btn" type="submit" name="start">Start Game</button>
                </form>
            <?php endif; ?>
        <?php else: ?>
            <p>Range: 1 - <?= $_SESSION['range'] ?></p>
            <p><?= $_SESSION['message'] ?? 'Guess the number!' ?></p>
            <form method="post">
                <input type="number" name="guess" min="1" max="<?= $_SESSION['range'] ?>" required placeholder="Enter your guess">
                <button class="btn" type="submit">Submit</button>
            </form>
            <form method="post" style="margin-top: 10px;">
                <button class="btn" type="submit" name="restart">Restart Game</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
