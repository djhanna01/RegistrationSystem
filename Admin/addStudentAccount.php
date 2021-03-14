<!doctype html>
<html lang="en">
    <head>
        <title>Add a Student Account</title>
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
            function confAddStudentSubmit(form) {
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
            <form method="post" class="form" onsubmit="confAddStudentSubmit(this.form)">
                <p><b>Add Student Account</b></p>
                
                <p><label><b>Student ID: </b></label>
                <input type="text" class="field" placeholder="Student ID #" name="ID" required></p>

                <label><b>First Name: </b></label>
                <input type="text" class="field" placeholder="First Name of Student" name="FName" required>
                
                <p><label><b>Last Name: </b></label>
                <input type="text" class="field" placeholder="Last Name of Student" name="LName" required></p>
                
                <p><label><b>Email: </b></label>
                <input type="text" class="field" placeholder="Student Email" name="Email" required></p>

                <p><label><b>Gender</b></label>
                <select name="Gender" id="Gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>

                <p><label><b>Student Type</b></label> 
                <select name="courseGrade" id="courseGrade">
                    <option value="Full-time Undergraduate">Full-time Undergraduate</option>
                    <option value="Part-time Undergraduate">Part-time Undergraduate</option>
                    <option value="Full-time Graduate">Full-time Graduate</option>
                    <option value="Part-time Graduate">Part-time Graduate</option>
                </select>
                <p><input type="submit" value="Submit">
                <input type="button" onclick="sendRedirectForm(0)" value="Cancel"></p>
            </form>
        </div>
    </body>
</html>