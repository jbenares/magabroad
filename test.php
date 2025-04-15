<?php
$server = stream_socket_server("tcp://127.0.0.1:8000", $errno, $errstr);
if (!$server) {
    echo "Error: $errstr ($errno)\n";
} else {
    echo "✅ Server is running on 127.0.0.1:8000\n";
    fclose($server);
}
