<?php
function boton()
{
    ?>
    <h1 style="color:black;float:center">ADMINISTRACION</h1>

    <body background="fondo.png"Style="text-align: center;">
        
        <form method="POST" action="alta_usuario.php" style="display:inline; color:mediumspringgreen">
            <input name="cadena" type="hidden">
            <input type="submit" value="alta usuario" name="alta usuario" id="alta usuario">
        </form>

        <form method="POST" action="alta_digimon.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden">
            <input type="submit" value="alta digimon" name="alta digimon" id="alta digimon">
        </form>
        <form method="POST" action="definir_evolucion.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" >
            <input type="submit" value="definir evolucion" name="definir evolucion" id="definir evolucion">
        </form>

        <form method="POST" action="ver_digimon.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" >
            <input type="submit" value="ver digimon" name="ver digimon" id="ver digimon">
        </form>


    </body>
<?php
}

function botonUsuario()
{
    ?>
    <h1 style="color:black;float:center">Entorno del usuario</h1>

    <body Style="background-color:springgreen;">
        <form method="POST" action="ver_mis_digimon.php" style="display:inline; color:mediumspringgreen">
            <input name="cadena" type="hidden">
            <input type="submit" value="Mis digimones" name="Mis digimones" id="Mis digimones">
        </form>

        <form method="POST" action="organizar_equipo.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden">
            <input type="submit" value="Equipo" name="Equipo" id="Equipo">
        </form>
        <form method="POST" action="jugar_partida.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" >
            <input type="submit" value="Jugar" name="Jugar" id="Jugar">
        </form>

        <form method="POST" action="digievolucionar.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" >
            <input type="submit" value="Evolucionar" name="Evolucionar" id="Evolucionar">
        </form>


    </body>
<?php
}