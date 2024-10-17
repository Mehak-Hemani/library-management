<?php
include '../../../webpages/db-connect.php';
error_reporting(0);
session_start();
if (!isset($_SESSION['lib-name'])) {
  header("location: ../../../webpages/librarian-login.php");
}

$id = $_GET['id'];
$previewquery = "SELECT * FROM student WHERE id='$id'";
$pquery = mysqli_query($con, $previewquery);
$row = mysqli_fetch_assoc($pquery);
if (isset($_POST['update-student'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $course = mysqli_real_escape_string($con, $_POST['course']);
  $year = mysqli_real_escape_string($con, $_POST['year']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $city = mysqli_real_escape_string($con, $_POST['city']);
  $state = mysqli_real_escape_string($con, $_POST['state']);
  $zipcode = mysqli_real_escape_string($con, $_POST['zipcode']);
  $role = mysqli_real_escape_string($con, $_POST['role']);
  $idcard = mysqli_real_escape_string($con, $_POST['idcard']);
  $dob = mysqli_real_escape_string($con, $_POST['dob']);
  $imgname = $_FILES["profileimg"]["name"];
  $tempname = $_FILES["profileimg"]["tmp_name"];
  $folder = "../../img-store/student-profile-images/" . $imgname;
  move_uploaded_file($tempname, $folder);
  if ($name == "") {
    $error['name'] = "Name should not be empty";
  } else if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
    $error['name'] = "Only alphabets are allowed";
  }
  if ($email == "") {
    $error['email'] = "Please Enter Email Address";
  } else if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
    $error['email'] = "Please Enter Valid Email Address";
  }
  
  if ($mobile == "") {
    $error['mobile'] = "Please Enter Mobile Number";
  } else if (!preg_match("/^[0-9]{10}+$/", $mobile)) {
    $error['mobile'] = "Please Enter Valid Mobile Number";
  }
  if ($address == "") {
    $error['address'] = "Address should not be empty";
  } else if (!preg_match("/^[a-zA-Z0-9.,\s]*$/", $address)) {
    $error['address'] = "Only alphabets are allowed";
  }
  if ($city == "") {
    $error['city'] = "City should not be empty";
  } else if (!preg_match("/^[a-zA-Z0-9\s]*$/", $city)) {
    $error['city'] = "Only alphabets are allowed";
  }
  if ($zipcode == "") {
    $error['zipcode'] = "Please Enter Zipcode";
  } else if (!preg_match("/^[0-9]{6}+$/", $zipcode)) {
    $error['zipcode'] = "Please Enter Valid Zipcode";
  } else {
    if (!isset($error)) {
      $query ="UPDATE student SET name='$name',email='$email',course='$course',year='$year',mobile='$mobile',address='$address',city='$city',state='$state',zipcode='$zipcode',role='$role',std_img='$imgname',id_card='$idcard',dob='$dob' WHERE id = '$id'";
      $result = mysqli_query($con, $query);
      if ($result) {
        $error['std-msg'] = "student Details have been updated successfully";
?>
        <script>
          setTimeout(() => {
            document.querySelector(".error").style.display = "none";
          }, 2000);
        </script>
      <?php
      } else {
        $error['std-msg'] = "Your student details Has not been updated. Please Update Again";
      ?>
        <script>
          setTimeout(() => {
            document.querySelector(".error").style.display = "none";
          }, 2000);
        </script>
<?php
      }
    }
  }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Library Management System || Update Student Details</title>
  <link rel="stylesheet" href="../../css/main.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <!--- google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Fontawesome Link for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body onload="preloader()">
  <?php include 'sidebar.php'; ?>
  <section class="home-section">
    <div class="home-content">
      <i class="fa-solid fa-bars"></i>
      <div class="logout">
        <button><a href="logout.php">Log Out</a></button>
      </div>
    </div>
    <?php
    if (isset($error['std-msg'])) {
    ?>
      <p class="error">
        <?php echo $error['std-msg']; ?>
      </p>
    <?php
    }
    ?>
    <div class="control-panel">
      <h4>Add Student</h4>
      <div class="container" style="margin-top: 1rem;">
        <div class="book-cover-img">
          <img src="../../img-store/student-profile-images/<?php echo $row['std_img']; ?>" alt="Student Profile Image" id="img-preview" />
        </div>
        <div class="update-student-form data-form">
          <h4>Student Details</h4>
          <form class="input-form" method="POST" enctype="multipart/form-data">
            <div class="input-field">
              <label for="name">Student Name *</label>
              <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="Enter Student Name" />
              <?php
                if (isset($error['name'])) {
                ?>
                  <p class="error-msg">
                    <?php echo $error['name']; ?>
                  </p>
                <?php
                }
                ?>
            </div>
            <div class="input-1">
              <label for="email">Email *</label>
              <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="Enter E-mail Address" />
              <?php
                if (isset($error['email'])) {
                ?>
                  <p class="error-msg">
                    <?php echo $error['email']; ?>
                  </p>
                <?php
                }
                ?>
            </div>

            <div class="input-field input-group">
              <div class="input-2">
                <label for="mobile">Mobile No. *</label>
                <input type="text" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Enter mobile no." />
              </div>
            </div>
            
            <input type="submit" value="Update" name="update-student">
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>
    let imgpreview = document.querySelector(".book-cover-img #img-preview");
    let fileinput = document.getElementById("img");

    fileinput.onchange = () => {
      let reader = new FileReader();
      reader.readAsDataURL(fileinput.files[0]);
      reader.onload = () => {
        let fileURL = reader.result;
        imgpreview.src = fileURL;
        // let imgTag = `<img src="${fileURL}" alt="image">`;
        // dropArea.innerHTML = imgTag;
      }
    }
  </script>

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <script src="../../js/main.js"></script>
</body>

</html>