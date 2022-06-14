<?php

namespace App\DataFixtures;

use App\Entity\Article;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public const ARTICLES = [
        ['Spider-Man : Friend or Foe ?','Jonah Jamesson','2021-01-18','article_1.jpg','Cillum enim dolor nostrud irure sint cupidatat esse nulla ipsum proident nisi. Eiusmod reprehenderit aliqua nostrud mollit. Ex ut in ipsum commodo culpa esse ullamco ex. Anim velit et qui non elit pariatur. Non occaecat est veniam aliquip incididunt duis eiusmod irure magna aute. Irure officia consequat est cillum occaecat officia ipsum culpa sint irure pariatur cillum veniam aliqua. Tempor quis veniam aliqua amet magna laborum consectetur laborum laborum do. Sit anim laborum aliquip eu voluptate do aliqua proident. Ex consectetur occaecat in aliqua labore deserunt duis deserunt eiusmod fugiat. Dolor in quis sint consequat occaecat ea aliquip minim proident labore.'],
        ['Green Goblin attacks Oscorp research labs','Peter Parker','2021-02-14','article_2.jpeg','Minim eiusmod Lorem do exercitation id pariatur non dolore ullamco ea. Magna id veniam eu nulla nostrud velit consectetur ad in fugiat in ea aliqua proident. Ipsum adipisicing minim cupidatat eiusmod aute. Consequat voluptate minim nostrud laboris sunt eiusmod ut ut exercitation qui eiusmod nostrud minim quis. Eu reprehenderit ad eiusmod consequat. Aute pariatur ullamco esse dolor eu eiusmod exercitation do sit amet enim. Cupidatat magna eiusmod fugiat id anim eiusmod consectetur consectetur deserunt tempor esse proident est. Laborum nulla fugiat aliqua elit mollit laboris. Tempor nisi id culpa quis sunt duis in. Ut consectetur incididunt.'],
        ['Doctor Octopus holds up another bank !','Peter Parker','2021-04-28','article_3.jpg','Minim eiusmod Lorem do exercitation id pariatur non dolore ullamco ea. Magna id veniam eu nulla nostrud velit consectetur ad in fugiat in ea aliqua proident. Ipsum adipisicing minim cupidatat eiusmod aute. Consequat voluptate minim nostrud laboris sunt eiusmod ut ut exercitation qui eiusmod nostrud minim quis. Eu reprehenderit ad eiusmod consequat. Aute pariatur ullamco esse dolor eu eiusmod exercitation do sit amet enim. Cupidatat magna eiusmod fugiat id anim eiusmod consectetur consectetur deserunt tempor esse proident est. Laborum nulla fugiat aliqua elit mollit laboris. Tempor nisi id culpa quis sunt duis in. Ut consectetur incididunt.'],
        ['A dangerous creature has been seen in the streets of New-York','Eddie Brock','2021-05-02','article_4.jpg','Minim eiusmod Lorem do exercitation id pariatur non dolore ullamco ea. Magna id veniam eu nulla nostrud velit consectetur ad in fugiat in ea aliqua proident. Ipsum adipisicing minim cupidatat eiusmod aute. Consequat voluptate minim nostrud laboris sunt eiusmod ut ut exercitation qui eiusmod nostrud minim quis. Eu reprehenderit ad eiusmod consequat. Aute pariatur ullamco esse dolor eu eiusmod exercitation do sit amet enim. Cupidatat magna eiusmod fugiat id anim eiusmod consectetur consectetur deserunt tempor esse proident est. Laborum nulla fugiat aliqua elit mollit laboris. Tempor nisi id culpa quis sunt duis in. Ut consectetur incididunt.'],
        ['Another Spider-man ? Another criminal','Jonah Jamesson','2021-05-23','article_5.jpg','Minim eiusmod Lorem do exercitation id pariatur non dolore ullamco ea. Magna id veniam eu nulla nostrud velit consectetur ad in fugiat in ea aliqua proident. Ipsum adipisicing minim cupidatat eiusmod aute. Consequat voluptate minim nostrud laboris sunt eiusmod ut ut exercitation qui eiusmod nostrud minim quis. Eu reprehenderit ad eiusmod consequat. Aute pariatur ullamco esse dolor eu eiusmod exercitation do sit amet enim. Cupidatat magna eiusmod fugiat id anim eiusmod consectetur consectetur deserunt tempor esse proident est. Laborum nulla fugiat aliqua elit mollit laboris. Tempor nisi id culpa quis sunt duis in. Ut consectetur incididunt.']
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::ARTICLES as $articleItem) {
            $article = new Article();
            $article->setTitle($articleItem[0]);
            $article->setAuthor($articleItem[1]);
            $article->setDate(new DateTime($articleItem[2]));
            $article->setPicture($articleItem[3]);
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }
            copy(
                __DIR__ . '/data/' . $articleItem[3],
                $uploadDir . '/' . $articleItem[3]
            );
            $article->setContent($articleItem[4]);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
