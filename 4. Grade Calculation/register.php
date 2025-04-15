<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $scores = [$_POST["s1"], $_POST["s2"], $_POST["s3"], $_POST["s4"], $_POST["s5"]];

  $allValid = array_reduce($scores, function($valid, $s) {
    return $valid && is_numeric($s) && $s >= 0 && $s <= 100;
  }, true);

  if (!$allValid) {
    echo "Invalid score input.";
    exit;
  }

  $avg = array_sum($scores) / count($scores);

  if ($avg >= 90) $grade = "A";
  elseif ($avg >= 80) $grade = "B";
  elseif ($avg >= 70) $grade = "C";
  elseif ($avg >= 60) $grade = "D";
  else $grade = "F";

  echo "<h2>Grade Report</h2>";
  echo "Name: $name<br>";
  for ($i = 0; $i < 5; $i++) {
    echo "Subject " . ($i+1) . ": " . $scores[$i] . "<br>";
  }
  echo "Average: $avg<br>";
  echo "<strong>Final Grade: $grade</strong>";
}
?>



<!DOCTYPE html>
<html>
<head>
  <title>Grade Calculator</title>
  <style>
    body { font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
    form { max-width: 400px; width: 100%; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
    input { width: 100%; margin: 8px 0; padding: 8px; }
    label { display: block; margin-top: 10px; }
    button { padding: 10px; width: 100%; background: teal; color: white; border: none; border-radius: 5px; }
  </style>
</head>
<body>
  <form action="calculate.php" method="post" onsubmit="return validateScores()">
    <h2>Grade Calculator</h2>
    <label>Student Name: <input type="text" name="name" required></label>
    <label>Subject 1 Score: <input type="number" name="s1" id="s1" required></label>
    <label>Subject 2 Score: <input type="number" name="s2" id="s2" required></label>
    <label>Subject 3 Score: <input type="number" name="s3" id="s3" required></label>
    <label>Subject 4 Score: <input type="number" name="s4" id="s4" required></label>
    <label>Subject 5 Score: <input type="number" name="s5" id="s5" required></label>
    <button type="submit">Calculate Grade</button>
  </form>

  <script>
    function validateScores() {
      for (let i = 1; i <= 5; i++) {
        let score = document.getElementById("s" + i).value;
        if (score === "" || isNaN(score) || score < 0 || score > 100) {
          alert("Scores must be numbers between 0 and 100");
          return false;
        }
      }
      return true;
    }
  </script>
</body>
</html>
