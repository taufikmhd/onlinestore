<?php 
    require 'koneksi.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';

            // Menghindari SQL Injection dengan menggunakan prepared statement
            $stmt = $conn->prepare("SELECT * FROM list_user WHERE Email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $storedPassword = $row['Password'];
echo ($storedPassword);
                // Verifikasi password
                if (password_verify($password, $storedPassword)) {
                    // Login berhasil
                    header("Location: dashboard.php");
                    exit;
                }
            }

            // Login gagal
            echo "<p>Login failed. Please try again.</p>";
        }

        $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Halaman Login</title>
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
    <h2 class="text-center">Login</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
