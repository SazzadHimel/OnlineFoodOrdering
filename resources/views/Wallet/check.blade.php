<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Balance</title>
</head>
<body>
    <h1>Check Balance</h1>
    <form method="GET" action="{{ url('/wallet/check') }}">
        @csrf
        <label for="wallet_id">Wallet ID:</label>
        <input type="text" name="wallet_id" required>
        <button type="submit">Check Balance</button>
    </form>
    @isset($balance)
        <p>Balance: ${{ $balance }}</p>
    @endisset
</body>
</html>
