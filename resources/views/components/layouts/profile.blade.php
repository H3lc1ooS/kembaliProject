<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/profile.css">
</head>

<body>
    
    {{ $slot }}

    <script src="/js/index.js"></script>
    {{-- Icons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>