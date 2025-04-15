<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $gender = $_POST["gender"];
  $dob = $_POST["dob"];
  $address = $_POST["address"];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
  }
  echo "<h2>Registration Successful</h2>";
  echo "Username: $username<br>Email: $email<br>Mobile: $mobile<br>Gender: $gender<br>DOB: $dob<br>Address: $address";
}
?> -->

<?php

// HTML form for registration

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $gender = $_POST["gender"];
  $dob = $_POST["dob"];
  $address = $_POST["address"];
  $error = "";

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error .= "Invalid email format<br>";
  }

  echo "<h2>Registration Successful</h2>";
  echo "Username: $username<br>Email: $email<br>Mobile: $mobile<br>Gender: $gender<br>DOB: $dob<br>Address: $address";






}

?>