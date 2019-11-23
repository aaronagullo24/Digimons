<?php
include "funciones.php";
$nombre = "";
if (isset($_POST['Jugar'])) {
    $nombre = $_POST['nombre'];
    botonUsuario($nombre);

    $total = 0;
    $usu_rand = [];
    $tipoArray = [];
    $arrayDigimonesVisitante = [];
    $arrayPuntosLocal = [];
    $total = [];
    $totalV = [];


    $directorio = fopen("usuarios.txt", "a+");

    while ($info = fscanf($directorio, "%s\t%s\n")) {
        $nombre_Visitante = $info[0];
        list(
            $usuarios[$nombre_Visitante]['nombre'], $usuarios[$nombre_Visitante]['contraseña']
        ) = $info;
    }

    $usu_rand = array_rand($usuarios, 1);
    while ($nombre == $usu_rand) {
        $usu_rand = array_rand($usuarios, 1);
    }
    //Array de los digimones del usuario
    $directorio = "Usuarios/" . $nombre . "/";
    $file_digimon = fopen($directorio . "Equipo_usuarios.txt", "a+");

    //transformacion a array
    while ($info = fscanf($file_digimon, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
        $nombreD = $info[0];
        list(
            $arrayDigimonesLocal[$nombreD]['nombre'], $arrayDigimonesLocal[$nombreD]['ataque'], $arrayDigimonesLocal[$nombreD]['defensa'], $arrayDigimonesLocal[$nombreD]['tipo'], $arrayDigimonesLocal[$nombreD]['nivel'], $arrayDigimonesLocal[$nombreD]['evolucion']
        ) = $info;
    }
    //array de los digimones del visitanterival
    $directorio = "Usuarios/" . $nombre_Visitante . "/";
    $file_digimon = fopen($directorio . "Equipo_usuarios.txt", "a+");

    //transformacion a array
    while ($info = fscanf($file_digimon, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
        $nombreD = $info[0];
        list(
            $arrayDigimonesVisitante[$nombreD]['nombre'], $arrayDigimonesVisitante[$nombreD]['ataque'], $arrayDigimonesVisitante[$nombreD]['defensa'], $arrayDigimonesVisitante[$nombreD]['tipo'], $arrayDigimonesVisitante[$nombreD]['nivel'], $arrayDigimonesVisitante[$nombreD]['evolucion']
        ) = $info;
    }

    foreach ($arrayDigimonesLocal as $nombreD => $atributo) {
        $total = $arrayDigimonesLocal[$nombreD]['ataque'];
        $total += $arrayDigimonesLocal[$nombreD]['defensa'];
        $arrayPuntosLocal[] = $total;
        $tipoArray[] = $arrayDigimonesLocal[$nombreD]['tipo'];
    }


    foreach ($arrayDigimonesVisitante as $nombreD => $atributo) {
        $totalV = $arrayDigimonesVisitante[$nombreD]['ataque'];
        $totalV += $arrayDigimonesVisitante[$nombreD]['defensa'];
        $arrayPuntosVisitante[] = $totalV;
        $tipoArrayV[] = $arrayDigimonesVisitante[$nombreD]['tipo'];
    }


    for ($i = 0; $i < count($tipoArray); $i++) {
        $arrayPuntosLocal[$i] += numerorandom($tipoArray[$i], $tipoArrayV[$i]);
        $arrayPuntosVisitante[$i] += numerorandom($tipoArrayV[$i], $tipoArray[$i]);
        if ($arrayPuntosLocal[$i] > $arrayPuntosVisitante[$i]) {
            $ganador[] = 'L';
        } elseif ($arrayPuntosLocal[$i] < $arrayPuntosVisitante[$i]) {
            $ganador[] = 'V';
        } else $ganador[] = 'E';
    }

    $i = 0;
    foreach ($arrayDigimonesLocal as $nombreDigimon => $digimon) {
        echo "<table class='tabla' style='display:inline;position:relative;'>";
        echo "<tr>";
        if ($ganador[$i] == 'L') {
            echo "<td><img src='./digimones/" . $nombreDigimon . "/v.jpg'  heigth='100' width='100'></td>";
        } elseif ($ganador[$i] == 'V') {
            echo "<td><img src='./digimones/" . $nombreDigimon . "/d.jpg'  heigth='100' width='100'></td>";
        } else echo "<td><img src='./digimones/" . $nombreDigimon . "/n.jpg'  heigth='100' width='100'></td>";
        echo "</tr>";
        echo "</table>";
        $i++;
    }
    echo "</br>";
    $i = 0;
    foreach ($arrayDigimonesVisitante as $nombreDigimon => $digimon) {
        echo "<table class='tabla' style='display:inline;position:relative;'>";
        echo "<tr>";
        if ($ganador[$i] == 'L') {
            echo "<td><img src='./digimones/" . $nombreDigimon . "/d.jpg'  heigth='100' width='100'></td>";
        } elseif ($ganador[$i] == 'V') {
            echo "<td><img src='./digimones/" . $nombreDigimon . "/v.jpg'  heigth='100' width='100'></td>";
        } else echo "<td><img src='./digimones/" . $nombreDigimon . "/n.jpg'  heigth='100' width='100'></td>";
        echo "</tr>";
        echo "</table>";
        $i++;
    }
}
