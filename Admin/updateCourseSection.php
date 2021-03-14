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
        <title>Update Course Section</title>
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
            function confUpdateCourseSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
            }
        </script>
    </head>
    <body>
        <h1>Update Course Section</h1>


        <div>
            <form method="post" class="form" onsubmit="confUpdateCourseSubmit(this.form)">
                <p><b>Enter the CRN of the course section you wish to update.</b></p>

                <p><label><b>CRN: </b></label>
                <input type="text" class="field" placeholder="CRN #" name="CRN" required></p>
                <br></br>

                <p><b>Enter the information of the course section you wish to update. 
                Information inputed here will be made to update the course section's details.</b></p>

                <p><label><b>Faculty ID: </b></label>
                <input type="text" class="field" placeholder="Faculty ID #" name="CourseName" ></p>

                <p><label><b>Room Number: </b></label>
                <input type="text" class="field" placeholder="Enter Room #" name="RoomNumber" ></p>

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
                <p><label><b>Periods: </b></label></p>

                <div class = "startTimeContainer">
                <label for="StartTime"><b>Start time: </b></label>
                <input type = "time" id="startTime" name = "startTime"
                        min="09:00" max="20:00">
                </div>
                <br>

                <div>
                <label for="EndTime"><b>End time: </b></label>
                <input type = "time" id="endTime" name = "endTime"
                        min="09:00" max="20:00">
                </div>
                <br>

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