<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    public function testRecentArticles(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/recent-articles');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Recent articles');
    }
}
