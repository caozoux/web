<html>
<head><title>temperatite Conversion</title></head>
<?php $fahr=$_GET['fahrenheit'];  ?>
<?php echo $_SERVER['PHP_SELF'],$_GET['fahrenheit'];   ?>

<form action="temperatire.php" method="POST"> Fahrenheit temperature; 
<input type="text" name="fahrenheit" value="<?php echo $fahr  ?>"></input>
<br/>
<input type="submit" name="Conver tc"></input>
<?php 
	if (!is_null($fahr)) {
		printf("asfa");
		echo asf;
	}
	echo $fahr;
?>

</form>
</html>
