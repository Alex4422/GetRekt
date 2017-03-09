<?php

header('Content-Type: application/json');

$data = [
    "valid" => false,
    "message" => "Page non trouvé !",
];

echo json_encode($data);