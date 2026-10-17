<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Kuiztory - Your History Quiz Tool</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/welcomePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="./images/Kuiztory_logo_title_trans.png" alt="Kuiztory logo" >
        </a>        
        <p>"Study Malaysian History with your preferred method anywhere."</p>
    </header>

    <main>
        <section>
            <nav>
                <a href="homePage.php"><i class="fa fa-user" style="padding-right: 10px;"></i>Continue as Guest</a>
                <a href="accRegistration.php"><i class="fa fa-sign-in" style="padding-right: 10px;"></i>Sign Up for Free</a>
                <a href="login.php"><i class="fa fa-sign-in" style="padding-right: 10px;"></i>Log In</a>
            </nav> 
            <h2>What You Can Do in Kuiztory?</h2>
            <div class="offerings">
                <div class="offering">
                    <h3>Perform Quizzes</h3>
                    <p>Test your knowledge on each chapter you have learnt throughout your day!</p>
                </div>
                <div class="offering">
                    <h3>Review Results</h3>
                    <p>Evaluate your performance and pinpoint your weak points from your result!</p>
                </div>
                <div class="offering">
                    <h3>Create Quizzes</h3>
                    <p>Teachers can create an endless number of quizzes to their students!</p>
                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php";?>
</body>
</html>
