<?php

$curl = curl_init();

curl_setopt_array($curl, array(
   CURLOPT_URL => 'https://tang.hz.cz/zb/tv?type=169&token=ebe69322',
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => '',
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 0,
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => 'GET',
   CURLOPT_HTTPHEADER => array(
      'User-Agent: okhttp/4.12.0',
      'Accept: */*',
      'Host: tang.hz.cz',
      'Connection: keep-alive'
   ),
));

$response = curl_exec($curl);

curl_close($curl);

// Extracting 5-digit number after "108.181.32.169:"
if (preg_match('/108\.181\.32\.169:(\d{5})/', $response, $matches)) {
    $port = $matches[1];
    echo "端口,$port\n\n";
    // Replace the content in ./focus.txt with the extracted port number
    $fileContent = file_get_contents('./focus.txt');
    $fileContent = str_replace('81821', $port, $fileContent);
    file_put_contents('./focus.txt', $fileContent);
    echo "获取的$port,http://dl.935181.xyz/video/MV/T-ara.flv\n\n";
} else {
    echo "获取端口失败,http://dl.935181.xyz/video/MV/T-ara.flv\n\n";
}

echo date('Y-m-d H:i:s').",http://dl.935181.xyz/video/MV/T-ara.flv\n\n";

?>
