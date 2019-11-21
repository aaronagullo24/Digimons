<?php
function boton()
{
    ?>
    <h1 style="color:black;float:center">ADMINISTRACION</h1>

    <body background="fondo.png" Style="text-align: center;">

        <form method="POST" action="alta_usuario.php" style="display:inline; color:mediumspringgreen">
            <input name="cadena" type="hidden">
            <input type="submit" value="alta usuario" name="alta usuario" id="alta usuario">
        </form>

        <form method="POST" action="alta_digimon.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden">
            <input type="submit" value="alta digimon" name="alta digimon" id="alta digimon">
        </form>
        <form method="POST" action="definir_evolucion.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden">
            <input type="submit" value="definir evolucion" name="definir evolucion" id="definir evolucion">
        </form>

        <form method="POST" action="ver_digimon.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden">
            <input type="submit" value="ver digimon" name="ver digimon" id="ver digimon">
        </form>


    </body>
<?php
}

function botonUsuario($nombre)
{
    ?>
    <h1 style="color:black;float:center">Entorno de Usuario</h1>

    <body background="fondo.png" Style="text-align: center;">
        <form method="POST" action="ver_mis_digimones.php" style="display:inline; color:mediumspringgreen">
            <input type="submit" value="Mis digimones" name="Mis_digimones" id="Mis_digimones">
            <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>" />

        </form>

        <form method="POST" action="organizar_equipo.php" style="display:inline;color:mediumspringgreen">
            <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>" />
            <input type="submit" value="Equipo" name="Equipo" id="Equipo">
        </form>

        <form method="POST" action="jugar_partida.php" style="display:inline;color:mediumspringgreen">
            <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>" />
            <input type="submit" value="Jugar" name="Jugar" id="Jugar">
        </form>

        <form method="POST" action="digievolucionar.php" style="display:inline;color:mediumspringgreen">
            <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>" />
            <input type="submit" value="Evolucionar" name="Evolucionar" id="Evolucionar">
        </form>
        <form method="POST" action="login.php" style="display:inline;color:mediumspringgreen">
            <input type="submit" value="cerrar sesion" name="cerrar sesion" id="cerrar sesion">
        </form>


    </body>
<?php
}
function verDigimones($nombre)
{
    echo "<div style='vertical-align:top;'>";

    $file = fopen("./Usuarios/$nombre/Digimons_usuarios.txt", "a+");
    while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
        list($nombre, $Ataque, $defensa, $tipo, $nivel, $evolucion) = $info;

        echo ("<table style='HEIGHT:20%;WIDTH:20% ;display:inline-table'; border=1;");
        echo ("<tr>");
        echo "<td COLSPAN='2' align='center' valign='middle'><img src=./digimones/" . $nombre . "/n.jpg heigth='100' width='100' ></td>";
        echo ("<tr>");
        echo ("<td>Nombre</td>");
        echo "<td>" . $nombre . "</td>";
        echo ("<tr >");
        echo ("<td>Ataque</td>");
        echo "<td>" . $Ataque . "</td>";
        echo ("<tr >");
        echo ("<td>Defensa</td>");
        echo "<td>" . $defensa . "</td>";
        echo ("<tr >");
        echo ("<td>Tipo</td>");
        echo "<td>" . $tipo . "</td>";
        echo ("<tr >");
        echo ("<td>Nivel</td>");
        echo "<td>" . $nivel . "</td>";
        echo ("<tr >");
        echo ("<td>Evolucion</td>");
        echo "<td>" . $evolucion . "</td>";

        echo ("</table>");
    }
    echo "</div>";
}
function miEquipo($nombreUsu)
{
    echo "<div style='vertical-align:top;'>";
    $file = fopen("./Usuarios/$nombreUsu/Equipo_usuarios.txt", "a+");
    while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
        list($nombreD, $Ataque, $defensa, $tipo, $nivel, $evolucion) = $info;

        echo ("<table style='HEIGHT:20%;WIDTH:20% ;display:inline-table'; border=1;");
        echo ("<tr>");
        echo "<td COLSPAN='2' align='center' valign='middle'><img src=./digimones/" . $nombreD . "/n.jpg heigth='100' width='100' ></td>";
        echo ("<tr>");
        echo ("<td>Nombre</td>");
        echo "<td>" . $nombreD . "</td>";
        echo ("<tr >");
        echo ("<td>Ataque</td>");
        echo "<td>" . $Ataque . "</td>";
        echo ("<tr >");
        echo ("<td>Defensa</td>");
        echo "<td>" . $defensa . "</td>";
        echo ("<tr >");
        echo ("<td>Tipo</td>");
        echo "<td>" . $tipo . "</td>";
        echo ("<tr >");
        echo ("<td>Nivel</td>");
        echo "<td>" . $nivel . "</td>";
        echo ("<tr >");
        echo ("<td>Evolucion</td>");
        echo "<td>" . $evolucion . "</td>";

        echo ("</table>");
    }
}

function numerorandom($tipoL, $tipoV)
{
    $total = 0;
    if ($tipoL == "Vacuna") {
        if ($tipoV == "virus") {
            $total = +10;
        } else if ($tipoV == "Animal") {
            $total = +5;
        } else if ($tipoV == "Planta") {
            $total = -5;
        } else if ($tipoV == "Elemental") {
            $total = -10;
        }
    }
 
    if ($tipoL == "Virus") {
        if ($tipoV == "Animal") {
            $total = +10;
        } else if ($tipoV == "Planta") {
            $total = +5;
        } else if ($tipoV == "Elemental") {
            $total = -5;
        } else if ($tipoV == "Vacuna") {
            $total = -10;
        }
    }


    if ($tipoL == "Animal") {
        if ($tipoV == "Planta") {
            $total = +10;
        } else if ($tipoV == "Elemental") {
            $total = +5;
        } else if ($tipoV == "Vacuna") {
            $total = -5;
        } else if ($tipoV == "Virus") {
            $total = -10;
        }
    }
    

    if ($tipoL == "Planta") {
        if ($tipoV == "Elemental") {
            $total = +10;
        } else if ($tipoV == "Vacuna") {
            $total = +5;
        } else if ($tipoV == "Virus") {
            $total = -5;
        } else if ($tipoV == "Animal") {
            $total = -10;
        }
    }

    

    if ($tipoL == "Elemental") {
        if ($tipoV == "Vacuna") {
            $total = +10;
        } else if ($tipoV == "Virus") {
            $total = +5;
        } else if ($tipoV == "Animal") {
            $total = -5;
        } else if ($tipoV == "Planta") {
            $total = -10;
        }
    }
  

    $total +=rand(1, 20);
    return $total;
}
function equipoGanadorLocal($user, $arrayGanador){
    $digequipo = digiArray("./USUARIOS/$user/EQUIPO_USUARIO.TXT");
    $i=0;
    foreach ($digequipo as $nombre => $digimon1) {
        echo "<table class='tabla' style='display:inline; border-style: solid;background-color:black;position:relative; margin-left:15%;font-size: 15px;'>";
        echo "<tr>";
        if($arrayGanador[$i]=='V'){
        echo "<td><img src='./DIGIMONES/" . $nombre . "/victoria.png' style:'width: 110px; height: 110px;'></td>";
        }elseif($arrayGanador[$i]=='D'){
        echo "<td><img src='./DIGIMONES/" . $nombre . "/derrota.png' style:'width: 110px; height: 110px;'></td>";
        }else echo "<td><img src='./DIGIMONES/" . $nombre . "/default.png' style:'width: 110px; height: 110px;'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Nombre: $nombre</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Ataque: " . $digequipo[$nombre]['ataque'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Defensa: " . $digequipo[$nombre]['defensa'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Tipo: " . $digequipo[$nombre]['tipo'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Nivel: " . $digequipo[$nombre]['nivel'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Siguiente Evolución: " . $digequipo[$nombre]['evolucion'] . "</td>";
        echo "</tr>";
        echo "</table>";
        $i++;
    
    }
}
