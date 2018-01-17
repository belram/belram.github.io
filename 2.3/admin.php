<?php
if(isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])){
	 	if($_FILES['myfile']['error'] == UPLOAD_ERR_OK &&
	 		move_uploaded_file($_FILES['myfile']['tmp_name'], "tests/" . $_FILES['myfile']['name']))
	 	{
	 		header('Location: list.php');		
	 	}
	 	else {
	 		echo 'Ошибка: повторите попытку';
	 	}
}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
 </head>
 <body>
 	<style>
 		body{
 			margin:0;
    		padding:0;
 			display: inline-block;
 			background-color: #6c7279;
 		}
 		div{
 		min-width:400px; 
	    min-height:200px;
	    margin:0 auto;
	    overflow:visible;
	    position:absolute;
	    left:50%;
	    top:50%;
	    margin-left:-200px;
	    margin-top:-100px;
	    background:#ffffff;
	    text-align: center;
	    vertical-align: middle;
 		}
 		form{
 			padding-top: 70px;
 		}
 		.dispatch{
 			margin-top: 20px;
 		}
 		a{
 			display: inline-block;
 			margin-top: 20px;
 		}
 		a:hover{
 			color: #7bef09;
 		}
 		p{
 			color: red;
 		}

 	</style>

<div> 
	<form method="post" action="admin.php" enctype="multipart/form-data">
		<input class="choice" type="file" name="myfile" value="a1"><br>
		<input class="reset" type="reset" value="Отмена">
		<input class="dispatch" type="submit" value="Отправить">
	 </form>
	 <a href="list.php">Список тестов</a>
</div>

</body>
</html>
