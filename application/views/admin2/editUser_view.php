<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

{user}
<form action="" method="post">
  First name:<br>
  <input type="text" name="first_name" value={firstname}>
  <br>
  Last name:<br>
  <input type="text" name="last_name" value={lastname}>
  <br><br>

	Email:<br><input type="text" name="email" value={email}><br><br>
	Password:<br><input type="password" name="password" value={password}>

  <input type="submit" value="save" onclick="editUser('{id}')">
</form> 
{/user}

</body>
</html>