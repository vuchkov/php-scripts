<?php
// Initialize the session
session_start();

// Source: https://codeshack.io/implement-google-login-php/
// Replace with your data & google console credentials (below):
define('YOUR_CLIENT_ID', '<add_your_google_console_client_id>');
define('YOUR_CLIENT_SECRET', '<add_your_google_console_client_secret>');
define('YOUR_REDIRECT_URI', 'https://site.com/google-oauth.php<add_your_google_console_redirect_uri>');
$google_oauth_client_id = YOUR_CLIENT_ID;
$google_oauth_client_secret = YOUR_CLIENT_SECRET;
$google_oauth_redirect_uri = YOUR_REDIRECT_URI;
$google_oauth_version = 'v3';

$db_host = 'db';
$db_name = 'default';
$db_user = 'user';
$db_pass = 'user';

// If the captured code param exists and is valid.
if (isset($_GET['code']) && !empty($_GET['code'])) {
    // Execute cURL request to retrieve the access token
    $params = [
        'code' => $_GET['code'],
        'client_id' => $google_oauth_client_id,
        'client_secret' => $google_oauth_client_secret,
        'redirect_uri' => $google_oauth_redirect_uri,
        'grant_type' => 'authorization_code'
    ];
    $post_params = http_build_query($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);

    // Make sure access token is valid
    if (isset($response['access_token']) && !empty($response['access_token'])) {
        // Execute cURL request to retrieve the user info associated with the Google account
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/oauth2/' . $google_oauth_version . '/userinfo');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $response['access_token']]);
        $response = curl_exec($ch);
        curl_close($ch);
        $profile = json_decode($response, true);
        // Make sure the profile data exists
        if (isset($profile['email'])) {
            $google_name_parts = [];
            $google_name_parts[] = isset($profile['given_name']) ? preg_replace('/[^a-zA-Z0-9]/s', '', $profile['given_name']) : '';
            $google_name_parts[] = isset($profile['family_name']) ? preg_replace('/[^a-zA-Z0-9]/s', '', $profile['family_name']) : '';

            // Authenticate the user
            session_regenerate_id();
            $_SESSION['google_loggedin'] = TRUE;
            $_SESSION['google_email'] = $profile['email'];
            $_SESSION['google_name'] = implode(' ', $google_name_parts);
            $_SESSION['google_picture'] = isset($profile['picture']) ? $profile['picture'] : '';

            // Redirect to profile page
            header('Location: profile.php');
            exit;
        } else {
            exit('Could not retrieve profile information! Please try again later!');
        }
    } else {
        exit('Invalid access token! Please try again later!');
    }

} else {
    // Define params and redirect to Google Authentication page
    $params = [
        'response_type' => 'code',
        'client_id' => $google_oauth_client_id,
        'redirect_uri' => $google_oauth_redirect_uri,
        'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
        'access_type' => 'offline',
        'prompt' => 'consent'
    ];
    $post_params = http_build_query($params);
    header('Location: https://accounts.google.com/o/oauth2/auth?' . $post_params);
    exit;
}



