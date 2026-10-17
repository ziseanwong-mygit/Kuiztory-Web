<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kulztory - More Assessments</title>
    <link rel="stylesheet" href="./styles/moreAssessment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include './crudWKS/DBconnection.php';
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_TeaID'])) {
            include "WKSheader.php";
        }
    ?>

    <main>      
        <h1>All Assessments</h1>
        <div class="grid-container">
            <?php
                $refTeachID = $_SESSION['SES_TeaID'];
                $query = "SELECT * FROM assessment WHERE TeacherID = '$refTeachID' ORDER BY AssmtRegDate DESC;";
                $results = mysqli_query($connection, $query);

                while ($data = mysqli_fetch_assoc($results)) {
                    $assmtCode = $data['AssmtCode'];
                    $assmtName = $data['AssmtName'];
                    $assmtDesc = $data['AssmtDesc'];
                    $assmtDate = $data['AssmtRegDate'];
                    $assmtGrade = $data['AssmtGradeLvl'];
                    $assmtChap = $data['AssmtChapter'];
                    $assmtTopic = $data['AssmtTopic'];
                    $assmtDiff = $data['AssmtDifficulty'];
                    $assmtVisible = $data['AssmtVisibility'];
                    $assmtOpenStat = $data['AssmtOpenStatus'];
                    $assmtImg = $data['AssmtBgImg'];
            ?>
                    <div class="game-card">
                        <div class="game-image"><img src="../images/assmtBgImg/<?php echo $assmtImg;?>" alt="Quiz Image"></div>
                        <div class="code"><?php echo $assmtCode?></div>
                        <div class="title"><?php echo $assmtName?></div>
                        <div class="description"><?php echo $assmtDesc?></div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Creation date:</b> <?php echo $assmtDate?>
                        </div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Grade:</b> <?php echo $assmtGrade?>
                        </div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Chapter:</b> <?php echo $assmtChap?>
                        </div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Topic:</b> <?php echo $assmtTopic?>
                        </div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Difficulty:</b> <?php echo $assmtDiff?>
                        </div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Visibility:</b> <?php echo $assmtVisible?>
                        </div>
                        <div style="font-size:12px;margin-bottom:3px;">
                            <b>Open status:</b> <?php echo $assmtOpenStat?>
                        </div>
                        <div class="stats">
                            <button class="assess-btn manageQBtn" onclick="location.href='manageQuestion.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-question-circle" style="padding-right:10px;"></i>
                                Manage Question
                            </button>
                            <button class="assess-btn editQuizBtn" onclick="location.href='editAssessment.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-edit" style="padding-right:10px;"></i>
                                Edit Quiz
                            </button>
                            <button class="assess-btn deleteQuizBtn" onclick="location.href='deleteAssessment.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-trash" style="padding-right:10px;"></i>
                                Delete Quiz
                            </button>
                            <button class="assess-btn viewRepBtn" onclick="location.href='viewReport.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-file-text" style="padding-right:10px;"></i>
                                View Report
                            </button>
                            <button class="assess-btn viewStatBtn" onclick="location.href='viewStatistics.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-line-chart" style="padding-right:10px;"></i>
                                View Statistics
                            </button>
                        </div>
                    </div>
            <?php 
                }                     
            ?>       
        </div>
    </main> 

    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>