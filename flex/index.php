<html>
<head>
<!--    <link rel="stylesheet" href="13d.css">-->
    <style>
        div {
            font-family: Arial;
        }

        .container {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 15px;
            padding-right: 15px;
            width: 400px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.25);
            border-radius: 4px;
            margin-top: 20px;
            margin-left: 20px;
        }

        .inbox-label {
            font-size: 14px;
            color: rgb(120, 120, 120);
            margin-bottom: 20px;
        }

        .email {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 20px;
        }

        .sender-picture-container {
            margin-right: 10px;
        }

        .sender-picture {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 25px;
        }

        .email-content {
            flex: 1;
        }

        .email-header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3px;
        }

        .sender-name {
            font-size: 18px;
            font-weight: bold;
        }

        .send-time {
            font-size: 14px;
            color: rgb(120, 120, 120);
        }

        .subject {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .message {
            color: rgb(120, 120, 120);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="inbox-label">ALL INBOXES</div>
    <div class="email">
        <div class="sender-picture-container">
            <img class="sender-picture" src="cat.jpg">
        </div>
        <div class="email-content">
            <div class="email-header">
                <div class="sender-name">Chewy Promotions</div>
                <div class="send-time">4:58 PM</div>
            </div>
            <div class="subject">
                Biggest sales of the year!
            </div>
            <div class="message">
                Hey there! We're writing to tell you about our...
            </div>
        </div>
    </div>
</div>
</body>
</html>