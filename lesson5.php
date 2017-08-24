<!DOCTYPE html>
<html>
<head>
	<title>PhoneBook</title>
</head>
<body>

<?php
$jsonString = file_get_contents('country.json');
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

[
	{"firstName": "Иван", "lastName": "Иванов", "address": "г.Москва, ул. Алиева,2", "phoneNumber": "812 123-1234"},
	{"firstName": "Максим", "lastName": "Петров", "address": "г.Воронеж, ул. Есенина,7", "phoneNumber": "844 555-1234"},
	{"firstName": "Юрий", "lastName": "Сидоров", "address": "г.Казань, ул. Пушкина,3", "phoneNumber": "833 666-7654"},
	{"firstName": "Bill", "lastName": "Сидоров", "address": "г.Казань, ул. Пушкина,3", "phoneNumber": "833 666-7654"},
	{"firstName": "Jake", "lastName": "Сидоров", "address": "г.Саратов, ул. Пушкина,3", "phoneNumber": "833 666-7654"},
	{"firstName": "Татьяна", "lastName": "Сидоров", "address": "г.Казань, ул. Пушкина,3", "phoneNumber": "833 666-7654"},
	{"firstName": "Михаил", "lastName": "Сидоров", "address": "г.Казань, ул. Пушкина,3", "phoneNumber": "833 666-7654"},
	{"firstName": "Виктор", "lastName": "Сидоров", "address": "г.Казань, ул. Пушкина,3", "phoneNumber": "833 666-7654"}
]
