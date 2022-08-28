<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
// https://console.cloud.google.com/apis/credentials/oauthclient/8514593748-ajj7o1acjksbhpd1r5ut9q7k2sji18e9.apps.googleusercontent.com?project=php-loginwdc
// https://developers.google.com/identity/gsi/web/guides/get-google-api-clientid

require '../vendor/autoload.php';
include 'get_oauth_token.php';
include_once "../api.php";
date_default_timezone_set('Etc/UTC');

$mail = new PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->AuthType   = 'XOAUTH2';

    // $oauthTokenProvider = new MyOAuthTokenProvider('akunaslireal123@gmail.com', '8514593748-ajj7o1acjksbhpd1r5ut9q7k2sji18e9.apps.googleusercontent.com','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' );
    $email            = 'akunaslireal123@gmail.com';
    $clientId         = $PHP_APP_CLIENTID_API_KEY;
    $clientSecret     = $PHP_APP_CLIENTSECRET_API_KEY;
    $refreshToken     = $token->getRefreshToken();

    $provider = new Google(
        [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]
    );

    $mail->setOAuth(
        new OAuth(
            [
                'provider' => $provider,
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
                'refreshToken' => $refreshToken,
                'userName' => $email,
            ]
        )
    );

    $mail->Username   = 'akunaslireal123@gmail.com';
    $mail->Password   = 'zyh8NCQi6YpusMG';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('akunaslireal123@gmail.com', 'Sender');
    $mail->addAddress('gunamanta.yuana@gmail.com', 'Manta Yuana');
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('akunasl');
    // $mail->addBCC('bcc@example.com');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Test, this is subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
