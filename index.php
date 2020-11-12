<?php 
header ("Content-Type: text/html; charset=utf-8");
$user = isset($_COOKIE["user"]) ? $_COOKIE["user"] : ''; 
$password = isset($_COOKIE["passw"]) ? $_COOKIE["passw"] : '';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>

</head>
<body>
<?php echo $a; ?>
<h2>HTML </h2>

<form method="post" action="reqest.php">
  Login:<br>
  <input type="text" name="username" value="<? echo $user ?>">
  <br>
  Password:<br>
  <input type="text" name="password" value="<?echo $password ?>">
  <br><br>
  <input type="submit" value="Submit">
</form>


</body>
</html>

