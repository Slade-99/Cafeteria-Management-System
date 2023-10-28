<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria Home</title>
</head>
<body>
    <h1>Welcome to Cafeteria!</h1>
    
    <h1>Select your food items:</h1>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url(./background.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }
        h2{
            margin-left: 20px;
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: #333;
        }
        div#menu-container{
            justify-content: center;
            display: flex;
        }
        .menu-item {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            margin-left: 50px;
            margin-bottom: 10px;
            text-align: left;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }
        .menu-item img {
            max-width: 50%;
            border-radius: 4px;
            margin-top: 10px;
        }
        .gg{
            witdh: 100px;
            
        }
        button#checkoutButton {
            background-color: #333;
            color: #fff;
            margin-left: 200px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 18px;
        }

        button#checkoutButton:hover {
            background-color: #555;
        }

    </style>
    <h2>Menu:</h2>
    <div id="menu-container">
        <!-- Food items will be dynamically added here -->
    </div>

    <button id="checkoutButton">Proceed to Checkout</button>

    <script src="home.js"></script>
</body>
