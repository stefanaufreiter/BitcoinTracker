<html>
<header>
  <title>My Json</title>
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

      $yourbtc = 0.00101389; //Your personal amount of BTC
      $yourltc = 0.16103988; //Your personal amount of LTC

      $response = curl_exec($curl); // Send the request, save the response
       // print json decoded response
      print_r(json_decode($response));

      $all = $mypricebtc + $mypriceltc;


      curl_close($curl); // Close request
    ?>
    </pre>

  </body>
</html>
