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
        <title>Update Statistic</title>
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
        </script>
    </head>
    <body>
        <h1>Update Statistic</h1>

        <div>
            <form method="post" class="form" onsubmit="return confirm('Are you sure you want to submit the form?')">
                <p><b>Name of the statistic you wish to update.</b></p>

                <p><label><b>Statistic Name: </b></label>
                <input type="text" class="field" placeholder="Enter Statistic Name" name="SName" required></p>
                <br></br>

                <p><label><b>Enter the new description of the statistic. </b></label></p>

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