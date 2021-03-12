<!doctype html>
<html lang="en" class="page">
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="student.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "studentHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
            function confDropClassSubmit(form) {
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
        <form method="post" class="form" id="dropSectionForm" action= "../scripts/dropCourseSection.php" onsubmit="return confDropClassSubmit(this.form)">
            <p><b>Drop Class</b></p>
            <label><b>CRN</b></label>
            <input type="text" class="field" placeholder="Enter CRN of section you would like to drop" name="section" required>

            <p><input type="button" value="Submit" onclick="confDropClassSubmit(this.form)">
            <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
         </form>

        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>