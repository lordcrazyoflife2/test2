<!DOCTYPE html>
<html>
<head>
	<title>File Contents</title>
	<style>
		.toggle-switch {
			display: inline-block;
			height: 20px;
			width: 40px;
			background-color: gray;
			border-radius: 10px;
			position: relative;
			margin-left: 10px;
		}

		.toggle-switch::after {
			content: "";
			display: inline-block;
			height: 18px;
			width: 18px;
			border-radius: 50%;
			background-color: white;
			position: absolute;
			top: 1px;
			left: 1px;
			transition: all 0.3s;
		}

		input[type=checkbox]:checked + .toggle-switch::after {
			left: 21px;
		}
	</style>
</head>
<body>
	<p>File contents:</p>
	<span id="file-contents"><?php echo file_get_contents('file'); ?></span>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="toggle-switch" class="toggle-switch"></label>
		<input type="checkbox" id="toggle-switch" name="toggle" style="display: none;" <?php if (file_get_contents('file') == '1') {echo 'checked';} ?>>
		<input type="submit" value="Update">
	</form>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['toggle'])) {
		$fileContents = ($_POST['toggle'] == 'on') ? '1' : '0';
		file_put_contents('file', $fileContents);
		echo '<p>File updated</p>';
	}
	?>
</body>
</html>
