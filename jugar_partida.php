<?php
if (isset($_POST['Jugar'])) {
    $nombre = $_POST['nombre'];

    $usu_rand = [];
    $arrayDigimonesVisitante = [];

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
    var_dump($arrayDigimonesLocal);
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
$total=0;
    
    foreach ($arrayDigimonesLocal as $nombreD => $atributo) {
        foreach ($arrayDigimonesVisitante as $nombreV => $valor) {
            if (($arrayDigimonesLocal[$nombreD]['tipo']=="Animal") == (($arrayDigimonesLocal[$nombreV]['tipo']=="Animal"))) {
               $total=$arrayDigimonesLocal[$nombreD]['ataque']+=$arrayDigimonesLocal[$nombreD]['defensa'] += 10;
            }
        }
        
    }
    echo $total;

    
}
