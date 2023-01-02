<?php

namespace App\Tests\Service;

use App\Service\ReadingTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ReadingTimeTest extends KernelTestCase
{
    public function testCalculate(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();
        $readingTime = $container->get(ReadingTime::class);
        $this->assertSame('1 min', $readingTime->calculate(str_repeat('mot ', 250)));
        $this->assertSame('2 min', $readingTime->calculate(str_repeat('mot ', 500)));
        $this->assertSame('3 min', $readingTime->calculate(str_repeat('mot ', 650)));

        // $myCustomService = static::getContainer()->get(CustomService::class);
    }
}
