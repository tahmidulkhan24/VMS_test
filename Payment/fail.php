<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <link rel="icon" type="image/png" href="../img/icon4.png">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8d7da;
            font-family: Arial, sans-serif;
        }
        .message-box {
            text-align: center;
            background-color: #ca4646ff;
            color: white;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .message-box button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background-color: #f5c6cb;
            color: #721c24;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
        }
        .message-box button:hover {
            background-color: #f1b0b7;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2>Payment Failed!</h2>
        <p>Your payment was not successful. Please try again.</p>
        <button onclick="window.location.href='../index.php'">Go to Home</button>
    </div>
</body>
</html>
