<?php

include("php/sesion.php");
include("header.php");

?>
<section id="form">
    <form action="crearPreguntas.php" class="contact_form" method="POST">
        <ul>
            <li>
                <h2>CREAR ENCUESTAS</h2>
            </li>
            TIPO TABLA
            <li>
                <label for="titulo">Encuesta:</label>
                <input type="text" name="titulo" placeholder="Encuesta" required=""/>
            </li>
             <li>
                <label for="preguntas">N&uacute;mero de preguntas:</label>
                <input type="number" name="preguntas" placeholder="preguntas" min="1" max="22" required=""/>
            </li>
            <li>
                <input type="submit" class="submit" value="Crear" />
            </li>
        </ul>
        <li><a href="verEncuesta.php" id="enlaces">VER RESULTADOS/RESPONDER ENCUESTAS</a></li>

    </form>
</section>
<?php  
include("footer.php");
?>