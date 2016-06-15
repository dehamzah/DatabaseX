<?php
// Preparing setting for XLS export
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=DATA.xls");

include "config/dbconnect.php";
?>
