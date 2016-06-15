<html>
<head>
<?php
include "plugin/header.php";
include "plugin/notification.php"
include "config/connect.php";

$sql = mysql_query("SELECT id, mailing_address, country, city FROM auth_userprofile WHERE id = '".$_GET['id']."'");
$data = mysql_fetch_array($sql);
?>
</head>
<body>

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Update</h1>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">

<?php
if(isset($_POST['update']))
{
	mysql_query("UPDATE auth_userprofile SET mailing_address = '".$_POST['mailing_address']."', country = '".$_POST['country']."', city = '".$_POST['city']."' WHERE id = '".$_GET['id']."'");
	writeMsg('update.success');

	$sql = mysql_query("SELECT id, mailing_address, country, city FROM auth_userprofile WHERE id = '".$_GET['id']."'");
	$data = mysql_fetch_array($sql);
}
?>
	<div class="form-group">
  		<label class="control-label" for="mailing_address">Address</label>
  		<input type="text" class="form-control" name="mailing_address" id="mailing_address" value="<?php echo $data['mailing_address']; ?>" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="country">Country</label>
  		<input type="text" class="form-control" name="country" id="country" value="<?php echo $data['country']; ?>" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="city">City</label>
  		<input type="text" class="form-control" name="city" id="city" value="<?php echo $data['city']; ?>">
	</div>

	<div class="form-group">
	<input type="submit" value="Update" name="update" class="btn btn-primary">
	<a href="#" class="btn btn-danger">Batal</a>
	</div>

	</form>
	</div>
</div>

</div>
<?php include "plugin/footer.php"; ?>
</body>
</html>
