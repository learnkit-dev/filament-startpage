<?php

namespace LearnKit\Startpage\ValueObjects;

use LearnKit\Startpage\Contracts\StartPageObject;
use LearnKit\Startpage\LinksCollection;

class Section implements StartPageObject
{
    protected ?string $label = null;

    protected LinksCollection $links;

    public function __construct(?string $label = null, ?LinksCollection $links = null)
    {
        $this->label = $label;

        $this->links = $links ?? collectLinks();
    }

    public function label(?string $label = null): static
    {
        $this->label = $label;

        return $this;
    }

    public function links(null|array|LinksCollection $links): static
    {
        if ($links === null) {
            $this->links = collectLinks();

            return $this;
        }

        if (is_array($links)) {
            $this->links = collectLinks($links);
        }

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getLinks(): LinksCollection
    {
        return $this->links;
    }

    public static function make(?string $label = null, ?LinksCollection $links = null): static
    {
        return new static($label, $links);
    }
}
