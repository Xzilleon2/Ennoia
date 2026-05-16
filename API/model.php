<?php

// =========================
// MAIN RESPONSE FUNCTION
// =========================
function get_bot_response($prompt)
{
    $url = "http://localhost:11434/api/generate";

    $data = [
        "model" => "Ennoia",
        "prompt" => $prompt,
        "stream" => false
    ];

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_TIMEOUT => 120
    ]);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        throw new Exception("Curl error: " . curl_error($ch));
    }

    curl_close($ch);

    $decoded = json_decode($result, true);

    $response = $decoded['response'] ?? null;

    if (!$response) return null;

    // CLEAN DASH PATTERNS
    $response = str_replace(
        ["--", "—", "–"],
        ["-", "-", "-"],
        $response
    );

    // Remove double spacing caused by replacements
    $response = preg_replace('/\s+/', ' ', $response);

    return trim($response);
}


// =========================
// STREAMING RESPONSE
// =========================
function stream_bot_response($prompt)
{
    $url = "http://localhost:11434/api/generate";

    $data = [
        "model" => "Ennoia",
        "prompt" => $prompt,
        "stream" => true
    ];

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_WRITEFUNCTION => function ($ch, $chunk) {
            $json = json_decode($chunk, true);

            if (isset($json['response'])) {
                echo "data: " . $json['response'] . "\n\n";
                @ob_flush();
                flush();
            }

            return strlen($chunk);
        },
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => json_encode($data)
    ]);

    curl_exec($ch);

    if (curl_errno($ch)) {
        echo "data: ERROR " . curl_error($ch) . "\n\n";
        flush();
    }

    curl_close($ch);
}