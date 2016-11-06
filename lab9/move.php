<!DOCTYPE html>
<html>
<head>
  <title> move.php </title>
</head>
<body>
  <?php
    $db = new PDO("mysql:dbname=".$_POST["name"].";host=localhost;","root","root");
    $rows = $db->query($_POST["query"]);
  ?>
  <ul>
    <?php
      foreach ($rows as $row)
      {
        ?>
        <li>
          <?php
            for ($i = 0; $i < count($row); $i++) {
                print $row[$i];
                print " ";
            }
          ?>
        </li>
        <?php
      }

    ?>
  </ul>
</body>
</html>
