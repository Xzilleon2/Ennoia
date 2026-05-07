<?php

// Configuration
define('OLLAMA_URL', 'http://localhost:11434/api/generate');
define('MODEL_NAME', 'Ennoia');
define('MAX_TOKENS', 256);
define('TEMPERATURE', 0.7);

/**
 * Get response from Ollama model
 * @param string $prompt - The user's message
 * @param bool $stream - Whether to stream the response
 * @return string - The model's response
 */
function get_bot_response($prompt, $stream = false) {
    $data = [
        "model" => MODEL_NAME,
        "prompt" => $prompt,
        "stream" => $stream,
        "options" => [
            "num_predict" => MAX_TOKENS,
            "temperature" => TEMPERATURE
        ]
    ];

    $ch = curl_init(OLLAMA_URL);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code !== 200) {
        return "Error: Unable to connect to Ollama model (HTTP {$http_code})";
    }

    $result = json_decode($response, true);
    return $result['response'] ?? "Error: Invalid response from model";
}

/**
 * Stream bot response token by token
 * @param string $prompt - The user's message
 */
function stream_bot_response($prompt) {
    $data = [
        "model" => MODEL_NAME,
        "prompt" => $prompt,
        "stream" => true,
        "options" => [
            "num_predict" => MAX_TOKENS,
            "temperature" => TEMPERATURE
        ]
    ];

    $ch = curl_init(OLLAMA_URL);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);

    // Set up callback for streaming
    curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($curl, $data) {
        $result = json_decode($data, true);
        if (!empty($result['response'])) {
            echo $result['response'];
            flush();
        }
        return strlen($data);
    });

    curl_exec($ch);
    curl_close($ch);
}

?>