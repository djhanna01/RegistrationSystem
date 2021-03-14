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
        </script>
    </head>
    <body>
        <h1>Add a Course Section</h1>


        <div>
            <form method="post" class="form" onsubmit="confAddCourseSubmit(this.form)">
                <p><b>Add Course Section</b></p>

                <p><label><b>Course ID: </b></label>
                <input type="text" class="field" placeholder="Course ID" name="CourseID" required></p>

                <p><label><b>CRN: </b></label>
                <input type="text" class="field" placeholder="CRN #" name="CRN" required></p>

                <p><label><b>Faculty ID: </b></label>
                <input type="text" class="field" placeholder="Faculty ID #" name="CourseName" required></p>

                <p><label><b>Room Number: </b></label>
                <input type="text" class="field" placeholder="Enter Room #" name="RoomNumber" required></p>

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
                    <input type="checkbox" name="select_day" value="m" id="monday">
                    <abbr title="Monday">Mon</abbr>
                    </td>

                    <td width="11%" class="pldefault">
                    <input type="checkbox" name="select_day" value="t" id="tuesday">
                    <abbr title="Monday">Tue</abbr>
                    </td>

                    <td width="11%" class="pldefault">
                    <input type="checkbox" name="select_day" value="w" id="wednesday">
                    <abbr title="Monday">Wed</abbr>
                    </td>

                    <td width="11%" class="pldefault">
                    <input type="checkbox" name="select_day" value="th" id="thursday">
                    <abbr title="Monday">Thur</abbr>
                    </td>

                    <td width="11%" class="pldefault">
                    <input type="checkbox" name="select_day" value="f" id="friday">
                    <abbr title="Monday">Fri</abbr>
                    </td>

                    <td width="11%" class="pldefault">
                    <input type="checkbox" name="select_day" value="s" id="saturday">
                    <abbr title="Monday">Sat</abbr>
                    </td>

                    <td width="11%" class="pldefault">
                    <input type="checkbox" name="select_day" value="sun" id="sunday">
                    <abbr title="Monday">Sun</abbr>
                    </td>
                </tr>
                </table>
                <br></br>

                <div>
                <label><b>Period Number:</b></label>
                <input type = "number" id="period" name = "period" min="1" max="7" step="1" >
                </div>
                <br></br>

                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>

        <?php

        $conn = connectToDB();
        //php code here

        ?>
        
        
    </body>
</html>