<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction List</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .back-arrow {
            display: flex;
            align-items: center;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .back-arrow img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .transaction-list {
            width: 100%;
            max-width: 800px;
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .transaction-icon {
            display: flex;
            align-items: center;
        }

        .transaction-icon img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .transaction-details {
            flex: 1;
        }

        .transaction-title {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .transaction-time {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .transaction-amount {
            font-size: 16px;
            font-weight: bold;
        }

        .amount-positive {
            color: #2ABF91;
        }

        .amount-negative {
            color: #FF5A5A;
        }
    </style>
</head>

<body>
    <a href="javascript:history.back()" class="back-arrow">
        <b><i class="bi bi-arrow-left" style="margin-right: 10px;font-size:25px;"></i></b> Go Back
    </a>
    <div class="transaction-list">
        <div class="transaction-item">
            <div class="transaction-icon" style="margin-right: 10px;margin-top: 5px;">
                <i class="bi bi-cash-coin" style="font-size:35px"></i>
            </div>
            <div class="transaction-details ml-3">
                <p class="transaction-title">[Unfreeze the order grabbing amount]</p>
                <p class="transaction-time" style="margin-top: 4px;">2025-01-21 11:01:13</p>
            </div>
            <div class="transaction-amount amount-positive">+22.26</div>
        </div>
    </div>
</body>

</html>
