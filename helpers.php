<?php

use LearnKit\Startpage\LinksCollection;
use LearnKit\Startpage\StartpageManager;

if (!function_exists('startpage')) {
    function startpage(): StartpageManager
    {
        return app(StartpageManager::class);
    }
}

if(!function_exists('surroundLastPartWithSpan')) {
    function surroundLastPartWithSpan($input): string
    {
        // Split the input string into words
        $words = explode(' ', $input);

        // Initialize variables to track the last word with an uppercase letter
        $lastUppercaseWord = '';
        $lastUppercaseIndex = -1;

        // Iterate through the words in reverse order
        for ($i = count($words) - 1; $i >= 0; $i--) {
            if (preg_match('/[A-Z]/', $words[$i])) {
                $lastUppercaseWord = $words[$i];
                $lastUppercaseIndex = $i;
                break;
            }
        }

        // If a word with an uppercase letter is found, process it
        if ($lastUppercaseIndex !== -1) {
            // Split the word into parts based on uppercase letters
            $parts = preg_split('/(?=[A-Z])/', $lastUppercaseWord, -1, PREG_SPLIT_NO_EMPTY);

            // Check if there is more than one part
            if (count($parts) > 1) {
                // Surround the last part with the span tag
                $lastPart = array_pop($parts);
                $parts[] = '<span class="text-primary-500">' . $lastPart . '</span>';

                // Reassemble the word
                $words[$lastUppercaseIndex] = implode('', $parts);
            }
        }

        // Reassemble the string
        $output = implode(' ', $words);

        return $output;
    }
}

if(!function_exists('collectLinks')) {
    function collectLinks(null|array $items = null): LinksCollection {
        return new LinksCollection($items);
    }
}