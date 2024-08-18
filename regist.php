<?php

include "conn.php";





if(isset($_POST['regist'])){

    $username = strtolower(stripcslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
        if($password === $password2){
            $cekUser = mysqli_query($conn, "SELECT username from user WHERE username = '$username'");
        if(mysqli_fetch_assoc($cekUser)){
            echo "
            <script>
            alert('Username sudah terdaftar')
            window.location.href = 'regist.php';
            </script>
            ";
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";  
        $hasil = mysqli_query($conn, $query);

            if($hasil){
                echo "
                <script>
                alert('Registrasi Berhasil')
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Registrasi Gagal')
                </script>
                ";
            }
        }
        else{
            echo "
            <script>
            alert('Password yang dimasukkan berbeda')
            </script>
        ";
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
                    <h1 class="text-2xl font-semibold text-center mb-4">Form Registrasi</h1>
                    <label for="username" class="block m-2">Username</label>
                    <input type="text" name="username" class="rounded-sm border-0 bg-transparent border-b-2 border-indigo-600 focus:outline-none focus:ring-0  w-full">
                    <label for="password" class="block m-2">Password</label>
                    <input type="password" name="password" class="rounded-sm border-0 bg-transparent border-b-2 border-indigo-600 focus:outline-none focus:ring-0  w-full">
                    <label for="password2" class="block m-2">Konfirmasi Password</label>
                    <input type="password" name="password2" class="rounded-sm border-0 bg-transparent border-b-2 border-indigo-600 focus:outline-none focus:ring-0  w-full">
                    <div class="flex justify-end p-5">
                        <button type="submit" name="regist" class="bg-indigo-600 h-10 w-16 rounded-md ">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     

</body>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</html>