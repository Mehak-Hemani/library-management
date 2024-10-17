<?php
session_start();
include 'connection/db.php';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Check if the book is available
    $result = mysqli_query($conn, "SELECT available_copies FROM books WHERE id='$book_id'");
    $book = mysqli_fetch_assoc($result);

    if ($book['available_copies'] > 0) {
        // Update available copies
        $new_copies = $book['available_copies'] - 1;
        mysqli_query($conn, "UPDATE books SET available_copies='$new_copies' WHERE id='$book_id'");

        // Here you can add a record to a requests table if you have one
        // For example: INSERT INTO requests (user_id, book_id, request_date) VALUES ('$user_id', '$book_id', NOW());

        echo "<script>alert('Book requested successfully!'); window.location.href='home.php';</script>";
    } else {
        echo "<script>alert('No copies available for this book.'); window.location.href='home.php';</script>";
    }
} else {
    // Redirect to user dashboard if no book ID is provided
    header('Location: home.php');
    exit;
}
