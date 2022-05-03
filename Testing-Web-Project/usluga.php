<?php
  require_once __DIR__ ."/phpFunctions/dataConnection.php";

  require_once __DIR__ ."/phpFunctions/databaseConnect.php";
  require_once __DIR__ ."/phpFunctions/xml.php";
  require_once __DIR__ ."/phpFunctions/errors.php";
  require_once __DIR__ ."/phpFunctions/getData.php";

  $data = getData($connect, $ftp_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZZ</title>
    
    <link rel="stylesheet" href="./style/style.css">
</head>
<body class="body">
  <div  class="container-sm ">
  <header class="header">
    <div class="container">
      <?php
        $has_electronic_view = $_GET["has_electronic_view"];
        $link = $has_electronic_view != null ? "index.php?task=getUslugi&has_electronic_view=".$has_electronic_view."" : "index.php?task=getUslugi";

        echo '<a href="'.$link.'" class="con-a">
        <svg class="arrow-lef" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M21.3333 12H2.66663" stroke="#0B2F48" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M12 20.5554L2.66663 11.9999L12 3.44434" stroke="#0B2F48" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>   
        </a>'
      ?>
    </div>
  </header>
  <?php
     foreach ($data as $item_data){
      echo '
      <section class="inf">
        <div class="about-arrow">
          <h2 class="hos">
          '.$item_data["name"].'
          </h2>
          <div class="primary-btn">
            ID:'.$item_data["id"].'
          </div>
        </div>
      </section>

      <div class="host">
        <div  class="card ok no" style="max-width: 500px; width: 100%;">
          <div class="card-body ok no">
              Организация:
          <button type="button" class="btn btn-light ok">'.$item_data["organization"].'</button>
          </div>
        </div>
        <div  class="card ok no"style="max-width: 500px; width: 100%;"> 
          <div class="card-body ok no">  
              Оплата:
              <div class="primary-btn true '.($item_data["payment"] ? "" : "fale").'">
              '.($item_data["payment"] ? "true" : "false").'
              </div>
          </div>
        </div>
        <div  class="card ok no"style="max-width: 500px; width: 100%;" >
        
          <div class="card-body ok no">
            
              Оплата гос. пошлины:
              <div class="primary-btn true '.($item_data["state_duty_payment"] ? "" : "fale").'">
              '.($item_data["state_duty_payment"] ? "true" : "false").'
              </div>
          </div>
        </div>
        <div  class="card ok no" style="max-width: 500px; width: 100%;">
      
          <div class="card-body ok no">
          
              Имеет электронный вид:
          
        
          <button type="button" class="btn btn-light ok">'.$item_data["has_electronic_view"].'</button>
          </div>
        </div>
      </div>
      ';
     }
  ?>
  </div>

</body>
</html>
