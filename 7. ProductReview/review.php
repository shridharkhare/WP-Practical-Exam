<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product = htmlspecialchars($_POST["product"]);
  $name = htmlspecialchars($_POST["name"]);
  $email = $_POST["email"];
  $rating = htmlspecialchars($_POST["rating"]);
  $review = htmlspecialchars($_POST["review"]);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
  }

  echo "<h2>Review Submitted</h2>";
  echo "Product: $product<br>";
  echo "Reviewer: $name<br>";
  echo "Email: $email<br>";
  echo "Rating: $rating<br>";
  echo "Review: $review<br><br>";
  echo "Thank you for your feedback!";
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Product Review</title>
  <style>
    body { font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
    form { width: 100%; max-width: 400px; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
    input, select, textarea { width: 100%; margin: 8px 0; padding: 8px; }
    label { margin-top: 10px; display: block; }
    button { width: 100%; padding: 10px; background: #007BFF; color: white; border: none; border-radius: 5px; }
  </style>
</head>
<body>
  <form action="review.php" method="post" onsubmit="return validateReview()">
    <h2>Submit Product Review</h2>
    <label>Product Name: <input type="text" name="product" id="product" required></label>
    <label>Your Name: <input type="text" name="name" id="name" required></label>
    <label>Email: <input type="email" name="email" id="email" required></label>
    <label>Rating:
      <select name="rating" id="rating" required>
        <option value="">Select rating</option>
        <option>1 Star</option>
        <option>2 Stars</option>
        <option>3 Stars</option>
        <option>4 Stars</option>
        <option>5 Stars</option>
      </select>
    </label>
    <label>Review:
      <textarea name="review" id="review" rows="4" required></textarea>
    </label>
    <button type="submit">Submit Review</button>
  </form>

  <script>
    function validateReview() {
      const email = document.getElementById("email").value;
      const rating = document.getElementById("rating").value;
      const review = document.getElementById("review").value.trim();

      if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert("Invalid email format.");
        return false;
      }
      if (!rating) {
        alert("Please select a rating.");
        return false;
      }
      if (!review) {
        alert("Please enter a review.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
