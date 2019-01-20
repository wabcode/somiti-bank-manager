<?php
require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>TriConsole - Programming, Web Hosting, and Entertainment Directory</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>

<style type="text/css">
body, input, select { font-size: 13px; font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", "Verdana", sans-serif; }

pre { font-size: 13px; font-family: "Consolas", "Menlo", "Monaco", "Lucida Console", "Liberation Mono", "DejaVu Sans Mono", "Bitstream Vera Sans Mono", "Courier New", monospace, serif; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color: #FF0000; }
</style>
</head>

<body>

  <?php
  $myCalendar = new tc_calendar("date5", true, false);
  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
  $myCalendar->setPath("calendar/");
  $myCalendar->setYearInterval(2000, 2017);
  $myCalendar->dateAllow('2008-05-13', '2025-03-01');
  $myCalendar->setDateFormat('j F Y');
  //$myCalendar->setHeight(350);
  //$myCalendar->autoSubmit(true, "form1");
  $myCalendar->setAlignment('left', 'bottom');
  $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
  $myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
  $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
  $myCalendar->writeScript();
  ?>
  

</body>
</html>
