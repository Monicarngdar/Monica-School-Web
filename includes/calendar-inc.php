<?php 

/* -----CALENDAR CALCULATIONS-------*/
if (!empty($_GET['date'])){
$date = date_create($_GET['date']);
}else{
$date = date_create("now");
}

/* First start with calculating the amount of weeks to show in calendar. Some month could be 4,5 or 6 depending on the year and days in month.*/
$month=date_format($date,'m');
$monthName=date_format($date,'F');
$year= date_format($date,'Y');
$lastDayOfMonth = date_format($date,'t');

//lets get the 1st of the month
$date = date_create("$year-$month-01");
$firstWeek=date_format($date,'W');
$firstDayOfWeekMonth=date_format($date,'w'); 
if ($firstDayOfWeekMonth==0){
$firstWeek=$firstWeek+1; 
}

$date = date_create("$year-$month-$lastDayOfMonth");
$lastWeek=date_format($date,'W');
if ($lastWeek<$firstWeek){
$lastWeek=53; 
}

$dt = date_create("$year-$month-01");
date_modify($dt, '+1 month');
$nextMonthDate=date_format($dt, 'Y-m-d');

$dt = date_create("$year-$month-01");
date_modify($dt, '-1 month');
$prevMonthDate = date_format($dt, 'Y-m-d');

$dt = date_create("now");
$today= date_format($dt, 'Y-m-d');

$dayOfWeekCount=0;
$day=1;
$start=false;


//Print some debugging information for calculations
echo "<!--M: $month Y: $year FW: $firstWeek LW: $lastWeek LDM: $lastDayOfMonth -->";

/* -----END CALENDAR CALCULATIONS-------*/









?>