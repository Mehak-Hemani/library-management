<?php
session_start();
include 'connection/db.php';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM books WHERE id='$book_id'");
    $book = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($book['title']); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .book-cover {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .book-details {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="book-details text-center">
            <h2 class="mb-4"><?php echo htmlspecialchars($book['title']); ?></h2>
            <img src="assets/panel/img-store/book-images/<?php echo htmlspecialchars($book['cover']); ?>" alt="Book Cover" class="book-cover mb-3">
            <p class="lead">Author: <strong><?php echo htmlspecialchars($book['author']); ?></strong></p>
            <p>
                <a href="request-book.php?id=<?php echo htmlspecialchars($book['id']); ?>" class="btn btn-primary btn-lg">Request Book</a>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
