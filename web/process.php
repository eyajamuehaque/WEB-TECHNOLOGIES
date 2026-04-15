<?php


$database = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if (empty($_POST['username']) || empty($_POST['gender']) || empty($_POST['address']) || 
        empty($_POST['division']) || empty($_POST['country']) || empty($_POST['dob'])) {
        $errors[] = "All fields must be filled.";
    }

    if ($_POST['country'] !== "Bangladesh") {
        $errors[] = "Only Bangladeshi citizens are allowed to register.";
    }

    $dob = $_POST['dob'];
    if (!empty($dob)) {
        $birthDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;

        if ($age < 5) {
            $errors[] = "You must be at least 5 years old to take the vaccine.";
        }
    }

    if (!empty($errors)) {
        echo "<h3>Errors Found:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li style='color:red;'>$error</li>";
        }
        echo "</ul><a href='register.html'>Go Back</a>";
    } else {

        $entry = [
            "name" => $_POST['username'],
            "gender" => $_POST['gender'],
            "address" => $_POST['address'],
            "division" => $_POST['division'],
            "country" => $_POST['country'],
            "dob" => $_POST['dob']
        ];

  
        $database[] = $entry;

        echo "<h2 style='color:green;'>You are eligible for vaccination</h2>";
        echo "<h4>Your Submitted Details:</h4>";
        echo "Name: " . $entry['name'] . "<br>";
        echo "Gender: " . $entry['gender'] . "<br>";
        echo "Address: " . $entry['address'] . "<br>";
        echo "Age: " . $age . "<br>";

        echo "<br><a href='admin.php'>Go to Admin Panel</a>";
    }
}
?>