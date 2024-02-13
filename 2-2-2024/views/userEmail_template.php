<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voucher Email</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .header {
      text-align: center;
    }
    .voucher {
      text-align: center;
      padding: 20px 0;
    }
    .qr-code {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>Your Voucher</h2>
    </div>
    <div class="voucher">
      <p>Thank you for choosing our service. Here is your voucher code:</p>
      <h3>Voucher Code : <?php echo $name; ?></h3>
    </div>
    <div class="qr-code">
    </div>
  </div>
</body>
</html>
