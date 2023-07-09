<?php 
require 'koneksi.php';
// Menyimpan data dari form ke database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"]?? '';
    $email = $_POST["email"]?? '';
    $no_wa = $_POST['no_wa'] ?? '';
    $password = $_POST["password"]?? '';
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Check if the email is already registered
    $emailExists = false;
    $checkEmailQuery = "SELECT COUNT(*) AS count FROM list_user WHERE Email = '$email'";
    $result = $conn->query($checkEmailQuery);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['count'] > 0) {
            $emailExists = true;
        }
    }

    if ($emailExists) {
        echo '<p class="text-center form-group bg-danger">Email sudah terdaftar.</p>';
        } else {
         $sql = "INSERT INTO list_user (Nama, Email, No_WA, Password) VALUES ('$nama', '$email','$no_wa' ,'$hashedPassword')";
                if ($conn->query($sql) === TRUE) {
                    $message="Selamat Anda Telah Berhasil Mendaftar di AyunaStore!!";
                    echo "<script>alert('$message');</script>";                   
                    header("Location: login.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

            
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Form Registrasi</title>
  <style>
    .container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 50px;
    }
  </style>

</head>
<body>
  <div class="container">
    <h2 class="text-center">Form Pendaftaran <br> Ayuna Store</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email">
      </div>
      <div class="form-group">
        <label for="no_wa">Nomor Whatsapp:</label>
        <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="Masukkan No WA">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
      </div>
      <div class="form-group">
        <label for="confirm-password">Konfirmasi Password:</label>
        <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Masukkan ulang password" onkeyup="checkPassword()">
      </div>
      <p id="password-message"></p>
      <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var password1Input = document.getElementById("password");
    var password2Input = document.getElementById("confirm-password");
    var passwordMessage = document.getElementById("password-message");

    function checkPasswordMatch() {
      var password1 = password1Input.value;
      var password2 = password2Input.value;

      if (password1 === password2) {
        passwordMessage.innerHTML = "Password Sesuai";
        passwordMessage.classList.remove("bg-danger")
        passwordMessage.classList.add("bg-success");
         } else {
        passwordMessage.innerHTML = "Password Tidak Sesuai";
        passwordMessage.classList.add("bg-danger","form-control");
        
      }
    }

    password1Input.addEventListener("input", checkPasswordMatch);
    password2Input.addEventListener("input", checkPasswordMatch);
</script>
</body>
</html>
