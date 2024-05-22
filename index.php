<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Isian Rencana Studi</title>
</head>
<body class="bg-info-subtle text-info-emphasis">
    <header>
        <div class="p-3 mb-2 bg-info text-dark text-center">
            <h1>Isian Rencana Studi</h1>
        </div>
    </header>
    <div class="main my-5">
        <form class="form" method="post" action="">
            <div class="card card-body mx-auto shadow" style="max-width: 20rem">
                <div class="container justify-content-evenly mx-auto">
                    
                    <?php
                    include("userService.php");
                    
                    $_SESSION['email'] = $_POST['email'] ?? null;
                    $_SESSION['password'] = $_POST['password'] ?? null;

                    $user = new userService($_SESSION['email'], $_SESSION['password']);
                    if(isset($_POST['submit'])){
                        if($get_user = $user->login()) {  
                            $_SESSION['login'] = true;
                            header("Location: program.php");
                            exit;
                        } else {
                        ?>
                        <div class="alert alert-primary">
                            Maaf, email atau kata sandi Anda salah. Harap periksa kembali.
                        </div>
                        <a href="index.php"><button class='btn btn-info' type="button">Kembali</button></a>

                        <?php 
                        }
                    } else {  
                    ?>
                
                    <div class="row">
                        <h3 class="col text-center mb-4">Selamat Datang!</h3>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" placeholder="Email Anda" name="email" autocomplete="off" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" placeholder="Password Anda" name="password" autocomplete="off" required>
                    </div>
                    <center>
                        <button class="btn btn-info" type="submit" name="submit" value="1">Masuk</button>
                    </center>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>