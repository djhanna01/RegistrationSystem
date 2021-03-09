<!DOCTYPE html>
<html>
<head>
<title>NHU Master Schedule</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

h1{
	color: orange;
	font-size: 40px;
}

body{
	background-image: url(MasterScheduleBackground.jpg);
	background-repeat: no-repeat;
	background-size: 100% 1000px;
}

b{
	color: tan;
}

abbr{
	color: tan;
}
</style>
</head>

<body>
	<h1>Master Schedule Search</h1>
	<div>
	<form>
    <label for="subjects"><b>Subject: </b></label>
    	<select name="Subjects" id="Subjects">
	    	<option value = "All">All</option>
	    	<option value = "American Studies">American Studies</option>	
	    	<option value = "Biological Sciences">Biological Sciences</option>
	    	<option value = "Chemistry and Physics">Chemistry and Physics</option>
	    	<option value = "Community Learning">Community Learning</option>
	    	<option value = "Computer Science">Computer Science</option>
	    	<option value = "Criminology">Criminology</option>
	    	<option value = "English">English</option>
	    	<option value = "First-Year Experience">First-Year Experience</option>
	    	<option value = "General Studies">General Studies</option>
   		</select>
	</div>
    <br>

    <div>
    <label for="vourseNumSearch"><b>Course Number: </b></label>
    <input type="search" id="courseNumSearch" name="q"
      aria-label="Search through course number">
    </div>
    <br>

    <div>
    <label for="InstructorSearch"><b>Instructor: </b></label>
    <input type="search" id="TitleSearch" name="q"
      aria-label="Search through title name">
    </div>
    <br>

    <div class = "startTimeContainer">
    <label for="StartTime"><b>Start time: </b></label>
    <input type = "time" id="startTime" name = "startTime"
    		min="09:00" max="20:00">
    </div>
    <br>

    <div>
    <label for="EndTime"><b>End time: </b></label>
    <input type = "time" id="endTime" name = "endTime"
    		min="09:00" max="20:00">
    </div>
	<br>
    
    
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
    <br>

    <div>
    	<input type="submit" value="Class Search">
      	<input type ="reset" value="Reset">
    </div>
	</form>
    



</body>
</html>
