<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product = htmlspecialchars($_POST["product"]);
  $current = intval($_POST["current"]);
  $new = intval($_POST["new"]);
  $supplier = htmlspecialchars($_POST["supplier"]);
  $cost = floatval($_POST["cost"]);

  $updated = $current + $new;
  $totalCost = $new * $cost;

  echo "<h2>Inventory Updated</h2>";
  echo "Product: $product<br>";
  echo "Supplier: $supplier<br>";
  echo "Current Stock: $current<br>";
  echo "New Stock Added: $new<br>";
  echo "Updated Stock Level: $updated<br>";
  echo "Cost Per Unit: ₹" . number_format($cost, 2) . "<br>";
  echo "Total Cost of New Stock: ₹" . number_format($totalCost, 2) . "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inventory Tracker</title>
  <style>
    body { font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
    form { width: 100%; max-width: 400px; border: 1px solid #ccc; padding: 20px; border-radius: 10px; }
    input { width: 100%; margin: 8px 0; padding: 8px; }
    button { width: 100%; padding: 10px; background: green; color: white; border: none; border-radius: 5px; }
    label { margin-top: 10px; display: block; }
  </style>
</head>
<body>
  <form action="inventory.php" method="post" onsubmit="return validateInventory()">
    <h2>Update Inventory</h2>
    <label>Product Name: <input type="text" name="product" id="product" required></label>
    <label>Quantity In Stock: <input type="number" name="current" id="current" required></label>
    <label>New Stock Quantity: <input type="number" name="new" id="new" required></label>
    <label>Supplier: <input type="text" name="supplier" id="supplier" required></label>
    <label>Cost Per Unit: <input type="number" step="0.01" name="cost" id="cost" required></label>
    <button type="submit">Update Inventory</button>
  </form>


<script>
    function validateInventory() {
      const fields = ["product", "current", "new", "supplier", "cost"];
      for (let id of fields) {
        const val = document.getElementById(id).value;
        if (!val) {
          alert("Please fill all fields.");
          return false;
        }
      }
      const current = parseInt(document.getElementById("current").value);
      const newStock = parseInt(document.getElementById("new").value);
      const cost = parseFloat(document.getElementById("cost").value);

      if (current < 0 || newStock <= 0 || cost <= 0) {
        alert("Stock and cost must be positive values.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
