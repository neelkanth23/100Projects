<?php include('db.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $aName = $_POST['album_name'];
    $sName = $_POST['singer_name'];
    $cName = $_POST['composer_name'];
    $lDate = $_POST['launch_date'];
    $place = $_POST['place'];

    $errors = [];

    if (!preg_match("/^[A-Za-z\s]+$/", $aName)) {
        $errors[] = "should contain only letters and spaces.";
    }
    if (!preg_match("/^[A-Za-z\s]+$/", $sName)) {
        $errors[] = "should contain only letters and spaces.";
    }
    if (!preg_match("/^[A-Za-z\s]+$/", $cName)) {
        $errors[] = "should contain only letters and spaces.";
    }
    if (!preg_match("/^[A-Za-z\s]+$/", $place)) {
        $errors[] = "should contain only letters and spaces.";
    }

    if(count($errors)>0){
        foreach($errors as $error){
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<a href='add.php'>Go Back</a>";
    }


    $sql = "INSERT INTO music_cds (album_name, singer_name, composer_name, launch_date, place) VALUES ('$aName', '$sName', '$cName', '$lDate', '$place')";

    if(mysqli_query($con, $sql)){
        echo "Added Successfully";
        header("Location: add.php");
    }else{
        echo "Error" . $sql . "<br>". mysqli_error($con);
    }

}
mysqli_close($con);

?>