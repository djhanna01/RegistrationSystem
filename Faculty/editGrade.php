<!doctype html>
<html lang="en">
    <?php 
        
        include '../global.php';
        if(!isset($_COOKIE['user'])){
            header("Location:  $baseURL/homepage/homepage.php"); 
            die();
        }
    ?>
    <head>
        <title>Edit Grade</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="faculty.css">

        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "facultyHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }

            function confEditGradeSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
            }
        </script>
    </head>
    <body>
        <div>
            <form method="post" class="form" onsubmit="confEditGradeSubmit(this.form)">
                <p><b>Edit Student's Grade</b></p>
                <label><b>ID</b></label>
                <input type="text" class="field" placeholder="Enter Id of student you would like to edit the grade of" name="grade" required>
                
                <p><label><b>CRN</b></label>
                <input type="text" class="field" placeholder="Enter CRS of section the student is apart of" name="grade" required></p>
                
                <p><label><b>Midterm Grade</b></label>
                <select name="midtermGrade" id="midtermGrade">
                    <option value="S">S</option>
                    <option value="U">U</option>
                    <option value="F">F</option>
                </select>

                <p><label><b>Final Grade</b></label>
                <select name="finalGrade" id="finalGrade">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>

                <p><label><b>Course Grade</b></label> 
                <select name="courseGrade" id="courseGrade">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
    </body>
</html>