<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ config('app.name') }} - Start Page</title>
<link rel="stylesheet" href="{{ asset('vendor/filament-startpage/app.css') }}" />
<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&display=swap');

    :root {
        --primary-500: 0, 191, 255
    }

    body {
        font-family: 'Ubuntu', sans-serif;
    }

    .digital-clock {
        font-family: 'JetBrains Mono', monospace;
    }

    .learnkit-color {
        color: rgb(34, 197, 94);
    }

    .learnkit-bg {
        background-color: rgb(34, 197, 94);
    }
</style>