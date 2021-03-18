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
                        id = "adminHomepage";
                        break;
                    case 1:
                        id = "updateCourseSectionSelectSection";
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
        </script>
    </head>

    <body>
        <form method="post" action="updateCourseSectionSelectSection.php" name="courseIDForm" id="courseIDForm" class= "form">
            <p><label><b>Course ID: </b></label>
            <input type="text" class="field" placeholder="Course ID" name="CourseID" required></p>

            <p><button type="submit">Submit</button>
            <input type="button" value="Cancel"onclick="sendRedirectForm(0)"></p>
        </form>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>