<html>
<head>
<?php
include "plugin/header.php";
include "plugin/notification.php";
include "config/dbconnect.php";

$sql = mysql_query("SELECT id, mailing_address, country, city FROM auth_userprofile ORDER BY ID ASC");
?>
<script type="text/javascript">
window.apex_search = {};
apex_search.init = function (){
	this.rows = document.getElementById('data').getElementsByTagName('TR');
	this.rows_length = apex_search.rows.length;
	this.rows_text =  [];
	for (var i=0;i<apex_search.rows_length;i++){
        this.rows_text[i] = (apex_search.rows[i].innerText)?apex_search.rows[i].innerText.toUpperCase():apex_search.rows[i].textContent.toUpperCase();
	}
	this.time = false;
}
apex_search.lsearch = function(){
	this.term = document.getElementById('S').value.toUpperCase();
	for(var i=0,row;row = this.rows[i],row_text = this.rows_text[i];i++){
		row.style.display = ((row_text.indexOf(this.term) != -1) || this.term  === '')?'':'none';
	}
	this.time = false;
}
apex_search.search = function(e){
    var keycode;
    if(window.event){keycode = window.event.keyCode;}
    else if (e){keycode = e.which;}
    else {return false;}
    if(keycode == 13) { apex_search.lsearch(); } else { return false; }
}
</script>
</head>

<body onload="apex_search.init();">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Data</h1>
        </div>
    </div>
</div>

<p>
<div class="row">
<div class="col-lg-4">
    <div class="input-group">
	<input type="text" size="30" class="form-control" maxlength="1000" value="" id="S" onkeyup="apex_search.search(event);" />
	<span class="input-group-btn">
	<input type="button" class="btn btn-default" value="Search" onclick="apex_search.lsearch();"/>
	</span>
	</div>
</div>

<div class="col-lg-4">
</div>
</div>

<br />

<div class="row">
	<div class="col-md-12">
	<p>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>No</center></th>
					<th>Address</th>
					<th>Country</th>
					<th>City</th>
					<th width="15%"><center>Action</center></th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($sql)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['mailing_address']; ?></td>
					<td><?php echo $row['country']; ?></td>
					<td><?php echo $row['city']; ?></td>
					<td align="center">
					<a href="update.php?id=<?php echo $row['id']; ?>">update</a>
					|
					<a href="remove.php?id=<?php echo $row['id']; ?>" onclick ="if (!confirm('Remove?')) return false;">delete</a>
					</td>
				</tr>
			<?php $no++; } ?>
			</tbody>
		</table>
	</p>
	</div>
</div>

</div>
<?php include "plugin/footer.php"; ?>
</body>
</html>
