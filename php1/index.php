<?php include('db.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YCS HR portal</title>
</head>
<body>
    <h1>Add new employee</h1>
    <form id="employeeForm" action="process.php" method="post" onsubmit="return validateForm()">
        <!-- <label for="emp_id">Employee ID:</label>
        <input type="text" name="emp_id" id="emp_id" required><br> -->
        <label for="emp_name">Employee Name:</label>
        <input type="text" name="employee_name" id="employee_name" required><br>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required><br>
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="contact">Contact:</label>
        <input type="number" name="contact" id="contact" required><br>

        <label for="team_name">Team Name:</label>
        <select name="team_name" id="team_name" required>
            <option value="">Select Team</option>
            <option value="Absolute">Absolute</option>
            <option value="Centrix">Centrix</option>
            <option value="Reservation">Reservation</option>
            <option value="Integration">Integration</option>
            <option value="Operation">Operation</option>
        </select><br>

        <label for="joining_date">Joining Date:</label>
        <input type="date" id="joining_date" name="joining_date" required><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" id="birthdate" required><br>

        <input type="submit" value="Add Employee">

        <h2>Employee List</h2>
        <table border = 1>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Email</th>
                <th>contact</th>
                <th>Team</th>
                <th>Joining Date</th>
                <th>Birthdate</th>
                <th>Actions</th>

            </tr>
            <?php 
            $result = $con->query("SELECT * FROM employees");
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                <td>{$row['employee_id']}</td>
                <td>{$row['employee_name']}</td>
                <td>{$row['address']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['email']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['team_name']}</td>
                <td>{$row['joining_date']}</td>
                <td>{$row['birthdate']}</td>
                <td>
                    <a href='edit.php?employee_id={$row['employee_id']}'>Edit</a> |
                    <a href='delete.php?employee_id={$row['employee_id']}'>Delete</a>
                </td>
            </tr>";
            }
            ?>
        </table>

    </form>
    <script>
        function validateForm(){
            let email = document.getElementById("email").value;
            let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\ṭ.[a-zA-Z]{2,4}$/;

            if(!emailPattern.test(email)){
                alert("Please Enter a valid email address.");
                return false;
            }
            
            let joiningDate = new Date(document.getElementById("joining_date").value);
            let currentDate = new Date();
            currentDate.setHours(0,0,0,0);
             if (joiningDate < currentDate){
                    alert ("Joining Date cannot be in the past.");
                    return false;
        }
        return true;
    }

    </script>

</body>
</html>
