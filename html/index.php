<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuários</title>
</head>
<body>
  <?php
  $host = 'db';
  $db   = 'registros';
  $user = 'root';
  $pass = 'minhasenha123';
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  try {
      $pdo = new PDO($dsn, $user, $pass, $options);
  } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

  $sql = "SELECT * FROM usuarios";
  $stmt = $pdo->query($sql);

  while ($row = $stmt->fetch()) {
      echo "<p>" . $row['nome'] . " - " . $row['email'] . "</p>";
  }
  ?>
</body>
</html>