@php use LearnKit\Startpage\ValueObjects\Link;use LearnKit\Startpage\ValueObjects\Section; @endphp
<x-startpage::layout>
    <!-- Links Grid -->
    <x-startpage::links>
        @foreach(startpage()->getComponents() as $startpageComponent)
            @if($startpageComponent instanceof Link)
                <x-startpage::links.link
                    :label="$startpageComponent->getLabel()"
                    :url="$startpageComponent->getUrl()"
                    :icon="$startpageComponent->getIcon()"
                />
            @endif

            @if($startpageComponent instanceof Section)
                <x-startpage::links.section
                    :label="$startpageComponent->getLabel()"
                    :links="$startpageComponent->getLinks()"
                />
            @endif
        @endforeach
    </x-startpage::links>
</x-startpage::layout>