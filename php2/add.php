<?php include('db.php');  ?>

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
        <h2>Add Music</h2>
        <form name ="cdForm" action="save.php" onsubmit="return validateForm()" method="post">
            <label>Album Name:</label>
            <input type="text" name="album_name" required><br><br>

            <label>Singer Name:</label>
            <input type="text" name="singer_name" required><br><br>

            <label>Composer Name:</label>
            <input type="text" name="composer_name" required><br><br>

            <label>Launch Date:</label>
            <input type="date" name="launch_date" required><br><br>

            <label>Place:</label>
            <input type="text" name="place" required><br><br>

            <input type="submit" value= "Add CD">

        </form>

        <h2>Music CD list</h2>
            <form action="search.php" method="post">
                <label>Search by Album Name:</label>
                <input type="text" name="search_term">
                <input type="submit" value="Search">
            </form>

            <br>

            <table border="1">
            <tr>
                <th>Album Name</th>
                <th>Singer Name</th>
                <th>Composer Name</th>
                <th>Launch Date</th>
                <th>Place</th>
                <th>Actions</th>
            </tr>

            <?php 
            
            $sql = "SELECT * FROM music_cds";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result)>0) {
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['album_name']."</td>";
                    echo "<td>".$row['singer_name']."</td>";
                    echo "<td>".$row['composer_name']."</td>";
                    echo "<td>".$row['launch_date']."</td>";
                    echo "<td>".$row['place']."</td>";
                    echo "<td><a href='edit.php?id=".$row['id']."'>Edit</   a> | <a href= 'delete.php?id=".$row['id']."'>Delete</a></td>";
                    echo "</tr>";
                }
                # code...
            }else{
                echo "<tr><td colspan='6'>No CDs Found</td></tr>";
            }
            mysqli_close($con);
            ?>
        </table>
</body>
</html>