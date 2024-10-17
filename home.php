<?php
session_start();
include 'connection/db.php'; // Include your database connection file

// Query to retrieve all books
$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Management System(L.M.S) is simple Library system that is used by librarian for manageing records of books and perform some operations on it.">
    <meta name="keywords" content="LMS,lms,library management system,library software,library management" />
    <title>Library Management System || Make Easy to Manage Records of Books</title>
    <link rel="stylesheet" href="css/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--- google font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body onload="preloader()">

    <header>
        <nav class="navbar">
            <div class="logo">
                <div class="icon">
                    <!-- <i class='bx bx-book-reader'></i> -->
                    <img src="images/lib.png" alt="Library Management System Logo">
                </div>
                <div class="logo-details">
                    <h5>L.M.S</h5>
                </div>
            </div>
            <ul class="nav-list">
                <div class="logo">
                    <div class="title">
                        <div class="icon">
                            <img src="
            lib.png" alt="Library Management System Logo">
                        </div>
                        <div class="logo-header">
                            <h4>L.M.S</h4>
                            <small>Library System</small>
                        </div>
                    </div>
                    <button class="close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <li><a href="">Home</a></li>
                <li><a href="#book">Books</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="logout.php" style="background-color: #6c5dd4; color:white; padding:.5rem;">Logout</a></li>

                <!-- <li><a href="login.php" style="background-color: #6c5dd4; color:white; padding:.5rem;">Login</a></li>
                <li><a href="register.php" style="background-color: #6c5dd4; color:white; padding:.5rem;">Signup</a></li> -->
                <div class="login">

                </div>
            </ul>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </nav>
    </header>

    <section class="home">
        <div class="title">
            <h2>Welcome To <span>Online Library Management System</span></h2>
            <p>Explore and Borrow Books Through Online</p>
            <div class="btns">


                <button><a href="#book">Browse Books</a></button>
            </div>
        </div>
    </section>

    <section class="books-showcase" id="book">
        <div class="title">
            <h4>Our Books</h4>

        </div>
        <div class="books-container">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="book">
                        <div class="img">
                            <img src="assets/panel/img-store/book-images/<?php echo $row['cover'] ?>" alt="Book Cover Image">
                        </div>
                        <div class="book-detail">
                            <h5><?php echo $row['title'] ?></h5>
                            <small><?php echo $row['author'] ?></small>
                            <div class="footer-btn">
                                <button><a href="book-details.php?id=<?php echo $row['id'] ?>">Get Book</a></button>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No books available.</p>";
            }
            ?>

        </div>
    </section>

    <section class="about-us" id="about">
        <div class="main">
            <div class="img">
                <img src="https://i.pinimg.com/originals/a7/4e/56/a74e56ce6107f0367195ea16e60bdd78.png" alt="About Us Image">
            </div>
            <div class="about-content">
                <h4>About Us</h4>
                <p>Library Management System is carefully developed for easy management of any type of library. It’s actually a virtual version of a real library. It?s a web based system where you can manage books of different categories, manage users & manage issue/return of books easily.Issuing a book to a member is just a matter of a click.LMS will be an efficient and intelligent companion for managing your library.</p>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <h3>Contact Us</h3>
        <div class="main">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6310.594819201665!2d-122.42768319999999!3d37.73616639999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e60a337d5f5%3A0xfa0bb626904e5ab2!2z4KSV4KWJ4KSy4KWH4KScIOCkueCkv-Cksiwg4KS44KS-4KSoIOCkq-CljeCksOCkvuCkguCkuOCkv-CkuOCljeCkleCliywg4KSV4KWI4KSy4KWA4KSr4KWL4KSw4KWN4KSo4KS_4KSv4KS-LCDgpK_gpYLgpKjgpL7gpIfgpJ_gpYfgpKEg4KS44KWN4KSf4KWH4KSf4KWN4oCN4KS4!5e0!3m2!1shi!2sin!4v1686917463994!5m2!1shi!2sin" height="70" style="width: 100%; border: none; border-radius: 5px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contact-form">
                <h4>Contact Us</h4>
                <p>Get in touch with us</p>
                <form class="input-form" method="POST" action="">
                    <div class="input-field">
                        <label for="name">Full Name *</label>
                        <input type="text" name="name" id="name" placeholder="Full Name" />

                    </div>
                    <div class="input-field">
                        <label for="email">E-mail *</label>
                        <input type="email" name="email" id="email" placeholder="Email Address" />

                    </div>
                    <div class="input-field">
                        <label for="phone">Phone No. *</label>
                        <input type="text" name="mobile" id="phone" placeholder="Phone Number" />

                    </div>
                    <div class="message">
                        <label for="message">Message *</label>
                        <textarea placeholder="Message" name="message" id="message"></textarea>

                    </div>
                    <input type="submit" name="contact" value="SUBMIT">
                    <!-- <button name="contact">SUBMIT</button> -->
                </form>
            </div>

        </div>
    </section>
    <footer>
        <div class="container">
            <div class="logo-description">
                <div class="logo">
                    <div class="img">
                        <i class='bx bx-book-reader'></i>
                    </div>
                    <div class="title">
                        <h4>L.M.S</h4>
                    </div>
                </div>
                <div class="logo-body">
                    <p>
                        Library Management System is carefully developed for easy management of any type of library. It’s actually a virtual version of a real library.
                    </p>
                </div>
                <div class="social-links">
                    <h4>Follow Us</h4>
                    <ul class="links">
                        <li>
                            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="categories list">
                <h4>Book Categories</h4>
                <ul>
                    <li><a href="#">Computer Science</a></li>
                    <li><a href="#">Programming</a></li>
                    <li><a href="#">Philosophy</a></li>
                    <li><a href="#">Social Science</a></li>
                    <li><a href="#">Fiction</a></li>
                    <li><a href="#">Fantasy</a></li>
                </ul>
            </div>
            <div class="quick-links list">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="assets/webpages/login-type.php">Login</a></li>
                    <li><a href="#book">Find Books</a></li>
                </ul>
            </div>
            <div class="our-store list">
                <h4>Our Library</h4>
                <div class="map" style="margin-top: 1rem">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6310.594819201665!2d-122.42768319999999!3d37.73616639999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e60a337d5f5%3A0xfa0bb626904e5ab2!2z4KSV4KWJ4KSy4KWH4KScIOCkueCkv-Cksiwg4KS44KS-4KSoIOCkq-CljeCksOCkvuCkguCkuOCkv-CkuOCljeCkleCliywg4KSV4KWI4KSy4KWA4KSr4KWL4KSw4KWN4KSo4KS_4KSv4KS-LCDgpK_gpYLgpKjgpL7gpIfgpJ_gpYfgpKEg4KS44KWN4KSf4KWH4KSf4KWN4oCN4KS4!5e0!3m2!1shi!2sin!4v1686917463994!5m2!1shi!2sin" height="70" style="width: 100%; border: none; border-radius: 5px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <ul>
                    <li>
                        <a href=""><i class="fa-solid fa-location-dot"></i>832 Thompson Drive,San
                            Fransisco CA 94 107,United States</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-phone"></i>+12 1345678991</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-envelope"></i>support@bookoe.id</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script>
        let hamburgerbtn = document.querySelector(".hamburger");
        let nav_list = document.querySelector(".nav-list");
        let closebtn = document.querySelector(".close");
        hamburgerbtn.addEventListener("click", () => {
            nav_list.classList.add("active");
        });
        closebtn.addEventListener("click", () => {
            nav_list.classList.remove("active");
        });
    </script>
</body>

</html>