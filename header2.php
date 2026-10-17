<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Header 2</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/header2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php if(isset($_SESSION['SES_StuID'])) { ?>
        <header>
            <div class="home">
                <button class="home-btn" onclick="location.href='homePage.php';"><i class="fa fa-home" style="padding-right: 10px;"></i>Home Page</button>       
            </div>
            <div class="logo">
                <a href="homePage.php">
                    <img src="./images/Kuiztory_title_trans.png" alt="Kuiztory logo">
                </a>    
            </div>
            <div class="nav">
                <button class="right-btn joinquiz-btn" onclick="location.href='joinAssessment.php';"><i class="fa fa-hashtag" style="padding-right: 10px;"></i>Join Quiz</button>
                <button class="right-btn joinclass-btn" onclick="location.href='joinClass.php';"><i class="fa fa-hashtag" style="padding-right: 10px;"></i>Join Class</button>
                <div class="dropdown-container">
                    <button class="right-btn joinclass-btn">Other Actions ▼</button>
                    <ul class="dropdown">
                        <li class="more-act-btn" onclick="location.href='studentDashboard.php';">Student Dashboard</li>
                        <li class="more-act-btn" onclick="location.href='viewResult.php';">View Past Results</li>
                        <li class="more-act-btn" onclick="location.href='viewAttempt.php';">View Past Attempts</li>
                        <li class="more-act-btn" onclick="location.href='viewJoinClass.php';">View Classes</li>
                        <li class="more-act-btn" onclick="location.href='logout.php';">Log Out Account</li>
                    </ul>
                </div>
            </div>
        </header>
    <?php } else { ?>
        <header>
            <div class="home">
                <button class="home-btn" onclick="location.href='homePage.php';"><i class="fa fa-home" style="padding-right: 10px;"></i>Home Page</button>       
            </div>
            <div class="logo">
                <a href="index.php">
                    <img src="./images/Kuiztory_title_trans.png" alt="Kuiztory logo">
                </a>    
            </div>
            <div class="nav">
                <button class="right-btn joinquiz-btn" onclick="location.href='joinAssessment.php';"><i class="fa fa-hashtag" style="padding-right: 10px;"></i>Join Quiz</button>
                <button class="right-btn workshop-btn" onclick="location.href='./workshop/assessmentWorkshop.php';"><i class="fa fa-wrench" style="padding-right: 10px;"></i>Workshop</button>
                <div class="dropdown-container">
                    <button class="right-btn joinclass-btn">Other Actions ▼</button>
                    <ul class="dropdown">
                        <li class="more-act-btn" onclick="location.href='teacherDashboard.php';">Teacher Dashboard</li>
                        <li class="more-act-btn" onclick="location.href='viewResult.php';">View Past Results</li>
                        <li class="more-act-btn" onclick="location.href='viewAttempt.php';">View Past Attempts</li>
                        <li class="more-act-btn" onclick="location.href='logout.php';">Log Out Account</li>
                    </ul>
                </div>
            </div>
        </header> 
    <?php } ?>   
</body>
</html>