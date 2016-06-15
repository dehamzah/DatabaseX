<?php
include "config/dbconnect.php";

mysql_query("DELETE FROM auth_userprofile WHERE ID = '".$_GET['id']."'");
echo "<script language=javascript>parent.location.href='data.php';</script>";
?>
