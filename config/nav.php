

<?php

session_start();

$email = $_SESSION['email'];
echo "<nav class=\"navbar navbar-light bg-light\">
          <a class=\"navbar-brand\" href=\"#\">Propósitos</a>
        
          <span class=\"navbar-text\">
            Usuario: $email <a href=\"#\">Salir</a>
          </span>
      </nav>";
?>
