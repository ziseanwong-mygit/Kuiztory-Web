<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Filter Quiz Chapter</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/searchResult.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include './phpcrud/DBconnection.php';
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
            include "header2.php";
        } else {
            include "header.php";
        }
    ?>

    <!-- Filter buttons and search bar; navigation bar-->
    <?php include "filterbar.php";?>

    <?php
        if(isset($_POST['startSearch'])) {
    ?> 
        <script>       
            window.location.href="searchResult.php?keyword=<?php echo $_POST['searchWord']?>"
        </script>     
    <?php    
        }
    ?>

    <main>        
        <h2>All Available Assessments Here</h2>
        <div class="grid-container">
            <?php
                $query = "SELECT * FROM assessment;";

                $results = mysqli_query($connection, $query);

                while ($data = mysqli_fetch_assoc($results)) {

                if (empty($data)) {
            ?>
                    <script>
                        alert("Sorry! Quizzes with the chapter '<?php echo $searchChap?>' cannot be found! Please try again.");
                    </script>   
            <?php             
                } else {
                        $refCode = $data['AssmtCode'];
                        $refName = $data['AssmtName'];
                        $refDesc = $data['AssmtDesc'];
                        $refGrade = $data['AssmtGradeLvl'];
                        $refChapter = $data['AssmtChapter'];
                        $refTopic = $data['AssmtTopic'];
                        $refLike = $data['LikeCount'];
                        $refDislike = $data['DislikeCount'];
                        $refBgImg = $data['AssmtBgImg'];     
            ?>
                        <div class="game-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                            <div class="game-image"><img src="./images/assmtBgImg/<?php echo $refBgImg;?>" alt="Quiz Image"></div>
                            <div class="title"><?php echo $refName?></div>
                            <div class="description"><?php echo $refDesc?></div>
                            <div class="grade"><b>Grade:</b> <?php echo $refGrade?></div>
                            <div class="chap"><b>Chapter:</b> <?php echo $refChapter?></div>
                            <div class="topic"><b>Topic:</b> <?php echo $refTopic?></div>
                            <div class="stats">
                                <p>Plays: 0 </p>
                                <button class= "stats-btn-like">
                                    <i class="fa fa-thumbs-up" style="padding-right: 5px;"></i>
                                    <b><?php echo $refLike?></b>
                                </button> 
                                <button class= "stats-btn-dislike">
                                    <i class="fa fa-thumbs-down" style="padding-right: 5px;"></i>
                                    <b><?php echo $refDislike?></b>
                                </button>
                            </div>
                        </div>
            <?php 
                    }
                }                     
            ?>       
        </div>
    </main>

    <!-- Footer -->
    <?php include "footer2.php";?>
</body>
</html>
