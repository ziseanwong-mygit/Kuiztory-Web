<?php
    include './phpcrud/DBconnection.php';
    $getStuID = $_SESSION['SES_StuID'];

    $query = "SELECT * FROM student WHERE StudentID = '$getStuID';";

    $results = mysqli_query($connection, $query);
    
    $data = mysqli_fetch_assoc($results);

    $refStuID = $data['StudentID'];
    $refStuEmail = $data['StudentEmail'];
    $refStuName = $data['StudentName'];
    $refStuTelNo = $data['StudentTelNo'];
    $refStuGender = $data['StudentGender'];
    $refStuCountry = $data['StudentCountry'];
    $refStuGradeLvl = $data['StudentGradeLvl'];
    $refStuSchool = $data['StudentSchool'];
    $refStuSPM = $data['StudentSPM'];
    $refStuImg = $data['StudentImg'];
    $refStuPswd = $data['StudentPSWD'];
    $refStuRegDate = $data['StudentRegDate'];
?>