<?php

session_destroy();
echo '<p>Vous êtes à présent déconnecté <br />';
header("refresh:2,url=index.php?action=connect");
?>