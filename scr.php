<?php
set_time_limit(10000000000);
for($i=58001;$i<60000;$i++){
$data = file_get_contents('https://liveresults.jagranjosh.com/Result2019/jsp/ga/GA12.jsp?rollNo='.$i);

$y = explode('<div class="subject">',$data);

if(isset($y)){
    $y1 = $y[0];
    $x1 = explode('</p>',$y1);

    $rollno1 = explode('<p class="name">',$x1[5]);
    $rollno = explode('</p>',$rollno1[1])[0];

    $name1 = explode('<p class="name">',$x1[7]);
    $name = explode('</p>',$name1[1])[0];


    $middlename1 = explode('<p class="name">',$x1[11]);
    $middlename = explode('</p>',$middlename1[1])[0];

    $last = $x1[9];
    $last1 = explode('<p class="name">',$x1[9]);
    $last = explode('</p>',$last1[1])[0];

    $y2 = $y[1];

    $x = explode('</p>',$y2);
    

    $subName1 =  trim(explode('</span>',$x[3])[1]);
    $subMarks1 = explode('span>',$x[4])[2];

    $subName2 =  trim(explode('</span>',$x[6])[1]);
    $subMarks2 = explode(' ',$x[7]);
    $subMarks2 = trim(explode('</span>',$subMarks2[4])[1]);
    
    $subName3 = trim(explode('</span>',$x[9])[1]);
    $subMarks3 = explode(' ',$x[10]);
    $subMarks3 = trim(explode('</span>',$subMarks3[4])[1]);

    $subName4 =  trim(explode('</span>',$x[12])[1]);
    $subMarks4 = explode(' ',$x[13]);
    $subMarks4 = trim(explode('</span>',$subMarks4[4])[1]);


    $subName5 =  trim(explode('</span>',$x[15])[1]);
    $subMarks5 = explode(' ',$x[16]);
    $subMarks5 = trim(explode('</span>',$subMarks5[4])[1]);


    $subName6 =  trim(explode('</span>',$x[18])[1]);
    $subMarks6 = explode(' ',$x[19]);
    $subMarks6 = trim(explode('</span>',$subMarks6[4])[1]);


    $avg = ((int)$subMarks1) + ((int)$subMarks2) + ((int)$subMarks3) + ((int)$subMarks4) + ((int)$subMarks5) + ((int)$subMarks6);
    $avg = (int)$avg/6; 


    $dbconnect = mysqli_connect("localhost", "root", "", "goa board");

    if($subName3=="Physics"){
    $insert_sql = "INSERT INTO `results3` (`id`, `name`, `rollno`, `middle_name`, `last_name`, `Subject_1`, `Marks_1`, `Subject_2`, `Marks_2`, `Subject_3`, `Marks_3`, `Subject_4`, `Marks_4`, `Subject_5`, `Marks_5`, `Subject_6`, `Marks_6`, `Avg`) 
    VALUES (
        NULL, 
        '" . mysqli_real_escape_string($dbconnect, $name) . "',
        '" . mysqli_real_escape_string($dbconnect, ($rollno)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($middlename)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($last)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subName1)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subMarks1)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subName2)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subMarks2)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subName3)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subMarks3)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subName4)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subMarks4)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subName5)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subMarks5)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subName6)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($subMarks6)) . "',
        '" . mysqli_real_escape_string($dbconnect, ($avg)) . "'
        );";
        
        $insert_qry = mysqli_multi_query($dbconnect, $insert_sql);

}}
}

?>