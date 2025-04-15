<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = htmlspecialchars($_POST["title"]);
  $author = htmlspecialchars($_POST["author"]);
  $price = floatval($_POST["price"]);
  $qty = intval($_POST["quantity"]);

  if ($price <= 0 || $qty < 1 || $qty > 10) {
    echo "Invalid input.";
    exit;
  }

  $total = $price * $qty;

  echo "<h2>Order Confirmation</h2>";
  echo "Book Title: $title<br>";
  echo "Author: $author<br>";
  echo "Price: ₹$price<br>";
  echo "Quantity: $qty<br>";
  echo "<strong>Total Cost: ₹$total</strong><br><br>";
  echo "Thank you for your order!";
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Book Order</title>
  <style>
    body { font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
    form { max-width: 400px; width: 100%; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
    input { width: 100%; margin: 8px 0; padding: 8px; }
    label { display: block; margin-top: 10px; }
    button { padding: 10px; width: 100%; background: teal; color: white; border: none; border-radius: 5px; }
  </style>
</head>
<body>
  <form action="order.php" method="post" onsubmit="return validateOrder()">
    <h2>Book Order Form</h2>
    <label>Book Title: <input type="text" name="title" id="title" required></label>
    <label>Author: <input type="text" name="author" id="author" required></label>
    <label>Price: <input type="number" name="price" id="price" required></label>
    <label>Quantity: <input type="number" name="quantity" id="quantity" required></label>
    <button type="submit">Place Order</button>
  </form>

  <script>
    function validateOrder() {
      const title = document.getElementById("title").value.trim();
      const author = document.getElementById("author").value.trim();
      const price = parseFloat(document.getElementById("price").value);
      const qty = parseInt(document.getElementById("quantity").value);

      if (!title || !author) {
        alert("Title and Author fields cannot be empty.");
        return false;
      }
      if (isNaN(price) || price <= 0) {
        alert("Enter a valid price greater than 0.");
        return false;
      }
      if (isNaN(qty) || qty < 1 || qty > 10) {
        alert("Enter a quantity between 1 and 10.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
