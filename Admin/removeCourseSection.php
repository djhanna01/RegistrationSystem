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
        <title>Remove Course Section</title>
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
            function confRemoveCourseSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
            }
        </script>
    </head>
    <body>
        <h1>Remove Course Section</h1>


        <div>
            <form method="post" class="form" onsubmit="confRemoveCourseSubmit(this.form)">
                <p><b>Enter the CRN of the course section you wish to REMOVE.</b></p>

                <p><label><b>CRN: </b></label>
                <input type="text" class="field" placeholder="Enter CRN" name="CRN" required></p>

                <p><label><b>Section Number: </b></label>
                <input type="text" class="field" placeholder="Enter Section #" name="SectionNumber" required></p>
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