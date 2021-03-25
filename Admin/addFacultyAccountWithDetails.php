<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user'])){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
    
    $facultyType = $_POST['facultyType'];
?>
<html lang="en">
    <head>
        <title>Add a Faculty Account</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="admin.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "adminHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
            function confAddStudentSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else{
                    closeDropClassForm();
                }
            }
        </script>
    </head>
    <body>
        <div>
            <form method="post" class="form" action="../scripts/addFacultyAccount.php" onsubmit="confAddStudentSubmit(this.form)">
                <p><b>Add Faculty Account</b></p>

                <?php
                echo "<input type = 'hidden' name = 'facultyType' value = '$facultyType' />";
                echo "<p>Faculty Type is $facultyType</p>";
                ?>


                <p><label><b>First Name: </b></label>
                <input type="text" class="field" placeholder="First Name of Faculty" name="FName" required></p>

                <p><label><b>Middle Name (Optional): </b></label>
                <input type="text" class="field" placeholder="MName of Faculty" name="MName"></p>
                
                <p><label><b>Last Name: </b></label>
                <input type="text" class="field" placeholder="Last Name of Faculty" name="LName" required></p>


                <p><label><b>Gender</b></label>
                <select name="gender" id="Gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select></p>

                <p><label><b>Address</b></label>
                <p><label><b>Street: </b></label>
                <input type="text" class="field" placeholder="Street" name="street" required></p>
                <p><label><b>City: </b></label>
                <input type="text" class="field" placeholder="City" name="city" required></p>
                <p><label><b>State: </b></label>
                <input type="text" class="field" placeholder="State" name="state" maxlength="2" required></p>
                <p><label><b>Zip Code: </b></label>
                <input type="number" class="field" placeholder="Zip Code" name="zipcode" required></p>
                <p><label><b>Phone Number: </b></label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder = "123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                <small>Format: 123-456-7890</small>

                <p><label><b>Departments</b></label>
                <table>
                
                <tbody>
                    <?php

                    $conn = connectToDB();
                    $sql = "SELECT departmentName, departmentID FROM department";
                    if(!($result = mysqli_query($conn, $sql))){
                        echo "SOMETHING WENT WRONG";
                        die();
                    }

                    if($facultyType == "fullTime"){

                    
                        echo "<thead>
                        <td>Name</td>
                        <td>Not related</td>
                        <td>Junior</td>
                        <td>Senior</td>
                        <td>Make Manager</td>
                        <td>Make Head</td>
                        </thead>";


                        while ($row = $result->fetch_row()) {
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td width='11%' class='pldefault'>
                        <input type='radio' name='department$row[1]' value='Unrelated' checked id='$row[1] unrelated'>
                        </td>";
                        echo "<td width='11%' class='pldefault'>
                        <input type='radio' name='department$row[1]' value='Junior' id='$row[1] junior'>
                        </td>";
                        echo "<td width='11%' class='pldefault'>
                        <input type='radio' name='department$row[1]' value='Senior' id='$row[1] senior'>
                        </td>";
                        echo "<td width='11%' class='pldefault'>
                        <input type='radio' name='department$row[1]' value='Manager' id='$row[1] manager'>
                        </td>";
                        echo "<td width='11%' class='pldefault'>
                        <input type='radio' name='department$row[1]' value='Head' id='$row[1] head'>
                        </td>";
                        
                        echo "</tr>";
                        }
                    }
                    else{
                        
                        echo "<thead>
                        <td>Name</td>
                        <td>Not related</td>
                        <td>Junior</td>
                        </thead>";


                        while ($row = $result->fetch_row()) {
                            echo "<tr>";
                            echo "<td>$row[0]</td>";
                            echo "<td width='11%' class='pldefault'>
                            <input type='radio' name='department$row[1]' value='Unrelated' checked id='$row[1] unrelated'>
                            </td>";
                            echo "<td width='11%' class='pldefault'>
                            <input type='radio' name='department$row[1]' value='Junior' id='$row[1] junior'>
                            </td>";
                            
                        
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
                
                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
    </body>
</html>