<html>
<head>
<?php 
    
    include 'global.php';
    set_time_limit(0);
?>
</head>
<?php

function incDate($date, $times){
        $date->modify('+'. $times . 'days');
    return $date;
}
function getPresence(){
    $randomNum = rand(1,100);
    if($randomNum > 97){
        return "Absent";
    }
    else if($randomNum > 93){
        return "Late";
    }
    return "Present";
}

$conn = connectToDB();
$sql = "select studentID, CRN from studenthistory where (studentID, CRN) NOT IN (SELECT studentID, CRN FROM attendance);
";

$result = mysqli_query($conn, $sql);


while($row = $result->fetch_row()){


    $studentID = $row[0];
    $CRN = $row[1];


    $subSql = "SELECT coursesection.startDate, coursesection.endDate, timeslotday.dayOfTheWeek
        FROM coursesection
        LEFT JOIN timeslotday
        ON timeslotday.timeslotID = coursesection.timeslotID
        WHERE coursesection.CRN = $CRN
        LIMIT 1";
    $subResult = mysqli_query($conn, $subSql);
    $subRow = $subResult->fetch_row();

    $currentDate =new DateTime($subRow[0]);
    $endDate =new DateTime($subRow[1]);
    $isFriday = false;
    if($subRow[2] == "Friday"){
        $isFriday = true;
    }
    $incAmount = 2;

    echo $endDate->format('Y-m-d') ." <br><br>";


    while($currentDate <= $endDate){
        $presence = getPresence();
        $subSubSql = "INSERT INTO attendance VALUES($studentID, $CRN, \"$presence\", \"" . $currentDate->format('Y-m-d') ."\")";
        $subSubResult = mysqli_query($conn, $subSubSql);
        if(!$subSubResult){
            echo "Something went wrong";
            die();
        }


        if($isFriday){
            $currentDate = incDate($currentDate, 7);
        }
        else{
            
            $currentDate = incDate($currentDate, $incAmount);
            if($incAmount == 2){
                $incAmount = 5;
            }
            else{
                $incAmount = 2;
            }
        }
        
        echo $currentDate->format('Y-m-d') ." <br>";
    }

}



try {
    $date = new DateTime('2021-04-24');
} catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}




?>

<body>

</body>
</html>
