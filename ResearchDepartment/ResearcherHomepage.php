
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
        <title>Researcher Homepage</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="researcher.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "logout"
                        break;
                    case 1:
                        id = "changePass"
                        break;
                    case 2:
                        id = "inputNewStatistic"
                        break;
                    case 3:
                        id = "updateStatistic"
                        break;
                    case 4:
                        id = "removeStatistic"
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
                    closeForm();
            }    
        </script>
    </head>
    
    <body>
        <div>
            <h1>Welcome, Researcher!</h1>
        </div>
        <div class="linkContainer">
            <div class="buttonContainer" onclick="sendRedirectForm(0)">
                <h3>Log out</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(1)">
                <h3>Change Password</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(2)">
                <h3>Input New Statistic</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(3)">
                <h3>Update Statistic</h3>
            </div>

            <div class="buttonContainer" onclick="sendRedirectForm(4)">
                <h3>Remove Statistic</h3>
            </div>

            </div>
        </div>
        
        <form action= "../scripts/redirect.php" method="post" id="redirectForm">
        </form>
    </body>
</html>