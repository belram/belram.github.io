<!DOCTYPE html>
<html>
<head>
	<title>PhoneBook</title>
</head>
<body>

<?php
$jsonString = file_get_contents(__DIR__ . '/country.json');
$data = json_decode($jsonString, true);
?>
<table>
<tr>
<td>FirstName</td>
<td>LastName</td>
<td>Address</td>
<td>PhoneNumber</td>
</tr>
<?php foreach ($data as $datum) {?>
<tr>
<td><?php echo $datum['firstName'] ?></td>
<td><?php echo $datum['lastName'] ?></td>
<td><?php echo $datum['address'] ?></td>
<td><?php echo $datum['phoneNumber'] ?></td>
</tr>
<?php } ?>
</table>

</body>
</html>
