<?php
include '../JDBC/config.php';

session_start();
$user_id = $_SESSION['user_id'];

// echo $user_id;

if (!isset($user_id)) {
    header('location:../Login_leg/login.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:../Login_leg/login.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Website</title>
    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="../assets/css/jquery.fancybox.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body class="body-fixed">

    <!--- #PRELOADER-->

    <div class="preload" data-preaload>
        <div class="circle"></div>
        <p class="text">ND - Restaurant</p>
    </div>

    <div id="viewport">
        <div id="js-scroll-content">
            <div class="sec-wp">
                <div class="booking">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <h2 class="h2-title">Các bàn đã đặt</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="../assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $select = mysqli_query($conn, "SELECT * FROM `booking` WHERE id = '$user_id'");
                        if (mysqli_num_rows($select) > 0) {
                            while ($fetch = mysqli_fetch_assoc($select)) {
                        ?>
                                <div class="row d-flex">

                                    <div class="col-lg-5">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="book-user about">
                                                <div class="book-user-text">

                                                    <span>Tên người đặt: </span>
                                                    <input type="text" name="book-name" class="book" checked required value="<?php echo $fetch['name']; ?>">

                                                    <span>Số điện thoại: </span>
                                                    <input type="text" name="book-sdt" class="book" checked required value="<?php echo $fetch['sdt']; ?>">

                                                    <span>Giờ: </span>
                                                    <a href=""><?php echo $fetch['hour']; ?></a>
                                                </div>
                                                <div class="book-user-text">

                                                    <span>Email: </span>
                                                    <input type="email" name="book-email" class="book" required>

                                                    <span>Ngày: </span>
                                                    <input type="date" name="book-date" class="book" required>

                                                    <span>Số người: (từ 1 đến 20)</span>
                                                    <input type="number" name="book-person" value="1" class="book" required min="1" max="20">

                                                </div>
                                            </div>
                                            <div class="book-note">
                                                <textarea name="book-note" id="" cols="30" rows="10"></textarea>
                                                <input type="submit" name="book-table" value="Xóa bàn">
                                            </div>
                                        </form>

                                    </div>
                                </div>
                        <?php
                            };
                        };
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>





















    <!-- jquery  -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>

    <!-- fontawesome  -->
    <script src="../assets/js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="../assets/js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="../assets/js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="../assets/js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="../assets/js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="../assets/js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="../assets/js/ScrollTrigger.min.js"></script>

    <!-- scroll to plugin  -->
    <script src="../assets/js/ScrollToPlugin.min.js"></script>

    <script src="../assets/js/smooth-scroll.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js  -->
    <script src="../JS/script.js"></script>

    <?php include '../JDBC/alert.php'; ?>

</body>

</html>