<?php

if (isset($_GET['upn'])) {
    $encodedUrl = $_GET['upn'];
    $decodedUrl = base64url_decode($encodedUrl);

    if (filter_var($decodedUrl, FILTER_VALIDATE_URL)) {
        $email = isset($_GET['email']) ? $_GET['email'] : ''; 

        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $urlParts = parse_url($decodedUrl);

            parse_str($urlParts['query'] ?? '', $queryParams);

            $queryParams['email'] = $email;

            $newQuery = http_build_query($queryParams);

            $updatedUrl = $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'] . '?' . $newQuery;

            header("Location: $updatedUrl");
            exit;
        } else {
            echo "Invalid input data provided.";
        }
    } else {
        echo "Invalid input data.";
    }
} else {
    echo "Invalid input data provided. Please provide valid data.";
}

function base64url_decode($data) {
    $base64 = strtr($data, '-_', '+/');
    return base64_decode($base64);
}

?>
