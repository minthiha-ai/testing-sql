<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Command App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
    @yield('content')
    <!-- Disabled textarea for error logs -->
    @if (session('error'))
        <div>
            <label for="error_log">Error Log</label>
            <textarea id="error_log" rows="6" disabled>{{ session('error') }}</textarea>
        </div>
    @endif
</body>
</html>
