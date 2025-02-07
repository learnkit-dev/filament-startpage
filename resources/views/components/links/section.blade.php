@props([
    'label' => 'Section',
    'links' => collectLinks(),
])
<div class="col-span-full mb-8">
    <div class="mb-4">
        <h3 class="text-white font-bold text-3xl">{{ $label }}</h3>
    </div>

    <x-startpage::links>
        @foreach($links as $link)
            <x-startpage::links.link
                :label="$link->getLabel()"
                :url="$link->getUrl()"
                :icon="$link->getIcon()"
            />
        @endforeach
    </x-startpage::links>
</div>