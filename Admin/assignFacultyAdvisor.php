<!doctype html>
<html lang="en">
    <head>
        <title>Assign Faculty Advisor</title>
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
            function confAssignAdvisorSubmit(form) {
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
            <form method="post" class="form" onsubmit="confAssignAdvisorSubmit(this.form)">
                <p><b>Enter Faculty Member's ID Who will be the Advisor</b></p>
                
                <p><label><b>Faculty ID: </b></label>
                <input type="text" class="field" placeholder="Faculty ID #" name="ID" required></p>
                <br></br>

                <p><b>Enter the student's ID # in which the faculty member will be advising.</b></p>

                <p><label><b>Student ID: </b></label>
                <input type="text" class="field" placeholder="Student ID #" name="ID" required></p>

                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
    </body>
</html>