<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $grades = [$_POST["g1"], $_POST["g2"], $_POST["g3"], $_POST["g4"], $_POST["g5"]];

  $gradePointsMap = ["A"=>4, "B"=>3, "C"=>2, "D"=>1, "F"=>0];
  $totalPoints = 0;
  $totalCredits = 0;

  echo "<h2>GPA Report</h2>";
  echo "Student Name: $name<br><br>";

  for ($i = 0; $i < 5; $i++) {
    $grade = strtoupper($grades[$i]);
    if (!isset($gradePointsMap[$grade])) {
      echo "Invalid grade input.";
      exit;
    }
    $credits = rand(2, 5); // Random credit hours
    $points = $gradePointsMap[$grade] * $credits;

    echo "Course " . ($i + 1) . ": Grade $grade, Credits $credits<br>";
    $totalCredits += $credits;
    $totalPoints += $points;
  }

  $gpa = $totalPoints / $totalCredits;
  echo "<br><strong>Calculated GPA: " . round($gpa, 2) . "</strong>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>GPA Calculator</title>
  <style>
    body { font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
    form { max-width: 400px; width: 100%; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
    input { width: 100%; margin: 8px 0; padding: 8px; text-transform: uppercase; }
    label { display: block; margin-top: 10px; }
    button { padding: 10px; width: 100%; background: teal; color: white; border: none; border-radius: 5px; }
  </style>
</head>
<body>
  <form action="gpa.php" method="post" onsubmit="return validateGrades()">
    <h2>GPA Calculator</h2>
    <label>Student Name: <input type="text" name="name" required></label>
    <label>Course 1 Grade: <input type="text" name="g1" id="g1" required></label>
    <label>Course 2 Grade: <input type="text" name="g2" id="g2" required></label>
    <label>Course 3 Grade: <input type="text" name="g3" id="g3" required></label>
    <label>Course 4 Grade: <input type="text" name="g4" id="g4" required></label>
    <label>Course 5 Grade: <input type="text" name="g5" id="g5" required></label>
    <button type="submit">Calculate GPA</button>
  </form>

  <script>
    function validateGrades() {
      const validGrades = ["A", "B", "C", "D", "F"];
      for (let i = 1; i <= 5; i++) {
        const g = document.getElementById("g" + i).value.toUpperCase();
        if (!validGrades.includes(g)) {
          alert("Grades must be A, B, C, D, or F only");
          return false;
        }
      }
      return true;
    }
  </script>
</body>
</html>
