<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Assessment</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/selectedAssessment.css">
    <link rel="stylesheet" href="./styles/header2.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        // PHP code for getting assessment info
        include './phpcrud/info_Assessment.php';
    ?>

    <!-- Header -->
    <?php 
        if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {
            include "header2.php";
        } else {
            include "header.php";
        }
    ?>

    <main style="background-image: url('./images/assmtBgImg/<?php echo $refBgImg?>');">
        <div class="container">
            <div class="left">
                <button class="button-back" onclick="location.href='homePage.php';"><Strong><i class="fa fa-arrow-left" style="padding-right: 10px;"></i>Explore more content</Strong></button>
                <div class="share">
                    <p style="font-weight: bold;">Share with your friends<p>

                    <p>
                        <strong>Code: </strong>
                        <span id="copyCode" style="color: blue;"><?php echo $refTrimCode;?></span> <!-- Different code here -->
                        <button onclick="copyToClipboard('copyCode')">
                            <i class="fa fa-clipboard" style="font-size: 20px"></i>
                        </button>
                    </p>
                </div>
            </div>

            <script> 
                function copyToClipboard(targetCopy) {
                    var textCopy = document.getElementById(targetCopy).innerHTML;

                    navigator.clipboard.writeText(textCopy);

                    alert("Assessment ID copied!");
                }
            </script>

            <div class="middle">
                <div class="middle-header">
                    <span style="font-size: 14px; font-weight: bold;"><?php echo $refName;?></span>
                </div>
                <div class="content-details">
                    <div class="details">
                        <p><strong>Description:</strong><?php echo $refDesc;?></p>
                        <p><strong>Grade:</strong> <?php echo $refGrade;?></p>
                        <p><strong>Chapter:</strong> <?php echo $refChapter;?></p>
                        <p><strong>Difficulty:</strong> <?php echo $refDiff;?></p>
                        <p><strong>Total marks:</strong> <?php echo $totalMarks;?></p>
                        <p><strong>Topic:</strong> <?php echo $refTopic;?></p>
                        <p><strong>Creation date:</strong> <?php echo $refCreaDate;?></p>
                        <p><strong>Total plays:</strong> <?php echo $totalPlays?></p>
                        <p><strong>Like/Dislike count:</strong> <?php echo $refLikeCount;?> / <?php echo $refDislikeCount;?></p>
                    </div>
                    <div class="tags">
                        <span class="tag"><?php echo $refTag1;?></span>
                        <span class="tag"><?php echo $refTag2;?></span>
                        <span class="tag"><?php echo $refTag3;?></span>
                        <span class="tag"><?php echo $refTag4;?></span>
                        <span class="tag"><?php echo $refTag5;?></span>
                        <span class="tag"><?php echo $refTag6;?></span>
                        <span class="tag"><?php echo $refTag7;?></span>
                        <span class="tag"><?php echo $refTag8;?></span>
                        <span class="tag"><?php echo $refTag9;?></span>
                        <span class="tag"><?php echo $refTag10;?></span>
                    </div>
                </div>
                <h2 class="comment-title">User Comments</h2>
                <div class= "author">
                    <?php
                        include './phpcrud/DBconnection.php';

                        $refAssmtCode = $_GET['assmtcode'];

                        $query = "SELECT * FROM comment WHERE AssmtCode = '$refAssmtCode';";

                        $results = mysqli_query($connection, $query);

                        while($data = mysqli_fetch_assoc($results)) {

                            $comment = $data['ComtContent'];
                            $studentID = $data['StudentID'];
                            $teacherID = $data['TeacherID'];
                            $commentDate = $data['ComDate'];

                            if(!(empty($studentID))) {
                                $query2 = "SELECT * FROM student WHERE StudentID = '$studentID';";

                                $results2 = mysqli_query($connection, $query2);

                                $data2 = mysqli_fetch_assoc($results2);

                                $userName = $data2['StudentName'];
                                $userGrade = $data2['StudentGradeLvl'];
                                $userSchool = $data2['StudentSchool'];
                            } else {
                                $query2 = "SELECT * FROM teacher WHERE teacherID = '$teacherID';";

                                $results2 = mysqli_query($connection, $query2);

                                $data2 = mysqli_fetch_assoc($results2);

                                $userName = $data2['TeacherName'];
                                $userGrade = $data2['TeachingLvl'];
                                $userSchool = $data2['TeacherSchool'];
                            }
                    ?>
                            <div class="author-header">
                                <p class="name"><b><?php echo $userName;?></b></h4>
                                <p class="grade"><?php echo $userGrade;?> - <?php echo $userSchool;?></p>
                                <p class="date"><?php echo $commentDate;?></p>
                            </div>
                            <p><?php echo $comment;?></p>
                            <hr style="border: 1px solid darkblue;">
                  <?php } ?>
                </div>
            </div>

            <div class="right">
                <?php
                    if($refOpenStatus == "Open") {
                ?>
                        <button class="button-initiate" onclick="location.href='assessmentLobby.php?assmtcode=<?php echo $refAssmtCode?>';">
                            ▶ Initiate Quiz
                        </button>
                <?php
                    } else {
                ?>     
                    <button class="button-closed">
                        Sorry! This quiz has been closed by the creator.
                    </button>
                <?php       
                    }
                ?>    
                <div class="actions">
                    <span style="font-weight: bold;">How's your experience?</span>
                    <div class="actions-button">
                        <form action="" method="POST">
                            <button class="btn-like" type="submit" name="addLike" style="font-weight: bold; padding: 5px">
                                <i class="fa fa-thumbs-up" style="padding-right: 5px;"></i>
                                Good
                            </button>
                            <button class="btn-dislike" type="submit" name="addDislike" style="font-weight: bold; padding: 5px">
                                <i class="fa fa-thumbs-down" style="padding-right: 5px;"></i>
                                Bad
                            </button>
                        </form>
                    </div>
                </div>

                <?php if(isset($_SESSION['SES_StuID']) || isset($_SESSION['SES_TeaID'])) {?>
                    <div class="feedback">
                        <p>Leave a feedback!</p>
                        <form action="" method="POST">
                            <textarea name="commentInp" placeholder="Comment here!" required></textarea>
                            <button class="button-post" type="submit" name="addComment">
                                <i class="fa fa-commenting-o" style="padding-right: 10px;"></i>
                                Post
                            </button>
                        </form>                        
                    </div>
                <?php } else { ?>
                    <div class="feedback">
                        <h3>To comment on this quiz, pls sign up or log in your account.</h3>
                    </div>
                <?php } ?>    
            </div> 
        </div>
    </main>

    <?php
        if(isset($_POST['addLike']) || isset($_POST['addDislike'])) {
            include './phpcrud/addLikeDislike.php';
        }

        if(isset($_POST['addComment'])) {
            include './phpcrud/addComment.php';
        }
    ?>

    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>