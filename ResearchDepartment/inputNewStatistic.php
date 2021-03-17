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
        <title>Add a New Statistic</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="researcher.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "researcherHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
            function confSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                    form.submit();
                }
                else
                    closeDropClassForm();
            }
        </script>
    </head>
    <body>
        <h1>Add a New Statistic</h1>

        <div>
            <form method="post" class="form" onsubmit="confSubmit(this.form)">
                <p><b>Enter a name for the statistic.</b></p>

                <p><label><b>Statistic Name: </b></label>
                <input type="text" class="field" placeholder="Enter Statistic Name" name="SName" required></p>
                <br></br>

                <p><label><b>Enter the description of the statistic. </b></label></p>

                <textarea id=SDescription class="field" placeholder="Enter Description" name="SDescription" rows="8" cols="50" required></textarea>

                <br></br>


                
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