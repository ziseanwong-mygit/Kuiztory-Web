<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Header 2</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/WKSheader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="home">
            <button class="home-btn" onclick="location.href='assessmentWorkshop.php';"><i class="fa fa-wrench" style="padding-right: 10px;"></i>Workshop Page</button>       
        </div>
        <div class="logo">
            <a href="assessmentWorkshop.php">
                <img src="../images/Kuiztory_title_trans.png" alt="Kuiztory logo">
            </a>    
        </div>
        <div class="nav">
            <button class="right-btn homepage-btn" onclick="location.href='../homePage.php';"><i class="fa fa-home" style="padding-right: 10px;"></i>Home Page</button>
            <div class="dropdown-container">
                <button class="right-btn actionDrop-btn">Other Actions ▼</button>
                <ul class="dropdown">
                    <li class="more-act-btn" onclick="location.href='../teacherDashboard.php';">Teacher Dashboard</li>
                    <li class="more-act-btn" onclick="location.href='manageAssessment.php';">Manage Assessment</li>
                    <li class="more-act-btn" onclick="location.href='manageClass.php';">Manage Class</li>
                    <li class="more-act-btn" onclick="location.href='../logout.php';">Log Out Account</li>
                </ul>
            </div>
        </div>
    </header>   
</body>
</html>