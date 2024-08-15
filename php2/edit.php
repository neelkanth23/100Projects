<?php    

include('db.php');
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])){
$id = $_GET['id'];
$sql = "SELECT * FROM music_cds WHERE id = $id";
$result = $con->query($sql);
$cds = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CDs</title>
        
        <script>
    
            function validateForm(){
                var aName = document.forms["cdForm"]["album_name"].value;
                var sName = document.forms["cdForm"]["singer_name"].value;
                var cName = document.forms["cdForm"]["composer_name"].value;
                var place = document.forms["cdForm"]["place"].value;
    
                var nPattern = /^[A-Za-z\s]+$/;
                if (!nPattern.test(aName)) {
                    alert("Should contain only letters and spaces.");
                    return false;
                }
    
                if (!nPattern.test(sName)) {
                    alert("Should contain only letters and spaces.");
                    return false;
                }
    
                if (!nPattern.test(cName)) {
                    alert("Should contain only letters and spaces.");
                    return false;
                }
                if (!nPattern.test(place)) {
                    alert("Should contain only letters and spaces.");
                    return false;
                }
                return true;
            }
    
        </script>
    </head>
    <body>
        <h2>Edit Music</h2>
        <form name ="cdForm" action="edit.php" onsubmit="return validateForm()" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Album Name:</label>
            <input type="text" name="album_name" value="<?php echo $cds['album_name']; ?>" required><br><br>
    
            <label>Singer Name:</label>
            <input type="text" name="singer_name" value="<?php echo $cds['singer_name']; ?>" required><br><br>
    
            <label>Composer Name:</label>
            <input type="text" name="composer_name" value="<?php echo $cds['composer_name']; ?>" required><br><br>
    
            <label>Launch Date:</label>
            <input type="date" name="launch_date" value="<?php echo $cds['launch_date']; ?>" required><br><br>
    
            <label>Place:</label>
            <input type="text" name="place" value="<?php echo $cds['place']; ?>"  required><br><br>
    
            <input type="submit" value= "Update CD">
    
        </form>
    </body>
    </html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $aName = $_POST['album_name'];
    $sName = $_POST['singer_name'];
    $cName = $_POST['composer_name'];
    $launch = $_POST['launch_date'];
    $place = $_POST['place'];
     

    // SQL query to update data
    $sql = "UPDATE music_cds SET 
            album_name='$aName', 
            singer_name='$sName', 
            composer_name='$cName', 
            launch_date='$launch', 
            place='$place' 
            WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        header("Location: add.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($con);
?>
    