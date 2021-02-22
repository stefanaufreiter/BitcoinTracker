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
     <h1>BTC: <?php echo $newbtc; ?></h1><br>
     <h1>EUR: <?php echo $newcalc; ?></h1><br>
     <a href="index.php">Reset</a>
  </body>
</html>
