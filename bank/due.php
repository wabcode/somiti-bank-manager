<?php
$date1=date('01-01-2012');
$date2=date("d-m-Y");
echo "date1 :: ".$date1."<br>";
echo "date2 :: ".$date2."<br>";
$date_diff=strtotime($date2)-strtotime($date1);
echo "date difference in months => ".floor(($date_diff)/2628000)." months <br>";
?>