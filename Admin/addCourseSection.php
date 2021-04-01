<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Admin"){
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
        </script>
    </head>
    <body>
        <h1>Add a Course Section</h1>


        <div>
            <form method="post" class="form" action= "../scripts/addCourseSection.php" onsubmit="return confirm('Are you sure you want to submit the form?')">
                <p><b>Add Course Section</b></p>

                <p><label><b>Course ID: </b></label>
                <input type="text" class="field" placeholder="Course ID" name="CourseID" required></p>

                <p><label><b>Faculty ID: </b></label>
                <input type="text" class="field" placeholder="Faculty ID #" name="FacultyID" required></p>

                <p><label><b>Room ID: </b></label>
                <input type="text" class="field" placeholder="Enter Room #" name="RoomID" required></p>

                <p><label><b>Semester</b></label>
                <select name="Semester" id="Semester">
                <option value='0'>Spring 2021</option>
                <option value='1'>Fall 2021</option>
                <option value='99'>Spring 2020</option>
                <option value='98'>Fall 2020</option>
                <option value='97'>Spring 2019</option>
                <option value='96'>Fall 2019</option>
                <option value='95'>Spring 2018</option>
                <option value='94'>Fall 2018</option>
                <option value='93'>Spring 2017</option>
                <option value='92'>Fall 2017</option>
                </select>

                <br></br>
                <table>
                <tr>
                    <p for="Days"><b>Days: </b></p>

                    <td width="11%" class="pldefault">
                    <input type="radio" name="select_day" value="mw" id="monwed" required>
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
                <input type = "number" id="period" name = "period" min="1" max="7" step="1" required>
                </div>
                <br></br>

                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>

        
        
    </body>
</html>