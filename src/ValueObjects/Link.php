<?php

namespace LearnKit\Startpage\ValueObjects;

use LearnKit\Startpage\Contracts\StartPageObject;

class Link implements StartPageObject
{
    protected ?string $label = null;

    protected ?string $url = null;

    protected ?string $icon = null;

    public function __construct(?string $label = null, ?string $url = null, ?string $icon = null)
    {
        $this->label = $label;
        $this->url = $url;
        $this->icon = $icon;
    }

    public function label(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function url(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function icon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public static function make(?string $label = null, ?string $url = null, ?string $icon = null): static
    {
        return new static($label, $url, $icon);
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function __toArray(): array
    {
        return [
            'label' => $this->label,
            'url' => $this->url,
            'icon' => $this->icon,
        ];
    }
}