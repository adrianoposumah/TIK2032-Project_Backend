<?php
require 'koneksi.php';

if( isset($_POST["login"]) ) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM `profile` WHERE username ='$username'");

    if( mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if( $password === $row["password"])  {
        header("Location: edit.php");
        exit;
      }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      /* Tambahkan ini ke dalam file style.css Anda atau di dalam tag <style> di kepala dokumen HTML Anda */

body {
  display: row;
  justify-content: center;
  align-items: center;
  /* height: 100vh; */
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #ffebb7;
}

.form-sec {
  margin-top: 100px;
}

.title {
  text-align: center;
  margin-bottom: 20px;
}

.error-msg {
  text-align: center;
}

.login-form {
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin: 0 40%;
}

.login-form ul {
  list-style: none;
  padding: 0;
}

.login-form li {
  margin-bottom: 15px;
}

.login-form label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.login-form input {
  margin-right: 10px;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.login-form button {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.login-form button:hover {
  background-color: #0056b3;
}

    </style>
    <!-- <link rel="stylesheet" href="style.css" /> -->
  </head>
  <body>
    <div class="form-sec">
      <h1 class="title">Login</h1>
      <?php if ( isset($error) ) : ?>
          <p class="error-msg" style="color: red;">Username/Password Salah</p>
        <?php endif; ?>
      <form action="" method="post" class="login-form">
        <ul>
          <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" />
          </li>
          <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" />
          </li>
          <li>
            <button type="submit" name="login">Login</button>
          </li>
        </ul>
      </form>
    </div>
  </body>
</html>
