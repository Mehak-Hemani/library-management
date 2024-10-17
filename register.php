<?php
// Include database connection
include 'connection/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    mysqli_query($conn, $query);
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <section class="login" style="margin:auto; width:30%;" >
        <div class="container">
            <form action="register.php" method="POST" class="login-form">
                <h4 style="font-weight: 600;">User Registration</h4>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #6c5dd4; border:none;">Register</button>
            </form>
        </div>
    </section>
</body>

</html>