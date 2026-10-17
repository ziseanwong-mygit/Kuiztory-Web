<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Filter Bar</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/filterbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="filters">
        <div class="dropdown-container">
            <button>Grade ▼</button>
            <ul class="dropdown">
                <li class="grade-text" onclick="location.href='filterGrade.php?Grade=Form 1';">Form 1</li>
                <li class="grade-text" onclick="location.href='filterGrade.php?Grade=Form 2';">Form 2</li>
                <li class="grade-text" onclick="location.href='filterGrade.php?Grade=Form 3';">Form 3</li>
                <li class="grade-text" onclick="location.href='filterGrade.php?Grade=Form 4';">Form 4</li>
                <li class="grade-text" onclick="location.href='filterGrade.php?Grade=Form 5';">Form 5</li>
            </ul>
        </div>
        <div class="dropdown-container">
            <button>Chapter ▼</button>
            <ul class="dropdown">
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 1';";>Chapter 1</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 2';";>Chapter 2</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 3';";>Chapter 3</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 4';";>Chapter 4</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 5';";>Chapter 5</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 6';";>Chapter 6</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 7';";>Chapter 7</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 8';";>Chapter 8</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 9';";>Chapter 9</li>
                <li class="chapter-text" onclick="location.href='filterChap.php?Chapter=Chapter 10';";>Chapter 10</li>
            </ul>
        </div>
        <div class="dropdown-container">
            <button>Difficulty ▼</button>
            <ul class="dropdown">
                <li class="difficulty-text" onclick="location.href='filterDiff.php?Difficulty=Beginner';">Beginner</li>
                <li class="difficulty-text" onclick="location.href='filterDiff.php?Difficulty=Intermediate';">Intermediate</li>
                <li class="difficulty-text" onclick="location.href='filterDiff.php?Difficulty=Advanced';">Advanced</li>
                <li class="difficulty-text" onclick="location.href='filterDiff.php?Difficulty=Expert';">Expert</li>
            </ul>
        </div>
        <form action="" method="POST">
            <input type="text" placeholder="Type quiz name here..." name="searchWord" required>
            <button class="searchBtn" type="submit" name="startSearch">
                <i class="fa fa-search" style="padding-right: 10px;"></i>
                Search quiz
            </button>
        </form>
    </nav>
</body>
</html>