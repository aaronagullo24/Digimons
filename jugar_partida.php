<?php
if (isset($_POST['Jugar'])) {
    $nombre = $_POST['nombre'];
    $total=0;
    $usu_rand = [];
    $tipoArray=[];
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
        $total=$arrayDigimonesLocal[$nombreD]['ataque'];
        $total+=$arrayDigimonesLocal[$nombreD]['defensa'];
        $tipoArray[]=[$arrayDigimonesLocal[$nombreD]['tipo']];
        $tipoArray[]+=$total;
    }

    foreach ($arrayDigimonesVisitante as $nombreD => $atributo) {
        $totalV=$arrayDigimonesVisitante[$nombreD]['ataque'];
        $totalV+=$arrayDigimonesVisitante[$nombreD]['defensa'];
        $tipoArrayV[]=[$arrayDigimonesVisitante[$nombreD]['tipo']];
        $tipoArrayV[]+=$totalV;
    }

    for($i=0;$i<count($tipoArray);$i++){}
   
}
