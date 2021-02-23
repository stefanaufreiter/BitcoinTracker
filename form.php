<html>
  <header>
    <title>Calculation</title>
  </header>
  <body>
    <?php
      session_start();

      include('index.php');
      $newbtc = $_POST["newbtc"];

      $newcalc = $newbtc*$myresponse['data']['BTC']['quote']['EUR']['price'];
     ?>
     <div id="form">
     <h1>BTC: <?php echo $newbtc; ?></h1><br>
     <h1>EUR: <?php echo $newcalc; ?>€</h1><br>
     <a href="index.php"><button id="btn">Reset</button></a>
   </div>
     <style>
        #form{
          text-align: center;
          position: center;
        }
        #btn{
          width:120px;
          height:auto;
        }
     </style>
  </body>
</html>
