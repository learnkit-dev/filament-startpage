# filament-startpage
## Installation
```bash
composer require learnkit/filament-startpage
```

## Setup new links
You can register new links via a service provider.

```php
use LearnKit\Startpage\ValueObjects\Link;

public function boot()
{
    $components = [
        Link::make()
            ->label('LearnKit website')
            ->url('https://learnkit.dev?ref=filament-startpage')
            ->icon('heroicon-m-star'),
    ];

    startpage()->registerComponents($components);
}
```

> [!NOTE]  
> More information coming soon.