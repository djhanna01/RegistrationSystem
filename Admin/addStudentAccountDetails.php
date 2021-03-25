<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user'])){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
    $studentType = $_POST['studentType'];
?>
<html lang="en">
    <head>
        <title>Add a Student Account</title>
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
            <form method="post" class="form" action="../scripts/addStudentAccount.php" onsubmit="confAddStudentSubmit(this.form)">
                <p><b>Add Student Account</b></p>

                <?php
                echo "<input type = 'hidden' name = 'studentType' value = '$studentType' />";
                echo "<p>Student Type is $studentType</p>";
                ?>
                

                <p><label><b>First Name: </b></label>
                <input type="text" class="field" placeholder="First Name of Student" name="FName" required></p>

                <p><label><b>Middle Name (Optional): </b></label>
                <input type="text" class="field" placeholder="MName of Student" name="MName"></p>
                
                <p><label><b>Last Name: </b></label>
                <input type="text" class="field" placeholder="Last Name of Student" name="LName" required></p>


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

                <p><label><b>Start Year</b></label>
                <select name="startYear" id="startYear">
                    <option value="2021">2021</option>
                </select></p>
                <?php
                if($studentType == "Grad"){
                echo"<p><label><b>Grad Program</b></label>
                    <select name='gradProgram' id='startYear'>
                        <option value='Adolescence Education: Mathematics (7-12), M.A.T.'>Adolescence Education: Mathematics (7-12), M.A.T.</option>
                        <option value='M.S. in Data Science'>M.S. in Data Science</option>
                        <option value='Mathematics, PhD'>Mathematics, PhD</option>
                        <option value='Mental Health Counseling, M.S.'>Mental Health Counseling, M.S.</option>
                        <option value='Adolescence Education: English Language Arts (7-12), M.A.T.'>Adolescence Education: English Language Arts (7-12), M.A.T.</option>
                        <option value='Adolescence Education: Biology (7-12), M.A.T.'>Adolescence Education: Biology (7-12), M.A.T.</option>
                        <option value='Biomedical Sciences, PhD'>Biomedical Sciences, PhD</option>
                    </select></p>
                    <p><label><b>Bachelors Degree: </b></label>
                    <input type='text' class='field' placeholder='Bachelors Degree' name='bachelors' required></p>";
                }
                ?>

                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
    </body>
</html>