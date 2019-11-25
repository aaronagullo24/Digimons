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
    $arrayregistro = [];


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
            echo "<td><img src='./digimones/" . $nombreDigimon . "/v.jpg'  heigth='150px' width='150px'></td>";
        } elseif ($ganador[$i] == 'V') {
            echo "<td><img src='./digimones/" . $nombreDigimon . "/d.jpg'  heigth='150' width='150'></td>";
        } else echo "<td><img src='./digimones/" . $nombreDigimon . "/n.jpg'  heigth='150' width='150'></td>";
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
            echo "<td><img src='./digimones/" . $nombreDigimon . "/d.jpg'  heigth='150' width='150'></td>";
        } elseif ($ganador[$i] == 'V') {
            echo "<td><img src='./digimones/" . $nombreDigimon . "/v.jpg'  heigth='150' width='150'></td>";
        } else echo "<td><img src='./digimones/" . $nombreDigimon . "/n.jpg'  heigth='150' width='150'></td>";
        echo "</tr>";
        echo "</table>";
        $i++;
    }
    $g = 0;
    $p = 0;

    $directorio = "Usuarios/" . $nombre . "/";
    $file_registro = fopen($directorio . "registro.txt", "a+");

    while ($info = fscanf($file_registro, "%s\t%s\t%s")) {
        $nombreR = $info[0];
        list(
            $arrayregistro['jugadas'], $arrayregistro['ganadas'], $arrayregistro['evolucion']
        ) = $info;
    }

    for ($i = 0; $i < count($ganador); $i++) {
        if ($ganador[$i] == 'L') {
            $g++;
        } elseif ($ganador[$i] == 'V') {
            $p++;
        }
    }

    $arrayregistro['jugadas']++;

    if ($g > $p) {
        $arrayregistro['ganadas']++;
    }

    if ($arrayregistro['jugadas'] % 10 == 0) {
        $directorio = "Usuarios/" . $nombre . "/";
        $file_digimon = fopen($directorio . "Digimons_usuarios.txt", "a+");
        $digimones = fopen("digimones.txt", "a+");
        //todos digimones
        while ($info = fscanf($digimones, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            $nombreD = $info[0];
            list(
                $arrayDigimones[$nombreD]['nombre'], $arrayDigimones[$nombreD]['ataque'], $arrayDigimones[$nombreD]['defensa'], $arrayDigimones[$nombreD]['tipo'], $arrayDigimones[$nombreD]['nivel'], $arrayDigimones[$nombreD]['evolucion']
            ) = $info;
        }

        //digimones usuario
        while ($info = fscanf($file_digimon, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            $nombreD = $info[0];
            list(
                $arrayDigimonesUsu[$nombreD]['nombre'], $arrayDigimonesUsu[$nombreD]['ataque'], $arrayDigimonesUsu[$nombreD]['defensa'],  $arrayDigimonesUsu[$nombreD]['tipo'], $arrayDigimonesUsu[$nombreD]['nivel'], $arrayDigimonesUsu[$nombreD]['evolucion']
            ) = $info;
        }

        //array solo nivel uno
        foreach ($arrayDigimones as $caracteristica => $valor) {
            if ($valor['nivel'] == 1) {
                $Digimon1[$caracteristica] = $valor;
            }
        }


        $NuevoDigi = [];
        $arrayDistintos = array_diff_key($Digimon1, $arrayDigimonesUsu);
        $digi_rand = array_rand($arrayDistintos, 1);

        foreach ($arrayDigimones as $digimon => $campo) {
            if ($campo['nombre'] == $digi_rand) {
                $NuevoDigi[$campo['nombre']] = $campo;
            }
        }
        var_dump($NuevoDigi);
        //Array digimon aleatorio

        foreach ($NuevoDigi as $linea) {
            fwrite($file_digimon, $linea['nombre'] . " ");
            fwrite($file_digimon, $linea['ataque'] . " ");
            fwrite($file_digimon, $linea['defensa'] . " ");
            fwrite($file_digimon, $linea['tipo'] . " ");
            fwrite($file_digimon, $linea['nivel'] . " ");
            fwrite($file_digimon, $linea['evolucion'] . "\n");
        }



        fclose($file_digimon);

        $file_registro = fopen($directorio . "registro.txt", "w");
        foreach ($arrayregistro as $linea) {
            fwrite($file_registro, $linea . " ");
        }
    }

    if ($arrayregistro['ganadas'] % 10 == 0) {
        $arrayregistro['evolucion']++;
        $file_registro = fopen($directorio . "registro.txt", "w");
        foreach ($arrayregistro as $linea) {
            fwrite($file_registro, $linea . " ");
        }
    } else {
        $file_registro = fopen($directorio . "registro.txt", "w");
        foreach ($arrayregistro as $linea) {
            fwrite($file_registro, $linea . " ");
        }
    }
}
