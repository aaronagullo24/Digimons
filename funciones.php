<?php
function boton()
{
    ?>
    <h1 style="color:black;float:center">SECCIONES</h1>

    <body Style="background-color:springgreen;">
        <form method="POST" action="alta_usuario.php" style="display:inline; color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="alta usuario" name="alta usuario" id="alta usuario">
        </form>

        <form method="POST" action="alta_digimon.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="alta digimon" name="alta digimon" id="alta digimon">
        </form>
        <form method="POST" action="definir_evolucion.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="definir evolucion" name="definir evolucion" id="definir evolucion">
        </form>

        <form method="POST" action="ver_digimon.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="ver digimon" name="ver digimon" id="ver digimon">
        </form>

        
    </body>
    <?php
}

