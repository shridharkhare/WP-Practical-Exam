

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $availability = isset($_POST["availability"]) ? implode(", ", $_POST["availability"]) : "None";
  $interest = $_POST["interest"];
  $comments = $_POST["comments"];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
  }

  echo "<h2>Thank you for registering, $name!</h2>";
  echo "Email: $email<br>";
  echo "Phone: $phone<br>";
  echo "Availability: $availability<br>";
  echo "Area of Interest: $interest<br>";
  echo "Additional Comments: " . nl2br(htmlspecialchars($comments));
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Volunteer Registration</title>
  <style>
    body { font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
    form { max-width: 400px; width: 100%; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
    input, select, textarea { width: 100%; margin: 8px 0; padding: 8px; }
    label { display: block; margin-top: 10px; }
    .checkboxes label { display: inline-block; margin-right: 10px; }
    button { padding: 10px; width: 100%; background: teal; color: white; border: none; border-radius: 5px; }
  </style>
</head>
<body>
  <form action="register.php" method="post" onsubmit="return validateForm()">
    <h2>Volunteer Registration</h2>
    <label>Full Name: <input type="text" name="name" required></label>
    <label>Email: <input type="email" name="email" id="email" required></label>
    <label>Phone Number: <input type="text" name="phone" required></label>
    
    <label>Availability:</label>
    <div class="checkboxes">
      <label><input type="checkbox" name="availability[]" value="Morning"> Morning</label>
      <label><input type="checkbox" name="availability[]" value="Afternoon"> Afternoon</label>
      <label><input type="checkbox" name="availability[]" value="Evening"> Evening</label>
      <label><input type="checkbox" name="availability[]" value="Weekend"> Weekend</label>
    </div>

    <label>Area of Interest:
      <select name="interest" required>
        <option value="">Select an option</option>
        <option value="Event Setup">Event Setup</option>
        <option value="Registration">Registration</option>
        <option value="Clean-up">Clean-up</option>
        <option value="First Aid">First Aid</option>
      </select>
    </label>

    <label>Additional Comments:
      <textarea name="comments"></textarea>
    </label>

    <button type="submit">Submit</button>
  </form>

  <script>
    function validateForm() {
      const email = document.getElementById("email").value;
      const checkboxes = document.querySelectorAll('input[name="availability[]"]:checked');
      
      if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert("Invalid email format");
        return false;
      }
      if (checkboxes.length === 0) {
        alert("Please select at least one availability option");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
