<html>
<header>
  <title>My Bitcoin</title>
  <meta charset="utf-8">
</header>
<body>
  <pre>
    <?php

      //include('form.php');

      $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
      $parameters = [
        'convert' => 'EUR',
        'symbol' => 'BTC,LTC'
      ];

      $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: 40c2f9ba-201e-4cda-85d1-d11f6bf5721b'
      ];
      $qs = http_build_query($parameters); // query string encode the parameters
      $request = "{$url}?{$qs}"; // create the request URL


      $curl = curl_init(); // Get cURL resource
      // Set cURL options
      curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
      ));

      $yourbtc = 0.00250462; //Your personal amount of BTC
      $yourltc = 0.16103988; //Your personal amount of LTC

      $response = curl_exec($curl); // Send the request, save the response
      $myresponse = json_decode($response,true); // print json decoded response
      $mypricebtc = $myresponse['data']['BTC']['quote']['EUR']['price']*$yourbtc;
      $mypriceltc = $myresponse['data']['LTC']['quote']['EUR']['price']*$yourltc;

      $all = $mypricebtc + $mypriceltc;


      curl_close($curl); // Close request
    ?>
    </pre>
    <div id="main">
      <table>
        <tr>
          <th rowspan="3">MyData:</th>
          <td>MyBTC: <?php echo $mypricebtc;?>€</td>
        </tr>
        <tr>
          <td>MyLTC: <?php echo $mypriceltc;?>€</td>
        </tr>
        <tr>
          <td>All: <?php echo $all;?>€</td>
        </tr>
        <tr>
          <th rowspan="2">General:</th>
          <td><img src="img/btc.jpg"><?php echo $myresponse['data']['BTC']['quote']['EUR']['price']; ?></td>
        </tr>
        <tr>
          <td><img src="img/ltc.png"><?php echo $myresponse['data']['LTC']['quote']['EUR']['price']; ?></td>
        </tr>
      </table>
      <div>
        <div id="search">
          <form name="BitcoinForm" action="form.php" method="POST">
            BTC: <input type="text" name="newbtc" /><br><br>
            <a href="form.php"><input type="submit" value="Calculate" onclick="showData" id="btn"/></a>
          </form>
        </div>

        <!--<input type="submit" value="test" onclick="proofData">
        <p id="demo"></p>-->
      </div>
    </div>
    <script type="text/javascript">
       function showData(){
         var value = document.getElementsByName('newbtc');
         alert(${value});
       }

       function proofData(){
         var data = <?php echo json_encode($mypricebtc); ?>;
         document.write(data);
       }
    </script>
    <style>
      body{
        font-family: sans-serif;
      }
      table, th, td, tr{
        border: 1px solid black;

      }
      th, td, tr{
        padding:15px;
      }
      table{
        margin: 0 auto;
        margin-top:20px;
        position:center;
        text-align: right;
        background-color: white;
      }
      #main{
        text-align: center;
      }
      #search{
        margin-top: 20px;
      }
      img{
        width:50px;
        height:auto;
        margin-right: 10px;
      }
      #btn{
        width:120px;
        height:auto;
      }
      #btn:hover{
        font-size: 20px;
      }
    </style>
  </body>
</html>
