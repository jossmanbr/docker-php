<?php
header('Content-Type: application/json');

$proxy = $_GET['proxy'];
	$protocol = $_GET['protocol'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://api.ipify.org/?format=json");
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
        echo($output);
?>