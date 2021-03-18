<!DOCTYPE html>
<html>
<head>
	<title>NHU Master Schedule</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="masterSchedule.css">
</head>

<body>
	<h1>Master Schedule Search</h1>
	<form method="post" action="../scripts/masterSchedule.php">
	<div>
		<label><b>Semester:</b></label>
			<select name="semester" id="semester">
				<option>Spring 2021</option>
				<option>Fall 2021</option>
			</select>
	</div>
	<br></br>
	<div>
   		<label for="department"><b>Department:</b></label>
    	<select name="department" id="department">
	    	<option value = "All">All</option>
	    	<option value = "Maths & CIS">Maths & CIS</option>	
	    	<option value = "Education">Education</option>
	    	<option value = "Visual Arts">Visual Arts</option>
	    	<option value = "Psychology">Psychology</option>
	    	<option value = "History">History</option>
	    	<option value = "English">English</option>
	    	<option value = "Biological Sciences">Biological Sciences</option>
   		</select>
	</div>
    <br></br>

    <div>
    <label for="courseNumSearch"><b>Course Number: </b></label>
    <input type="text" id="courseID" name="courseID"
      aria-label="Search through course number">
    </div>
    <br></br>

    <div>
    <label for="InstructorSearch"><b>Instructor First Name:</b></label>
    <input type="text" id="facultyFirst" name="facultyFirstName"
      aria-label="Search through title name">
    </div>
    <br></br>

	<div>
    <label for="InstructorSearch"><b>Instructor Last Name:</b></label>
    <input type="text" id="TitleSearch" name="facultyLastName"
      aria-label="Search through title name">
    </div>
    <br></br>

    <div class = "startTimeContainer">
    <label for="StartTime"><b>Start time: </b></label>
    <input type = "time" id="startTime" name = "startTime"
    		min="09:00" max="20:00">
    </div>
    <br></br>

    <div>
    <label for="EndTime"><b>End time: </b></label>
    <input type = "time" id="endTime" name = "endTime"
    		min="09:00" max="20:00">
    </div>
	<br></br>
    
    
    <table>
	<tr>
	    <p for="Days"><b>Days: </b></p>

	    <td width="11%" class="pldefault">
	    <input type="checkbox" name="select_day" value="m" id="monday">
	    <abbr title="Monday">Mon</abbr>
		</td>

	    <td width="11%" class="pldefault">
	    <input type="checkbox" name="select_day" value="t" id="tuesday">
	    <abbr title="Monday">Tue</abbr>
		</td>

	    <td width="11%" class="pldefault">
	    <input type="checkbox" name="select_day" value="w" id="wednesday">
	    <abbr title="Monday">Wed</abbr>
		</td>

	    <td width="11%" class="pldefault">
	    <input type="checkbox" name="select_day" value="th" id="thursday">
	    <abbr title="Monday">Thur</abbr>
		</td>

	    <td width="11%" class="pldefault">
	    <input type="checkbox" name="select_day" value="f" id="friday">
	    <abbr title="Monday">Fri</abbr>
		</td>

	    <td width="11%" class="pldefault">
	    <input type="checkbox" name="select_day" value="s" id="saturday">
	    <abbr title="Monday">Sat</abbr>
		</td>

	    <td width="11%" class="pldefault">
	    <input type="checkbox" name="select_day" value="sun" id="sunday">
	    <abbr title="Monday">Sun</abbr>
		</td>
	</tr>
    </table>
    <br></br>

    <div>
    	<input type="submit" value="Class Search">
      	<input type ="reset" value="Reset">
    </div>
	</form>
    



</body>
</html>
