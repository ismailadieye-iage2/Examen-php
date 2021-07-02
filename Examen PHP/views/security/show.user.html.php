<?php
  if(!is_admin()) redirect_url();
  require_once(PATH_ROOT."views/include/header.inc.html.php");
  require_once(PATH_ROOT."views/include/menu.inc.html.php");
  $users=select_all_users();
?>
<div class="container">
  <h3>Liste des utilisateurs</h3>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom et Prénom</th>
        <th>Login</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
      <tr>
        <td><?= $user["id"] ?></td>
        <td><?= $user["nom_complet"] ?></td>
        <td><?= $user["login"] ?></td>
        <td><?= $user["role"] ?></td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>

<?php
  require_once(PATH_ROOT."views/include/footer.inc.html.php");
?>    