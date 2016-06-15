<html>
<head>
<?php
include "plugin/header.php";
include "plugin/notification.php";
include "config/dbconnect.php";

$sql = mysql_query("SELECT id, mailing_address, country, city FROM auth_userprofile ORDER BY ID ASC");
?>
</head>

<body onload="">
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
