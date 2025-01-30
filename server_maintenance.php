<?php
// 1️⃣ Increase PHP Memory Limit
ini_set('memory_limit', '512M');

// 2️⃣ Dump MySQL Query Cache
$host = "localhost";
$user = "root";
$pass = "yourpassword";
$db = "your_database";

$conn = new mysqli($host, $user, $pass, $db);
$conn->query("RESET QUERY CACHE; FLUSH TABLES;");
$conn->close();

// 3️⃣ SSL Certificate Expiry Check
$domain = "yourwebsite.com";
$port = 443;
$context = stream_context_create(["ssl" => ["capture_peer_cert" => true]]);
$socket = stream_socket_client("ssl://{$domain}:{$port}", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $context);

if ($socket) {
    $context_params = stream_context_get_params($socket);
    $cert_info = openssl_x509_parse($context_params['options']['ssl']['peer_certificate']);
    $valid_to = date("Y-m-d H:i:s", $cert_info['validTo_time_t']);
    echo "✅ SSL Expiry: " . $valid_to;
}
?>
