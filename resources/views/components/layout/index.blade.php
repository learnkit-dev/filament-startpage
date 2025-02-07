<!DOCTYPE html>
<html lang="en">
<head>
    <x-startpage::layout.head />
</head>
<body class="bg-gradient-to-br from-slate-800 to-slate-900 min-h-screen">
<div class="container mx-auto px-4 py-16">
    <!-- Header -->
    <div class="text-center mb-12">
        <!-- Company Name -->
        <x-startpage::layout.brand/>

        <div class="flex flex-col">
            @if(config('startpage.live_clock'))
                <div>
                    <div class="digital-clock bg-black/30 inline-block px-8 py-4 rounded-xl mb-4">
                        <div class="text-6xl font-bold learnkit-color" id="clock">00:00:00</div>
                    </div>
                </div>
            @endif

            @if(config('startpage.business_hours_countdown'))
                <div>
                    <div class="digital-clock bg-black/30 inline-block px-6 py-3 rounded-xl mb-6">
                        <div class="text-2xl font-bold text-white" id="countdown"></div>
                    </div>
                </div>
            @endif
        </div>

        @if(config('startpage.show_date'))
            <p class="text-slate-400 font-light" id="datetime"></p>
        @endif
    </div>

   {{ $slot }}
</div>

<x-startpage::layout.scripts/>
</body>
</html>
