<?php
include "funciones.php";
$nombre = "";
if (isset($_POST['seleccion'])) {
    $elegir = $_POST["elegir"];
    $nombreUsu = $_POST['nombre'];
    if (empty($elegir)) {
        echo "Error debes enviar 3 Digimones";
        ?>
        <form method="POST" action="organizar_equipo.php" style="display:inline;color:mediumspringgreen">
            <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombreUsu; ?>" />
            <input type="submit" value="Volver atras" name="Equipo" id="Equipo">
        </form>
        <?php
            } else {
                if (count($elegir) < 3 || count($elegir) > 3) {
                    echo "Error, siempre debes enviar 3 digimones";
                    ?>
            <form method="POST" action="organizar_equipo.php" style="display:inline;color:mediumspringgreen">
                <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombreUsu; ?>" />
                <input type="submit" value="Volver atras" name="Equipo" id="Equipo">
            </form>
        <?php
                } else {
                    $file = fopen("./Usuarios/$nombreUsu/Equipo_usuarios.txt", "w");

                    $did_cadena = implode("\t", $elegir);
                    fwrite($file, $did_cadena . "\n");

                    fclose($file);
                    botonUsuario($nombreUsu);
                    echo "<br>";
                    echo "Su nuevo equipo es: ";
                    miEquipo($nombreUsu);
                }
            }
        }
        if (isset($_POST['Equipo'])) {
            $nombre = $_POST['nombre'];
            botonUsuario($nombre);
            echo "<br>";
            echo "<fieldset>";
            echo "<legend> Su equipo de Digimones</legend>";
            miEquipo($nombre);
            echo "</fieldset>";
            echo "<br>";
            echo "<fieldset>";
            echo "<legend> Todos sus digimones</legend>";
            echo "<div style='vertical-align:top;'>";
            $file = fopen("./Usuarios/$nombre/Digimons_usuarios.txt", "a+");
            while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
                list($nombreD, $Ataque, $defensa, $tipo, $nivel, $evolucion) = $info;
                ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <?php
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
                    echo "<tr>";
                    echo "<td>Elejir para tu equipo</td>";
                    echo "<td>"
                    ?>

            <label><input type="checkbox" name="elegir[]" value="<?php echo $nombreD . " ", $Ataque . " ", $defensa . " ", $tipo . " ", $nivel . " ", $evolucion . "\n" ?>"></label><br>

        <?php
                echo ("</table>");
            }
            ?>
        <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        <input type="submit" name="seleccion" />
        </form>
        </fieldset>
        </div>
    <?php
    }
