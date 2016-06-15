<?php
function writeMsg($tipe){
	if ($tipe=='save.success') {
		$MsgClass = "alert-success";
		$Msg = "Saved!";
	} else
	if ($tipe == 'save.failed') {
		$MsgClass = "alert-danger";
		$Msg = "Error!";
	}
	else
	if ($tipe == 'update.success') {
		$MsgClass = "alert-success";
		$Msg = "Updated!";
	}
	else
	if ($tipe == 'update.failed') {
		$MsgClass = "alert-danger";
		$Msg = "Update Failed!";
	}

echo "<div class=\"alert alert-dismissible ".$MsgClass."\">
  	  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
  	  ".$Msg."
	  </div>";
}
