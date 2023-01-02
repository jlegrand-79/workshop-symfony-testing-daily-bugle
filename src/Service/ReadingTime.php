<?php

namespace App\Service;

class ReadingTime
{
    public function calculate(string $content): string
    {
        //@todo write logic here
        $nbOfWords = str_word_count($content);
        $readingTime = ceil($nbOfWords / 250);
        return $readingTime ." min";
    }
}
