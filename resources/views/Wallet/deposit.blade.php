<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Funds</title>
</head>
<body>
    <h1>Deposit Funds</h1>
    <form method="POST" action="{{ url('/wallet/deposit') }}">
        @csrf
        <label for="wallet_id">Wallet ID:</label>
        <input type="text" name="wallet_id" required>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" step="0.01" required>
        <button type="submit">Deposit</button>
    </form>
</body>
</html>
