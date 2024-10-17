<?php
session_start();
include 'connection/db.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $available_copies = $_POST['available_copies'];
    $cover = $_FILES['cover']['name'];
    
    // Define target directory
    $target_dir = __DIR__ . "/assets/panel/img-store/book-images/";

    // Check if the directory exists, if not, create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true); // Create the directory if it doesn't exist
    }

    $target_file = $target_dir . basename($cover);
    $created_at = date('Y-m-d H:i:s');

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['cover']['tmp_name'], $target_file)) {
        // Insert book details into the database
        $sql = "INSERT INTO books (title, author, isbn, available_copies, cover, created_at) 
                VALUES ('$title', '$author', '$isbn', '$available_copies', '$cover', '$created_at')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Book added successfully!'); window.location.href='add-book.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Add Book</h2>
    <form action="add-book.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" class="form-control" name="author" required>
        </div>
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" class="form-control" name="isbn" required>
        </div>
        <div class="form-group">
            <label>Available Copies</label>
            <input type="number" class="form-control" name="available_copies" min="0" required>
        </div>
        <div class="form-group">
            <label>Cover Image</label>
            <input type="file" class="form-control" name="cover" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
</body>
</html>
