<?php
echo ("<table border='1'");
echo ("<tr>");
echo ("<td>Nombre</td>");
echo ("<td>Ataque</td>");
echo ("<td>Defensa</td>");
echo ("<td>Tipo</td>");
echo ("<td>Nivel</td>");

$file = fopen("digimones.txt", "a+");
while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
    list($nombre, $Ataque, $defensa, $tipo, $nivel) = $info;

    echo ("<tr>");
    echo "<td>" . $nombre . "</td>";
    echo "<td>" . $Ataque . "</td>";
    echo "<td>" . $defensa . "</td>";
    echo "<td>" . $tipo . "</td>";
    echo "<td>" . $nivel . "</td>";
    echo "<td>";
    ?>
    <form method='POST' action="imagen_digimon.php">
        <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        <input type='submit' value='subir foto'>
    </form>
<?php
    echo "</td>";
}
echo "</tr>";
echo "</table>";
fclose($file);
