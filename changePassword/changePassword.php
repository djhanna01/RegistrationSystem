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
        <title>Change Password</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="changePassword.css">
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

            function confChangePassSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                //else
                    //go back to previous page.
            }   
        </script>
    </head>
    <body>
        <div>
            <form method="post" class="form" id="changePassForm" onsubmit="confChangePassSubmit(this.form)">
                <h1><b>Change Password</b></h1>
                <label><b>Current Password</b></label>
                <input type="text" class="field" placeholder="Enter current password" name="oldPasword" required>

                <p><label><b>New Password</b></label>
                <input type="text" class="field" placeholder="Enter new password" name="newPasword" required></p>

                <p><label><b>Re-enter New Password</b></label>
                <input type="text" class="field" placeholder="Re-enter new password" name="reNewPasword" required></p>

                <input type="submit" value="Submit">
                <button type="button" onclick="">Cancel</button>
            </form>
        </div>
    </body>
</html>
