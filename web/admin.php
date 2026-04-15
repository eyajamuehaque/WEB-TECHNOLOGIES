<?php

$allUsers = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['users'])) {
    $allUsers = unserialize($_POST['users']);
}

$total = count($allUsers);
$males = 0;
$females = 0;

foreach ($allUsers as $user) {
    if ($user['gender'] === "Male") $males++;
    if ($user['gender'] === "Female") $females++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Statistics</h2>
    <p><strong>Total Submissions:</strong> <?php echo $total; ?></p>
    <p><strong>Male Users:</strong> <?php echo $males; ?></p>
    <p><strong>Female Users:</strong> <?php echo $females; ?></p>

    <br>
    <a href="register.html">Back to Form</a>
</body>
</html>