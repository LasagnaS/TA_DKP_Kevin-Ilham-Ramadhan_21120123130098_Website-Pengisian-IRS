<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: index.php");
}

include("userService.php");
$user = new userService($_SESSION['email'], $_SESSION['password']);
$user->login();

$ipk = number_format($user->getIpk(), 2);

if($ipk == null){
    $sks = 20;
} elseif($ipk >= 3.00){
    $sks = 24;
} elseif($ipk >= 2.50 && $ipk <= 2.99){
    $sks = 22;
} elseif($ipk >= 2.00 && $ipk <= 2.49){
    $sks = 20;
} elseif($ipk < 2.00){
    $sks = 18;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Isian Rencana Studi</title>
</head>
<body class="bg-info-subtle text-info-emphasis">
    <header>
        <div class="p-3 mb-2 bg-info text-dark text-center">
            <h1>Isian Rencana Studi</h1>
        </div>
    </header>
    <div class="container">
        <?php
            if(isset($_POST['irs'])){
                $totalSks = 0;
                for($k = 0; $k <= 4; $k++){
                    for($l = 0; $l <= 4; $l++){
                        if (isset($_POST["check-$k-$l"])) {   
                            $_SESSION["$k-$l-matkul"] = $data[$k][$l]['matkul'];
                            $_SESSION["$k-$l-kelas"] = $data[$k][$l]['kelas'];
                            $_SESSION["$k-$l-jam"] = $data[$k][$l]['jam'];
                            $_SESSION["$k-$l-sks"] = $data[$k][$l]['sks'];
                            $_SESSION["$k-$l-ruang"] = $data[$k][$l]['ruang'];
                            $totalSks += $_POST["check-$k-$l"];
                        }  
                    }
                }
                if($totalSks > $sks){
                    for($k = 0; $k <= 4; $k++){
                        for($l = 0; $l <= 4; $l++){
                            if (isset($_POST["check-$k-$l"])) {   
                                $_SESSION["$k-$l-matkul"] = null;
                                $_SESSION["$k-$l-kelas"] = null;
                                $_SESSION["$k-$l-jam"] = null;
                                $_SESSION["$k-$l-sks"] = null;
                                $_SESSION["$k-$l-ruang"] = null;
                                $totalSks += $_POST["check-$k-$l"];
                            }  
                        }
                    }
                    ?>
                        <div class='alert alert-primary'>
                            Anda mengambil terlalu banyak SKS. <br>
                            SKS maksimal yang dapat anda ambil adalah <?=$sks?> SKS<br>
                            Anda mengambil <?=$totalSks?> SKS.
                        </div>
                        <a href="program.php"><button class='btn btn-info' type="button">Kembali</button></a>
                    <?php
                } else{
                    header('Location: hasil.php');
                }
            } else {  
        ?>
        
        <form class="form" action="" method="post">
            <div class="row">
                <div class="container text-center col-8 ps-0 pe-4">
                    <table class="table table-responsive table-bordered shadow table-light">
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
                                                echo "<input type='checkbox' name='check-$i-$j' value={$data[$i][$j]['sks']} class='btn-check' id='btn-check-$i-$j' autocomplete='off'>";
                                                echo "<label class='card btn btn-secondary border border-3 my-3' for='btn-check-$i-$j'>
                                                     <p class='m-0 p-0'>{$data[$i][$j]['matkul']}</p>
                                                     <p class='m-0 p-0'>{$data[$i][$j]['kelas']}</p>
                                                     <p class='m-0 p-0'>{$data[$i][$j]['jam']}</p>
                                                     <p class='m-0 p-0'>{$data[$i][$j]['sks']} SKS</p>
                                                     <p class='m-0 p-0'>{$data[$i][$j]['ruang']}</p>
                                                 </label>";
                                            }
                                        echo "</td>";
                                    }
                                echo "</tr>";
                            echo "</tbody>";
                        ?>
                    </table>
                </div>
                <div class="col-4 ps-4">
                    <div class="">
                        <h5 class=""><i class="bi bi-person-circle"></i> <?= $user->getNama(); ?></h5>
                        <h6><?= $user->getNim(); ?> | <?= $user->getJurusan(); ?></h6>
                    </div>
                    <div class="">
                        <ul class="ps-0 pt-2">
                            <li class="list-group-item">
                                IPK yang didapat semester lalu = <?= $ipk; ?>
                            </li>
                            <li class="list-group-item">
                                SKS yang dapat diambil semester ini = <?= $sks ?>
                            </li>
                        </ul>
                        <button class="btn btn-info mt-2" type="submit" name="irs" value="1">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</body>
</html>