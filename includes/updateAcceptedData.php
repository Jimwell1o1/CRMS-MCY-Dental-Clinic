<?php
    session_start();

    require_once 'dbh.inc.php';

    if(isset($_POST['submit'])){

        $sql = "SELECT * FROM booking;";
        $result = mysqli_query($conn, $sql);
        $resultChecked = mysqli_num_rows($result);

        $bookingId = $_GET['bookingId'];

        $bookingStatus = "UPDATE booking SET bookingStatus = 'Done' WHERE bookingId = '$bookingId';";

        if($resultChecked > 0){  
            while($row = mysqli_fetch_assoc($result)){
                if($bookingId === $row['bookingId']){
                    mysqli_query($conn, $bookingStatus);
                }   
            }
        }
        $_SESSION['Done'] = 'Done';
        header("location: ../admin/accepted.php");
        exit();

    }else {
        $sql = "SELECT * FROM booking;";
        $result = mysqli_query($conn, $sql);
        $resultChecked = mysqli_num_rows($result);

        $bookingId = $_GET['bookingId'];

        $bookingStatus = "UPDATE booking SET bookingStatus = 'Missed' WHERE bookingId = '$bookingId';";

        if($resultChecked > 0){  
            while($row = mysqli_fetch_assoc($result)){
                if($bookingId === $row['bookingId']){
                    mysqli_query($conn, $bookingStatus);
                }
            }
        }
        $_SESSION['Missed'] = 'Missed';
        header("location: ../admin/accepted.php");
        exit();
    }

?>