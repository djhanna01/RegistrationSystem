<!doctype html>
<html lang="en">
    <head>
        <title>Remove Hold for a Student</title>
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
            function confRemoveHoldSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
            }
        </script>
    </head>
    <body>
        <h1>Remove Hold</h1>
        <div>
            <form method="post" class="form" onsubmit="confRemoveHoldSubmit(this.form)">
                <p><b>Remove Hold for a Student</b></p>

                <label><b>Student ID: </b></label>
                <input type="text" class="field" placeholder="Enter Student ID #" name="StudentID" required>

                <p><label><b>Hold ID: </b></label>
                <input type="text" class="field" placeholder="Enter the hold ID #" name="HoldNumber" required></p>
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