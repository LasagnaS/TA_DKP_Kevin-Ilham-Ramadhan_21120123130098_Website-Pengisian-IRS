<?php
session_start();
include('userService.php');

if(!isset($_SESSION['login'])){
    header("Location: index.php");
}

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
    <div class="container text-center">
        <h2 class="py-3">Selamat! IRS anda telah tersimpan</h2>
        <table class="table shadow">
            <?php
                echo "<thead><tr>";
                    foreach($data[5] as $day){
                        echo "<th scope='col'>$day</th>";
                    }
                echo "</tr></thead>";
                echo "<tbody>";
                    echo "<tr>";
                        for($i = 0; $i <= 4; $i++){
                            echo "<td style='width: 20%'>";
                                for($j = 0; $j <= 4; $j++){
                                    if (isset($_SESSION["$i-$j-matkul"]) && isset($_SESSION["$i-$j-kelas"]) && isset($_SESSION["$i-$j-jam"]) && isset($_SESSION["$i-$j-sks"]) && isset($_SESSION["$i-$j-ruang"])){
                                        echo "<div class='btn-secondary my-1'>";
                                            echo "<label class='btn btn-secondary my-1' for='btn-check-$i-$j'>";
                                            echo "<p class='m-0 p-0'>{$_SESSION["$i-$j-matkul"]}</p>";
                                            echo "<p class='m-0 p-0'>{$_SESSION["$i-$j-kelas"]}</p>";
                                            echo "<p class='m-0 p-0'>{$_SESSION["$i-$j-jam"]}</p>";
                                            echo "<p class='m-0 p-0'>{$_SESSION["$i-$j-sks"]} SKS</p>";
                                            echo "<p class='m-0 p-0'>{$_SESSION["$i-$j-ruang"]}</p>";
                                            echo "</label>";
                                        echo '</div>';
                                    }
                                }
                            echo "</td>";
                        }
                    echo "</tr>";
                echo "</tbody>";
            ?>
        </table>
        <?php session_destroy() ?>
        <a href="index.php"><button class='btn btn-info' type="button">Log Out</button></a>
    </div>
</body>
</html>