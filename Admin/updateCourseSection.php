<!doctype html>
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
                    case 1:
                        id = "updateCourseSectionDetails"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
        </script>
    </head>

    <body>
        <form method= "post" action="updateCourseSectionDetails.php" class= "form">
            <p><label><b>Course ID: </b></label>
            <input type="text" class="field" placeholder="Course ID" name="CourseID" required></p>
        </form>

        <p><input type="submit" value="Submit">
        <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>