<!doctype html>
<html lang="en">
    <head>
        <title>List Of Courses</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="admin.css">
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
        </script>
    </head>
    <body>
        <h1>List Of All Available Courses</h1>

        <details>
            <summary>CS2511 - Computer Programming II - 4 credits - Dep of Maths & Computer Sciences</summary>
            <table>
                <thead>
                    <tr>
                        <th>CRN</th>
                        <th>Course ID</th>
                        <th>Faculty ID</th>
                        <th>Room</th>
                        <th>Timeslot</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Seats Left</th>
                        <th>Seats Taken</th>
                        <th>Section Number</th>
                    </tr>
                <thead>
            </table>
        </details>
            
    </body>
</html>