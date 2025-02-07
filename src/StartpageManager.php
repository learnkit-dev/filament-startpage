<?php

namespace LearnKit\Startpage;

use LearnKit\Startpage\Contracts\StartPageObject;

class StartpageManager
{
    public LinksCollection $components;

    public function __construct()
    {
        $this->components = new LinksCollection();
    }

    public function registerComponents(array|LinksCollection|StartPageObject $links): static
    {
        if (!$links instanceof LinksCollection) {
            $links = collectLinks($links);
        }

        foreach ($links as $link) {
            $this->pushComponent($link);
        }

        return $this;
    }

    public function pushComponent(StartPageObject $link): static
    {
        $this->components->push($link);

        return $this;
    }

    public function prependComponent(StartPageObject $link): static
    {
        $this->components->prepend($link);

        return $this;
    }

    public function getComponents(): LinksCollection
    {
        return $this->components;
    }
}