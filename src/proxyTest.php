<?php
header('Content-Type: application/json');

function test_proxy($proxy, $protocol) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://www.example.com");
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

   if ($protocol == 'https') {
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
    } elseif ($protocol == 'socks4') {
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
    } elseif ($protocol == 'socks5') {
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    }

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpcode;
}

$proxy = $_GET['proxy'];
$protocol = $_GET['protocol'];
$httpcode = test_proxy($proxy, $protocol);

$response = array();
if ($httpcode >= 200 && $httpcode < 300) {
    $response['active'] = true;
} else {
    $response['active'] = false;
}

echo json_encode($response);
?>
