@props([
    'url' => '#',
    'label' => 'Empty link',
    'icon' => 'heroicon-m-star',
])
<a href="{{ $url }}" @if(config('startpage.open_links_in_new_tab')) target="_blank" @endif class="block p-6 bg-white/10 rounded-lg hover:bg-white/20 transition-all duration-300 hover:scale-105">
    <div class="flex items-center space-x-4">
        <div class="bg-primary-500 p-3 rounded-lg">
            @svg($icon, ['class' => 'w-6 h-6 text-white'])
        </div>
        <span class="text-lg font-medium text-white">{{ $label }}</span>
    </div>
</a>
