<!DOCTYPE html>
<html>
<head>
  <title>Airline Login</title>
  <link rel="stylesheet" href="login_style.css"> 
</head>
<body>
  <div class="container"> 
    <h1>Welcome to the Airline Login Page!</h1>
    <form action="login.php" method="post">
      <select id="loginType" name="loginType">
        <option value="customer">Customer</option>
        <option value="employee">Employee</option>
      </select><br>
      <label for="id">Account ID:</label>
      <input type="text" name="id" id="id"><br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password"><br>
      <input type="submit" value="Submit"> 
    </form>
  </div> 
</body>
</html>
