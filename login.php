<?php
session_start();
if(isset($_SESSION['login'])){
    header("Location:index.php");
    exit;
}
include "conn.php";
$error = false;
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // cek username
    if(mysqli_num_rows($result) === 1){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            // add session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username; 
            session_regenerate_id();
            header("Location:index.php");
            exit;
        }else{
            $error = true;
        }
    }
    else{
        $error = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkulu Tanpa Sampah</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('assets/bg.jpg')] bg-center bg-cover bg-no-repeat h-screen">

    <!-- Promotion -->
    <div class="bg-indigo-600 px-4 py-3 text-white">
        <p class="text-center text-sm font-medium">
          Ads 🎉
          <a href="#" class="inline-block underline">Your Advertisement Here !</a>
        </p>
    </div>
    <!-- End Promotion -->

    <!-- Form -->

    <div class="flex justify-center items-center mt-52">
        <div class="bg-white/20 backdrop-blur-2xl lg:w-1/4 md:w-80 sm:w-96 h-auto rounded-lg text-white">
            <div class="p-8">
                <form action="" method="post">
                    <h1 class="text-2xl font-semibold text-center mb-4">Login</h1>
                    <label for="username" class="block m-2">Username</label>
                    <input type="text" name="username" class="rounded-sm border-0 bg-transparent border-b-2 border-indigo-600 focus:outline-none focus:ring-0  w-full">
                    <label for="password" class="block m-2">Password</label>
                    <input type="password" name="password" class="rounded-sm border-0 bg-transparent border-b-2 border-indigo-600 focus:outline-none focus:ring-0  w-full">
                    <div class="flex justify-end p-5 items-center gap-3">
                        <a href="regist.php" class="text-indigo-600 underline">Sign up here</a>
                        <button type="submit" name="login" class="bg-indigo-600 h-10 w-16 rounded-md ">Login</button>
                    </div>
                    <div>
                        <?php
                        if($error == true){

                        ?>
                        <p class="text-red-600 text-center">Username atau Password salah</p>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
     

</body>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</html>