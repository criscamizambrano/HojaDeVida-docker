<?php
session_start();
if (isset($_SESSION['exito']) && $_SESSION['exito']==true) {
    echo '<script type="text/javascript">
                alert("Registro exitoso en la base de datos");
                </script>';
    session_destroy();
} else if (isset($_SESSION['exito']) && $_SESSION['exito']==true) {
    echo '<script type="text/javascript">
                alert("Registro NO exitoso en la base de datos");
                </script>';
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de vida</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <section id="contenedor">
        <h1>Formulario para hoja de vida</h1>
        <form action="./php/registrar_hoja.php" method="POST" id="formulario">
            <fieldset name="información-personal">
                <legend>Información Personal</legend>
                <p>Su nombre completo: <input type="text" name="nombre" size="30" required></p>
                <p>Su Fecha de nacimiento: <input type="date" name="fecha-nacimiento" required></p>
                <p>Su número de cedula: <input type="number" name="cedula" minlength="3" required></p>
                <p>Su dirección: <input type="text" name="direccion" size="40" required></p>
                <p>Su número de telefono: <input type="number" name="telefono" minlength="5" required></p>
                <p>Su E-mail: <input type="email" name="email" size="40" required></p>


            </fieldset><br>
            <fieldset name="información-academica">
                <legend>Información Academica</legend>
                <p>Ultimo nivel academico que alcanzó: <select name="nivel-academico" id="nAcademico">
                        <option value="primaria">Primaria</option>
                        <option value="secundaria">Secundaria</option>
                        <option value="tecnica">Tecnico/Tecnologo</option>
                        <option value="universitaria">Profesional Universitarip</option>
                        <option value="especializacion">Especialización</option>
                        <option value="maestria">Maestria o superior</option>
                    </select></p>
                <p>Nombre de su última institución educativa: <input type="text" name="nombre-institucion" size="30">
                </p>
                <p>Último titulo obtenidos: <input type="text" name="titulo" size="30"></p>
                <p>Fecha de inciación de sus estudios: <input type="date" name="fecha-estudios"></p>
                <p>Fecha de finalización de sus estudios: <input type="date" name="fecha-fin-estudios"></p>
                <p>Escriba aquí otros titulos academicos obtenidos(si aplica): <input type="text" name="titulos" minlength="7"></p>
            </fieldset><br>

            <input type="submit" value="Enviar">
            <br>
        </form>
    </section>
</body>

</html>