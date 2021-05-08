<?php if (empty($_SESSION["visitors"]) === false): ?>

<table>
  <thead>
    <tr>
      <th scope="col">Vorname</th>
      <th scope="col">Nachname</th>
      <th scope="col">Organisation</th>
      <th scope="col">Email</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($_SESSION["visitors"] as $row): ?>
    <tr>
      <td><?php echo $row["firstname"]; ?></td>
      <td><?php echo $row["lastname"]; ?></td>
      <td><?php echo $row["organisation"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>

</table>

<?php endif;
?>
