<?php include('db.php');

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM music_cds where id = $id";

    if(mysqli_query($con, $sql)){
        header("Location: add.php");
        exit();
    }else{
        echo "error" . mysqli_error($con);
    }
}
$con->close();
?>