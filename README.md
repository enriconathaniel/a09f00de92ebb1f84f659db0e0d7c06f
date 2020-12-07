API Send Email

HTTP Request
----------------
Method: POST 
request: http://localhost/send-email/send_email.php

Headers
----------------
Content-Type: application/json

Body
----------------
to -> email recipient
subject -> email subject
bodyMessage -> The body of a message

Response
----------------
{
    "status": "01", 
    "message": "failed to send email"
}

{
    "status": "00", 
    "message": "email has been sent successfully"
}


