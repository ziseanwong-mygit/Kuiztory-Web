<?php
    include 'DBconnection.php';

    $refAssmtCode = $_GET['assmtcode'];

    $query = "SELECT * FROM assessment WHERE AssmtCode = '$refAssmtCode';";

    $results = mysqli_query($connection, $query);

    $data = mysqli_fetch_assoc($results);

    $trimmedCode = str_replace("ASSMT_", '', $refAssmtCode);

    $refFullCode = $refAssmtCode;
    $refTrimCode = $trimmedCode;
    $refName = $data['AssmtName'];
    $refDesc = $data['AssmtDesc'];
    $refCreaDate = $data['AssmtRegDate'];
    $refGrade = $data['AssmtGradeLvl'];
    $refChapter = $data['AssmtChapter'];
    $refTopic = $data['AssmtTopic'];
    $refDiff = $data['AssmtDifficulty'];
    $refVisibility = $data['AssmtVisibility'];
    $refTags = $data['AssmtTags'];
    $refBgImg = $data['AssmtBgImg'];
    $refLikeCount = $data['LikeCount'];
    $refDislikeCount = $data['DislikeCount'];
    $refOpenStatus = $data['AssmtOpenStatus'];

    if ($refBgImg == NULL) { // set default background image
        $refBgImg = "default_assmtbg.jpg";
    }
?>

<?php
    $query2 = "SELECT SUBSTRING_INDEX(AssmtTags, ',', 1) AS tag_1,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 2), ',', -1) AS tag_2,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 3), ',', -1) AS tag_3,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 4), ',', -1) AS tag_4,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 5), ',', -1) AS tag_5,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 6), ',', -1) AS tag_6,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 7), ',', -1) AS tag_7,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 8), ',', -1) AS tag_8,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 9), ',', -1) AS tag_9,
               SUBSTRING_INDEX(SUBSTRING_INDEX(AssmtTags, ',', 10), ',', -1) AS tag_10
               FROM assessment WHERE AssmtTags IS NOT NULL AND AssmtCode = '$refAssmtCode';";

    $results2 = mysqli_query($connection, $query2);

    $data2 = mysqli_fetch_assoc($results2);

    if(!empty($data2)) {
        $refTag1 = $data2['tag_1'];
        $refTag2 = $data2['tag_2'];
        $refTag3 = $data2['tag_3'];
        $refTag4 = $data2['tag_4'];
        $refTag5 = $data2['tag_5'];
        $refTag6 = $data2['tag_6'];
        $refTag7 = $data2['tag_7'];
        $refTag8 = $data2['tag_8'];
        $refTag9 = $data2['tag_9'];
        $refTag10 = $data2['tag_10'];
    } else {
        $refTag1 = "Tag 1";
        $refTag2 = "Tag 2";
        $refTag3 = "Tag 3";
        $refTag4 = "Tag 4";
        $refTag5 = "Tag 5";
        $refTag6 = "Tag 6";
        $refTag7 = "Tag 7";
        $refTag8 = "Tag 8";
        $refTag9 = "Tag 9";
        $refTag10 = "Tag 10";
    }
?>

<?php
    $query3 = "SELECT COUNT(AttemptID) AS TotalPlays FROM attempt WHERE AssmtCode = '$refAssmtCode';";
    $results3 = mysqli_query($connection, $query3);
    $data3 = mysqli_fetch_assoc($results3);

    $totalPlays = $data3['TotalPlays'];
?>

<?php
    $query4 = "SELECT SUM(QueMark) AS TotalQueMarks FROM question WHERE AssmtCode = '$refAssmtCode';";
    $results4 = mysqli_query($connection, $query4);
    $data4 = mysqli_fetch_assoc($results4);

    $totalMarks = $data4['TotalQueMarks'];
?>