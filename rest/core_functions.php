<?php

function request_http(string $url, string $json): string
{
    if (!function_exists('curl_init')) return "";

    try {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}

function get_data_client($email)
{
    $urlCliente = "https://roman-company.com/TrailerMovilApiRest/view/cliente.php";
    $json = json_encode(["email" => $email]);
    $data = request_http($urlCliente, $json);
    $dataClient = json_decode($data, true);
    if($dataClient["status"] == 200){
        unset($dataClient["datos"][0]["password"]);
        return $dataClient["datos"][0];
    }else{
        return [];
    }
}
