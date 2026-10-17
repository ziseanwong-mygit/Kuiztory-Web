<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuiztory - Home Page</title>
    <link rel="icon" type="image/x-icon" href="./images/Kuiztory_logo_trans.png">
    <link rel="stylesheet" href="./styles/homePage.css">
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
        <section class="content-row">
            <div class="recommended">
                <h2>Latest Uploads <button class="more-btn" onclick="location.href='latestAssessment.php';">More</button></h2>
                <div class="carousel-item active">
                    <button class="arrow left" onclick="showPrevDiv(1)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment ORDER BY AssmtRegDate DESC LIMIT 6;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(1)">▶</button>
                </div>
                <div class="carousel-item">
                    <button class="arrow left" onclick="showPrevDiv(1)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment ORDER BY AssmtRegDate DESC LIMIT 6 OFFSET 6;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(1)">▶</button>
                </div>
                <div class="carousel-item">
                    <button class="arrow left" onclick="showPrevDiv(1)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment ORDER BY AssmtRegDate DESC LIMIT 6 OFFSET 12;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(1)">▶</button>
                </div>
                <div class="carousel-item">
                    <button class="arrow left" onclick="showPrevDiv(1)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment ORDER BY AssmtRegDate DESC LIMIT 6 OFFSET 18;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(1)">▶</button>
                </div>
                <div class="carousel-item">
                    <button class="arrow left" onclick="showPrevDiv(1)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment ORDER BY AssmtRegDate DESC LIMIT 6 OFFSET 24;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(1)">▶</button>
                </div>
            </div>
            

            <div class="latest">
                <h2>All Quizzes <button class="more-btn" onclick="location.href='allAssessment.php';">More</button></h2>
                <div class="carousel-item active">
                    <button class="arrow left" onclick="showPrevDiv(2)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment LIMIT 6;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(2)">▶</button>
                </div>
                <div class="carousel-item">
                    <button class="arrow left" onclick="showPrevDiv(2)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment LIMIT 6 OFFSET 6;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(2)">▶</button>
                </div>
                <div class="carousel-item">
                    <button class="arrow left" onclick="showPrevDiv(2)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment LIMIT 6 OFFSET 12;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(2)">▶</button>
                </div>
                <div class="carousel-item">
                    <button class="arrow left" onclick="showPrevDiv(2)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment LIMIT 6 OFFSET 18;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(2)">▶</button>
                </div>
                <div class="carousel-item">
                    <button class="arrow left" onclick="showPrevDiv(2)">◀</button>
                    <div class="quiz-grid">
                        <?php
                            $query = "SELECT * FROM assessment LIMIT 6 OFFSET 24;";

                            $results = mysqli_query($connection, $query);

                            while ($data = mysqli_fetch_assoc($results)) {

                                $refCode = $data['AssmtCode'];
                                $refName = $data['AssmtName'];
                                $refGrade = $data['AssmtGradeLvl'];
                                $refChap = $data['AssmtChapter'];
                                $refDiff = $data['AssmtDifficulty'];
                                $refVisible = $data['AssmtVisibility'];
                                if($refVisible == "Public") {
                        ?>
                                    <div class="quiz-card" onclick="location.href='selectedAssessment.php?assmtcode=<?php echo $refCode?>';">
                                        <h5><?php echo $refName?></h5><br>
                                        <p style="font-size:12px;"><?php echo $refGrade;?> | <?php echo $refChap;?> | <?php echo $refDiff;?></p>
                                    </div>
                        <?php            
                                }
                            } 
                        ?>
                    </div>
                    <button class="arrow right" onclick="showNextDiv(2)">▶</button>
                </div>
            </div>
        </section>

        <section class="tags">
            <h3 class="tag-to-search">Tags To Search</h3>
            <div class="tag-list">  
                <?php
                    $query = "SELECT SUBSTRING_INDEX(AssmtTags, ',', 1) AS tag_1,
                              SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 2), ',', -1) AS tag_2,
                              SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 3), ',', -1) AS tag_3,
                              SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 4), ',', -1) AS tag_4,
                              SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 5), ',', -1) AS tag_5
                              FROM assessment WHERE AssmtTags IS NOT NULL;";

                    $results = mysqli_query($connection, $query);

                    while ($data = mysqli_fetch_assoc($results)) {
                        $refTag1 = $data['tag_1'];
                        $refTag2 = $data['tag_2'];
                        $refTag3 = $data['tag_3'];
                        $refTag4 = $data['tag_4'];
                        $refTag5 = $data['tag_5'];
                ?>
                        <button><?php echo $refTag1?></button>
                        <button><?php echo $refTag2?></button>
                        <button><?php echo $refTag3?></button>
                        <button><?php echo $refTag4?></button>
                        <button><?php echo $refTag5?></button>
                <?php } ?> 
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include "footer2.php";?>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        let currentIndex1 = 0;
        let currentIndex2 = 0;

        // Select all carousel items for each carousel
        const items1 = document.querySelectorAll(".recommended .carousel-item");
        const items2 = document.querySelectorAll(".latest .carousel-item");
        console.log(items1);

        // Function to show the next item in the carousel
        window.showNextDiv = function(carouselNumber) {
            let items, currentIndex;

            // Select the appropriate items and index based on carouselNumber
            if (carouselNumber === 1) {
                items = items1;
                currentIndex = currentIndex1;
                console.log("Current Index: " + currentIndex);
            } else if (carouselNumber === 2) {
                items = items2;
                currentIndex = currentIndex2;
            }

            // Check if items are available
            if (items.length > 0) {
                // Hide the current item
                items[currentIndex].classList.remove("active");

                // Update the current index
                currentIndex = (currentIndex + 1) % items.length;

                // Show the next item
                items[currentIndex].classList.add("active");

                // Update the index for the respective carousel
                if (carouselNumber === 1) {
                    currentIndex1 = currentIndex;
                } else if (carouselNumber === 2) {
                    currentIndex2 = currentIndex;
                }
            }
        };

        // Function to show the previous item in the carousel
        window.showPrevDiv = function(carouselNumber) {
            let items, currentIndex;

            // Select the appropriate items and index based on carouselNumber
            if (carouselNumber === 1) {
                items = items1;
                currentIndex = currentIndex1;
            } else if (carouselNumber === 2) {
                items = items2;
                currentIndex = currentIndex2;
            }

            // Check if items are available
            if (items.length > 0) {
                // Hide the current item
                items[currentIndex].classList.remove("active");

                // Update the current index
                currentIndex = (currentIndex - 1 + items.length) % items.length;

                // Show the previous item
                items[currentIndex].classList.add("active");

                // Update the index for the respective carousel
                if (carouselNumber === 1) {
                    currentIndex1 = currentIndex;
                } else if (carouselNumber === 2) {
                    currentIndex2 = currentIndex;
                }
            }
        };
    });
    </script>
</body>
</html>
