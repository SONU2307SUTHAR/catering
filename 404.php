<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Arial', sans-serif;
        }

        /* Background styling */
        body {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            text-align: center;
            flex-direction: column;
        }

        /* Container for the error message */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* Styling the error box */
        .error {
            max-width: 500px;
            text-align: center;
        }

        .error h1 {
            font-size: 120px;
            font-weight: bold;
            color: #fff;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        .error p {
            font-size: 20px;
            margin: 20px 0;
            color: #fff;
        }

        .error .btn {
            text-decoration: none;
            background-color: #fff;
            color: #ff7e5f;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .error .btn:hover {
            background-color: #ff7e5f;
            color: #fff;
            transform: scale(1.1);
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="error">
            <h1>404</h1>
            <p>Oops! The page you're looking for doesn't exist.</p>
            <a href="/" class="btn">Go Back Home</a>
        </div>
    </div>
</body>
</html>
