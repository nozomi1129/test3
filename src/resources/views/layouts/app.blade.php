<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>もぎたて</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')

</head>
<body>
    <header class="header">
        <a href="/" class="header__ttl">mogitate</a>
    </header>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>