<?php
// Scoreboard service coding challenge

require 'vendor/autoload.php';
$scoreboardView = new \App\Presentation\Views\ScoreboardItemView();

$message = "";

if (!empty($_POST['name']) && !empty($_POST['score'])) {

    if (!$scoreboardView->createNewScoreboardItem($_POST['name'], $_POST['score'])) {
        $message = "Score has to be a number! Please try again!";
    }
}

$scores = $scoreboardView->getScores();

usort($scores, function($a, $b) {
    if (!empty($_GET['sort']) && $_GET['sort'] == 'asc') {
        return $a['score'] <=> $b['score'];
    } else {
        return $b['score'] <=> $a['score'];
    }
});

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scoreboard Service</title>
    <link href="https://fonts.googleapis.com/css?family=Copse|Maven+Pro&display=swap" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<header>
    <h1>Scoreboard Service</h1>
</header>
<content>
    <div class="scoreboard-title">
        <div class="position">#</div>
        <div class="name">Name</div>
        <div class="score">Score</div>
    </div>
    <div class="scoreboard">
    <?php $index = 1; ?>
    <?php foreach($scores as $s): ?>
        <div class="score-row">
        <div class="position"><?php echo $index; ?>.</div>
        <div class="name"><?php echo $s['name']; ?></div>
        <div class="score"><?php echo $s['score']; ?></div>
    </div>
        <?php $index++; ?>
    <?php endforeach ?>
    </div>


</content>
<footer>
    <?php if ($message): ?>
        <div class="error"><?php echo $message; ?></div>
    <?php endif; ?>
    <div class="form-title">Add new score</div>
<form method="POST">
    <div class="form-fields">
<input class="name-field" placeholder="Enter name..." type="text" name="name"/>
<input class="score-field" placeholder="Points..." type="text" name="score"/>
<button class="add-button" type="submit">ADD</button>
    </div>
</form>
</footer>
    
</body>
</html>
