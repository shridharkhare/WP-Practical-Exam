<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $company = $_POST["company"];
  $title = $_POST["title"];
  $phone = $_POST["phone"];
  $date = $_POST["date"];
  $attendees = $_POST["attendees"];
  $requests = $_POST["requests"];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
  }

  echo "<h2>Registration Confirmed</h2>";
  echo "Name: $name<br>Email: $email<br>Company: $company<br>Title: $title<br>";
  echo "Phone: $phone<br>Date: $date<br>Attendees: $attendees<br>";
  echo "Special Requests: " . nl2br(htmlspecialchars($requests));
}
?>

<html>
    <head>
        <title>Workshop Registration</title>
        <style>
            body {
                font-family: sans-serif;
                display: flex;
                justify-content: center;
                padding: 20px;
            }
            form {
                max-width: 400px;
                width: 100%;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
            }
            input,
            textarea {
                width: 100%;
                margin: 8px 0;
                padding: 8px;
            }
            label {
                display: block;
                margin-top: 10px;
            }
            button {
                padding: 10px;
                width: 100%;
                background: teal;
                color: white;
                border: none;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <form
            action="register.php"
            method="post"
            onsubmit="return validateForm()"
        >
            <h2>Workshop Registration</h2>
            <label>Full Name: <input type="text" name="name" required /></label>
            <label
                >Email: <input type="email" name="email" id="email" required
            /></label>
            <label
                >Company Name: <input type="text" name="company" required
            /></label>
            <label
                >Job Title: <input type="text" name="title" required
            /></label>
            <label
                >Phone Number: <input type="text" name="phone" required
            /></label>
            <label
                >Workshop Date:
                <input type="date" name="date" id="date" required
            /></label>
            <label
                >Number of Attendees:
                <input type="number" name="attendees" min="1" required
            /></label>
            <label
                >Special Requests: <textarea name="requests"></textarea>
            </label>
            <button type="submit">Submit</button>
        </form>

        <script>
            function validateForm() {
                const email = document.getElementById("email").value;
                const date = new Date(document.getElementById("date").value);
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (!/^\S+@\S+\.\S+$/.test(email)) {
                    alert("Invalid email format");
                    return false;
                }
                if (date < today) {
                    alert("Workshop date cannot be in the past");
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>
