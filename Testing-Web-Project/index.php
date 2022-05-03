<?php
     require_once __DIR__ ."/phpFunctions/dataConnection.php";

     require_once __DIR__ ."/phpFunctions/databaseConnect.php";
     require_once __DIR__ ."/phpFunctions/xml.php";
     require_once __DIR__ ."/phpFunctions/errors.php";
     require_once __DIR__ ."/phpFunctions/getData.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UI</title>
    <link rel="stylesheet" href="./style/style.css">

</head>
<body>
    
<div  class="container-sm ok">
    <h1>Наши услуги</h1>
    <div class="cards-wraper">
    <?php
      $data = getData($connect, $ftp_data);
      foreach (getData($connect, $ftp_data) as $value) {
          echo '
          <a href="usluga.php?task=getUsluga&uslugaId='.$value["id"].'&has_electronic_view='.$_GET["has_electronic_view"].'" class="card-link ok">
            <div class="card ok">
                <div class="card-body ok">
                  '.$value["name"].'
                </div>
              </div>
            </a>';
      }
      $has_electronic_view = $_GET["has_electronic_view"] != null ? "<a href='usluga.php?task=getUslugi&has_electronic_view=".$_GET["has_electronic_view"]."' class='link-fut'>Подробное описание товаров</a>" : "<a href='usluga.php?task=getUslugi' class='link-fut'>Подробное описание товаров</a>";

      echo $has_electronic_view;
    ?>
</div>
</body>
</html>