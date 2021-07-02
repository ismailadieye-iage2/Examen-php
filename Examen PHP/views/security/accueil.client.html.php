<?php
if(!is_client()) redirect_url();
  require_once(PATH_ROOT."views/include/header.inc.html.php");
  require_once(PATH_ROOT."views/include/menu.inc.html.php");
?>
<h3>Accueil client</h3>

<?php
  require_once(PATH_ROOT."views/include/footer.inc.html.php");
?>    