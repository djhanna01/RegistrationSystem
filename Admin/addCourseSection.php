<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user'])){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>Add a Course Section</title>
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
            function confAddClassSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else{
                    sendRedirectForm(0);
                }
            }
        </script>
    </head>
    <body>
        <h1>Add a Course Section</h1>


        <div>
            <form method="post" class="form" action= "../scripts/addCourseSection.php" onsubmit="confAddCourseSubmit(this.form)">
                <p><b>Add Course Section</b></p>

                <p><label><b>Course ID: </b></label>
                <input type="text" class="field" placeholder="Course ID" name="CourseID" required></p>

                <p><label><b>Faculty ID: </b></label>
                <input type="text" class="field" placeholder="Faculty ID #" name="FacultyID" required></p>

                <p><label><b>Room ID: </b></label>
                <input type="text" class="field" placeholder="Enter Room #" name="RoomID" required></p>

                <p><label><b>Semester</b></label>
                <select name="Semester" id="Semester">
                    <option>Spring 2021</option>
                    <option>Fall 2021</option>
                </select>

                <br></br>
                <table>
                <tr>
                    <p for="Days"><b>Days: </b></p>

                    <td width="11%" class="pldefault">
                    <input type="radio" name="select_day" value="mw" id="monwed">
                    <abbr title="MonWed">Mon/Wed</abbr>
                    </td>

                    <td width="11%" class="pldefault">
                    <input type="radio" name="select_day" value="tt" id="tuethur">
                    <abbr title="TueThur">Tue/Thur</abbr>
                    </td>

                    <td width="11%" class="pldefault">
                    <input type="radio" name="select_day" value="f" id="fri">
                    <abbr title="Fri">Fri</abbr>
                    </td>

                </tr>
                </table>
                <br></br>

                <div>
                <label><b>Period Number:</b></label>
                <input type = "number" id="period" name = "period" min="1" max="7" step="1" >
                </div>
                <br></br>

                <p><input type="submit" value="Submit" onclick="confAddClassSubmit(this.form)">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>

        
        
    </body>
</html>