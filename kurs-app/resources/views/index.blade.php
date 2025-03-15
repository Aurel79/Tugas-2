<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurs Mata Uang</title>
</head>
<body>
    <h1>Kurs Mata Uang terhadap USD</h1>
    <ul>
        @foreach ($rates['conversion_rates'] as $currency => $rate)
            <li>{{ $currency }}: {{ $rate }}</li>
        @endforeach
    </ul>
</body>
</html>
