<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $movingFrom = htmlspecialchars($_POST['mov_form']);
      $movingTo = htmlspecialchars($_POST['mov_to']);
      $name = htmlspecialchars($_POST['name']);
      $phone = htmlspecialchars($_POST['phone_num']);
      $email = htmlspecialchars($_POST['email_id']);


      $url = 'https://api.sendgrid.com/v3/mail/send';
      $apiKey = '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';


      $subject = "New Estimate Request from $name";
      $htmlContent = "
        <html>
        <head>
        <title>New Moving Quote Request Submission</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
                color: #333;
            }
            .email-container {
                max-width: 600px;
                background-color: #fff;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin: 0 auto;
            }
            .email-header {
                background-color: #007bff;
                color: #fff;
                padding: 20px;
                text-align: center;
                border-radius: 10px 10px 0 0;
            }
            .email-body {
                padding: 20px;
            }
            .email-body h3 {
                color: #007bff;
                font-size: 22px;
                margin-bottom: 20px;
            }
            .email-body p {
                font-size: 16px;
                line-height: 1.5;
                margin: 10px 0;
            }
            .email-body p strong {
                color: #333;
            }
            .email-footer {
                text-align: center;
                padding: 20px;
                background-color: #f9f9f9;
                border-top: 1px solid #e0e0e0;
                border-radius: 0 0 10px 10px;
            }
        </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <h1>New Moving Quote Request</h1>
                </div>
                <div class='email-body'>
                    <h3>You have received a New Moving Quote Request Submission:</h3>
                    <p><strong>Moving From:</strong> $movingFrom</p>
                    <p><strong>Moving To:</strong> $movingTo</p>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Phone Number:</strong> $phone</p>
                    <p><strong>Email:</strong> $email</p>
                </div>
                <div class='email-footer'>
                    <p>Thank you for using our service!</p>
                </div>
            </div>
        </body>
        </html>
      ";


      $emailData = [
          'personalizations' => [
              [
                  'to' => [
                      ['email' => 'vijayyogi8290@gmail.com', 'name' => $name],
                      ['email' => 'abhisheksharm916@gmail.com', 'name' => $name],
                      ['email' => 'info@evidentpackersandmovers.com', 'name' => $name]
                  ],
                  'subject' => $subject
              ]
          ],
          'from' => ['email' => 'info@evidentpackersandmovers.com', 'name' => 'Evident Packers and Movers'],
          'content' => [
              ['type' => 'text/plain', 'value' => strip_tags($htmlContent)],
              ['type' => 'text/html', 'value' => $htmlContent]
          ]
      ];


      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Authorization: Bearer ' . $apiKey,
          'Content-Type: application/json'
      ]);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($emailData));


      $response = curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      if ($httpCode == 202) {
          echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Request Received</title>
                <meta http-equiv='refresh' content='20;url=https://evidentpackersandmovers.com/' />
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        text-align: center;
                        margin: 0;
                        height: 100vh;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                    }
                    h1 {
                        color: #4CAF50;
                    }
                    p {
                        font-size: 18px;
                    }
                    .redirect-message {
                        font-weight: bold;
                        color: #555;
                        font-size: 20px;
                        margin-top: 20px;
                    }
                </style>
            </head>
            <body>
                <h1>Request Received!</h1>
                <p>Thank you, $name!</p>
                <p>Your request has been successfully submitted.</p>
                <p class='redirect-message'>You will be redirected to our home page in just 20 seconds!</p>
            </body>
            </html>
            ";
      } else {
          echo "Failed to send email. Response: $response";
      }

      curl_close($ch);
  } else {
      echo "Invalid request method.";
  }
?>
