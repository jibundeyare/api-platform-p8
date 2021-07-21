<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Author;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $author = new Author();
        $author->setFirstname('foo');
        $author->setLastname('bar');
        $manager->persist($author);

        $tag = new Tag();
        $tag->setName('PHP');
        $manager->persist($tag);

        $article = new Article();
        $article->setTitle('lorem ipsum');
        $article->setBody('lorem ipsum lorem ipsum lorem ipsum');
        $article->setAuthor($author);
        $article->addTag($tag);
        $manager->persist($article);

        $manager->flush();
    }
}
