<!doctype html>
<html lang="en">
    <head>
        <title>List of Enrolled Students</title>
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
        </script>
    </head>
    <body>
            <h1>LIST OF ALL ENROLLED UNDERGARDUATE STUDENTS</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FName</th>
                        <th>MName</th>
                        <th>LName</th>
                        <th>Gender</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>ZipCode</th>
                        <th>Phone Number</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Number Of Credits</th>
                        <th>Expected Graduation Date</th>
                        <th>Start Year</th>
                        <th>GPA</th>
                        <th>GPA Requirement</th>
                        <th>Credits To Graduate</th>
                        <th>Status</th>
                        <th>Course Load</th>
                    </tr>
                <thead>
            </table>
    </body>
</html>