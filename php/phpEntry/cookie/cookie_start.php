<html>
<head><title>cookie select</title></head>
<?php  

	$color = array('black' => '#000000',
                    "whrite" 	=> '#ffffffff',
				    "red" 		=> '#ff0000',
				    "blue"      => '#0000ff',
				    );
	$bg_name=$_POST['background'];
    $fg_name=$_POST['foreground'];
	setcookie('bg', $color[$bg_name]);
	setcookie('fg', $color[$fg_name]);
?>
<body>
you have select a color <?php echo $bg_name,$fg_name; ?>
Click <a href="cookie_excute.php">there</a> to see the coolie excute
</body>
</html>
