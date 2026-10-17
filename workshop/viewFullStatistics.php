<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Kuiztory_logo_trans.png">
    <title>Kuiztory - View Assessment Statistics</title>
    <link rel="stylesheet" href="./styles/viewFullStatistics.css">
    <link rel="stylesheet" href="./styles/WKSheader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        $refStatID = $_GET['statid'];
        include './crudWKS/info_Statistics.php';
    ?>

    <header class="removePrint">
        <button class="exit-btn" onclick="location.href='assessmentWorkshop.php';">
            <i class="fa fa-times-circle" style="padding-right:5px;"></i>
            Exit Statistics
        </button>
        <div class="logo">
            <a href="homePage.php">
                <img src="../images/Kuiztory_title_trans.png" alt="Kuiztory logo">
            </a>        
        </div>
        <div class="header-buttons">
            <button class="save-btn" onclick="print();">
                <i class="fa fa-download" style="padding-right:5px;"></i>
                Download & Print Statistics
            </button>
        </div>
    </header>

    <div class="title-and-description">
        <h1 class="title">Assessment Statistics</h1>
    </div>

    <div class="info-box">
        <div class="info">
            <span>
                <strong>Result ID: </strong>
                <span id="copyInfo"><?php echo $refStatID;?></span>
            </span>
            <div class="copy removePrint">
                <button class="copy-Btn info1" onclick="copyToClipboard('copyInfo')">
                    <i class="fa fa-clipboard" style="padding-right:5px;"></i>
                    Copy StatisticsID
                </button>
            </div>
        </div>
    </div>

    <main class="statistics-container">
        <div class="statistics-details">
            <h2>Assessment Info</h2>
            <div class="details-box">
                <p>
                    <strong>ID:</strong> 
                    <?php echo $refAssmtCode?>
                </p>
                <p>
                    <strong>Creation date:</strong> 
                    <?php echo $AssmtDate?>
                </p>
                <p>
                    <strong>Difficulty:</strong> 
                    <?php echo $AssmtDiff?>
                </p>
                <p>
                    <strong>Chapter:</strong> 
                    <?php echo str_replace("Chapter", '', $AssmtChap)?>
                </p>
                <p>
                    <strong>Total questions:</strong> 
                    <?php echo $TotalQuestions?>
                </p>
                <p>
                    <strong>Created by:</strong> 
                    <?php echo $TeacherName?>
                </p>
                <p>
                    <strong>Name:</strong> 
                    <?php echo $AssmtName?>
                </p>
                <p>
                    <strong>Grade:</strong> 
                    <?php echo $AssmtGrade?>
                </p>
                <p>
                    <strong>Topic:</strong> 
                    <?php echo $AssmtTopic?>
                </p>
                <p>
                    <strong>Total marks:</strong> 
                    <?php echo $TotalMarks?>
                </p>
                <p>
                    <strong>Like count:</strong> 
                    <?php echo $AssmtLike?>
                </p>
                <p>
                    <strong>Dislike count:</strong> 
                    <?php echo $AssmtDislike?>
                </p>
            </div>
        </div>

        <div class="total-attempts">
            <h2>Total Attempts: <?php echo $TotalAttempt?></h2>
            <div class="progress-bar">
                <div class="pass-bar" style="width: <?php echo $PassRate?>%;">Pass: <?php echo $PassAttempts?></div>
                <div class="fail-bar" style="width: <?php echo $FailRate?>%;">Fail: <?php echo $FailAttempts?></div>
            </div>
            <p>
                <strong>Passing Rate:</strong> <?php echo $formatPassRate?> | 
                <strong>Failing Rate:</strong> <?php echo $formatFailRate?> | 
                <strong>Status:</strong> 
                <?php 
                    if ($PassingStatus == "Successful") {
                ?>    
                        <span style="color:green;"><?php echo $PassingStatus;?></span>
                <?php
                    } else {
                ?>
                        <span style="color:red;"><?php echo $PassingStatus;?></span>
                <?php
                    }    
                ?>
            </p>
        </div>

        <div class="grade-and-question-container">
            <section class="grade-count">
                <h2>Grade Count</h2>
                <table>
                    <tr>
                        <th>Grade</th>
                        <th>Value</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>A+</td>
                        <td>0</td>
                        <td><?php echo $NumofAPlus?></td>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>1</td>
                        <td><?php echo $NumofA?></td>
                    </tr>
                    <tr>
                        <td>A-</td>
                        <td>2</td>
                        <td><?php echo $NumofAMinus?></td>
                    </tr>
                    <tr>
                        <td>B+</td>
                        <td>3</td>
                        <td><?php echo $NumofBPlus?></td>
                    </tr>
                    <tr>
                        <td>B</td>
                        <td>4</td>
                        <td><?php echo $NumofB?></td>
                    </tr>
                    <tr>
                        <td>C+</td>
                        <td>5</td>
                        <td><?php echo $NumofCPlus?></td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td>6</td>
                        <td><?php echo $NumofC?></td>
                    </tr>
                    <tr>
                        <td>D</td>
                        <td>7</td>
                        <td><?php echo $NumofD?></td>
                    </tr>
                    <tr>
                        <td>E</td>
                        <td>8</td>
                        <td><?php echo $NumofE?></td>
                    </tr>
                    <tr>
                        <td>G</td>
                        <td>9</td>
                        <td><?php echo $NumofG?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <th>Total results:</th>
                        <td><?php echo $TotalResults?></td>
                    </tr>
                </table>
            </section>
            <section class="question-statistics">
                <h2>Question Statistics</h2>
                <table>
                    <tr>
                        <th>Num</th>
                        <th>Question</th>
                        <th>Total Correct</th>
                        <th>Total Incorrect</th>
                        <th>Ratio by Percentage</th>
                    </tr>
                    <?php
                        include './crudWKS/DBconnection.php';
                        
                        $query2 = "SELECT * FROM question WHERE AssmtCode = '$refAssmtCode' ORDER BY QueNum ASC;";
                        $results2 = mysqli_query($connection, $query2);
                        while($data2 = mysqli_fetch_assoc($results2)) {
                            $QueNum = $data2['QueNum'];
                            $Question = $data2['QueContent'];
                            $NumofCorr = $data2['QueNumAnsCorr'];
                            $NumofIncorr = $data2['QueNumAnsInCorr'];
                            if ($NumofCorr == 0 && $NumofIncorr == 0) {
                                $formatPercentCorrect = 0;
                                $formatPercentIncorrect = 0;
                                $fullRatio = "0:0";
                            } else {
                                $x = (int)$NumofCorr;
                                $y = (int)$NumofIncorr;
                                $TotalRightWrong = $x + $y;
                                $PercentCorr = ($NumofCorr / $TotalRightWrong) * 100;
                                $PercentIncorr = ($NumofIncorr / $TotalRightWrong) * 100;

                                if (str_contains($PercentCorr, ".")) {
                                    $formatPercentCorrect = number_format((float)$PercentCorr, 2, ".", "");
                                } else {
                                    $formatPercentCorrect = $PercentCorr;
                                }

                                if (str_contains($PercentIncorr, ".")) {
                                    $formatPercentIncorrect = number_format((float)$PercentIncorr, 2, ".", "");
                                } else {
                                    $formatPercentIncorrect = $PercentIncorr;
                                }

                                $gcdPercent = GCD($formatPercentCorrect, $formatPercentIncorrect);
                                $ratioCorrect = $formatPercentCorrect / $gcdPercent;
                                $ratioIncorrect = $formatPercentIncorrect / $gcdPercent;
                                if (str_contains($ratioCorrect, ".")) {
                                    $formatRatioCorrect = number_format((float)$ratioCorrect, 0, ".", "");
                                } else {
                                    $formatRatioCorrect = $ratioCorrect;
                                }

                                if (str_contains($ratioIncorrect, ".")) {
                                    $formatRatioIncorrect = number_format((float)$ratioIncorrect, 0, ".", "");
                                } else {
                                    $formatRatioIncorrect = $ratioIncorrect;
                                }
                                $fullRatio = $formatRatioCorrect . ":" . $formatRatioIncorrect;
                            }    
                    ?>
                            <tr>
                                <td><?php echo $QueNum?></td>
                                <td><?php echo $Question?></td>
                                <td><?php echo $NumofCorr?> (<?php echo $formatPercentCorrect?>%)</td>
                                <td><?php echo $NumofIncorr?> (<?php echo $formatPercentIncorrect?>%)</td>
                                <td><?php echo $fullRatio?></td>
                            </tr>
                  <?php } ?>
                </table>
            </section>
        </div>

        <div class="statistics-details">
            <h2>Overall Statistics</h2>
            <div class="details-box">
                <p>
                    <strong>Sum of Marks:</strong> 
                    <?php echo $SumOfMarks?>
                </p>
                <p>
                    <strong>Mean of Marks:</strong> 
                    <?php echo $MeanOfMarks?>
                </p>
                <p>
                    <strong>Most Correct Question:</strong> 
                    <?php echo $MostCorrectQue?>
                </p>
                <p>
                    <strong>Most Incorrect Question:</strong>
                    <?php echo $MostIncorrectQue?> 
                </p>
                <p>
                    <strong>Highest Mark Obtaiend:</strong> 
                    <?php echo $HighestMark?>
                </p>
                <p>
                    <strong>Lowest Mark Obtained:</strong> 
                    <?php echo $LowestMark?>
                </p>
            </div>
        </div>
    </main>

    <footer class="removePrint">
        <div class="more-action">
            <button class="more-Btn act1" onclick="window.scrollTo({top: 0, behavior:'smooth'})">
                <i class="fa fa-arrow-circle-up" style="padding-right:5px;"></i>
                Back to Top
            </button>
            <button class="more-Btn act2" onclick="location.href='assessmentWorkshop.php';">
                <i class="fa fa-sign-out" style="padding-right:5px;"></i>
                Leave Page
            </button>
        </div>
    </footer>

    <script> 
        function copyToClipboard(targetCopy) {
            var textCopy = document.getElementById(targetCopy).innerHTML;

            navigator.clipboard.writeText(textCopy);

            alert("Statistics ID copied!");
        }
    </script>
</body>
</html>
