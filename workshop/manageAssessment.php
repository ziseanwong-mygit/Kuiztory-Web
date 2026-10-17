<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kuiztory - Manage Classes</title>
    <link rel="stylesheet" href="./styles/manageAssessment.css">
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
        <h1 class="title">Manage Your Assessments Here</h1>
        <p class="description">You can manage questions, edit or delete assessments, and view reports or statistics</p>
        
        <div class="class-list">
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
                    $assmtTags = $data['AssmtTags'];
                    $assmtOpenStat = $data['AssmtOpenStatus'];
                    $assmtLike = $data['LikeCount'];
                    $assmtDislike = $data['DislikeCount'];
                    $assmtImg = $data['AssmtBgImg'];

                    $query2 = "SELECT COUNT(AttemptID) AS TotalPlays FROM attempt WHERE AssmtCode = '$assmtCode';";
                    $results2 = mysqli_query($connection, $query2);
                    $data2 = mysqli_fetch_assoc($results2);
                    $TotalPlays = $data2['TotalPlays'];
            ?>
                    <div class="class-card">
                        <div class="class-info">
                            <div class="container-id">
                                <button class="text-id" id="copyID" onclick="copyToClipboard('copyID');" title="Click to copy code">
                                    <?php echo $assmtCode?>
                                </button>
                            </div>
                            <div class="container-img">
                                <img class="picture-assess" src="../images/assmtBgImg/<?php echo $assmtImg?>">
                            </div>
                            <div class="container-title">
                                <strong class="text-title"><?php echo $assmtName?></strong>
                            </div>
                            <div class="container-desc">
                                <span class="text-desc"><?php echo $assmtDesc?></span>
                            </div>
                            <div class="container-info">
                                <p class="text-info">
                                    <strong>Creation date:</strong> <?php echo $assmtDate?>
                                </p>
                                <p class="text-info">
                                    <strong>Grade level:</strong> <?php echo $assmtGrade?>
                                </p>
                                <p class="text-info">
                                    <strong>Chapter:</strong> <?php echo str_replace("Chapter", "", $assmtChap)?>
                                </p>
                                <p class="text-info">
                                    <strong>Topic:</strong> <?php echo $assmtTopic?>
                                </p>
                                <p class="text-info">
                                    <strong>Difficulty:</strong> <?php echo $assmtDiff?>
                                </p>
                                <p class="text-info">
                                    <strong>Visibility:</strong> <?php echo $assmtDiff?>
                                </p>
                                <p class="text-info">
                                    <strong>Tags:</strong> <?php echo $assmtTags?>
                                </p>
                                <p class="text-info">
                                <strong>Open Status:</strong> <?php echo $assmtOpenStat?>
                                </p>
                                <p class="text-info">
                                    <strong>Total Plays:</strong> <?php echo $TotalPlays?>
                                </p>
                                <p class="text-info">
                                    <strong>Like Count:</strong> <?php echo $assmtLike?>
                                </p>
                                <p class="text-info">
                                    <strong>Dislike Count:</strong> <?php echo $assmtDislike?>
                                </p>
                            </div>
                        </div>
                        <div class="class-actions">
                            <button class="act-btn manageQBtn" onclick="location.href='manageQuestion.php?assmtcode=<?php echo $assmtCode?>';"> 
                                <i class="fa fa-question-circle" style="padding-right:10px;"></i>
                                Manage Question
                            </button>
                            <button class="act-btn editQuizBtn" onclick="location.href='editAssessment.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-edit" style="padding-right:10px;"></i>
                                Edit Quiz
                            </button>
                            <button class="act-btn deleteQuizBtn" onclick="location.href='deleteAssessment.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-trash" style="padding-right:10px;"></i>
                                Delete Quiz
                            </button>
                            <button class="act-btn viewRepBtn" onclick="location.href='viewReport.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-file-text" style="padding-right:10px;"></i>
                                View Report
                            </button>
                            <button class="act-btn viewStatBtn" onclick="location.href='viewStatistics.php?assmtcode=<?php echo $assmtCode?>';">
                                <i class="fa fa-line-chart" style="padding-right:10px;"></i>
                                View Statistics
                            </button>
                        </div>
                    </div>
          <?php } ?>       
        </div>
    </main>

    <script> 
        function copyToClipboard(targetCopy) {
            var textCopy = document.getElementById(targetCopy).innerHTML;

            navigator.clipboard.writeText(textCopy);

            alert("Assessment code copied!");
        }
    </script>
    
    <!-- Footer -->
    <?php include "WKSfooter.php";?>
</body>
</html>
