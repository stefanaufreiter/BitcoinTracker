<html>
<header>
  <title>My Bitcoin</title>
  <meta charset="utf-8">
</header>
<body>
  <pre>
    <?php

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

      $response = curl_exec($curl); // Send the request, save the response
      $myresponse = json_decode($response,true); // print json decoded response
      $mypricebtc = $myresponse['data']['BTC']['quote']['EUR']['price']*0.00101389;
      $mypriceltc = $myresponse['data']['LTC']['quote']['EUR']['price']*0.16103988;

      curl_close($curl); // Close request
    ?>
    <h1><?php echo $mypricebtc;?></h1>
</pre>
</body>
</html>
