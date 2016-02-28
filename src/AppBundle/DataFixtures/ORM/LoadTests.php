<?php

  namespace AppBundle\DataFixtures\ORM;

  use Doctrine\Common\DataFixtures\FixtureInterface;
  use Doctrine\Common\Persistence\ObjectManager;
  use AppBundle\Entity\Test;
  use AppBundle\Entity\Question;

  class LoadTests implements FixtureInterface
  {
      public function load(ObjectManager $manager)
      {
          $questionNames = array('Question1', 'Question2', 'Question3');
          $test = new Test();
          $test->setName('Sport');

          $manager->persist($test);
          $manager->flush();
          foreach ($questionNames as $questionName) {
            $question = new Question();
            $question->setText($questionName)->setTest($test);
            $manager->persist($question);
            $manager->flush();
          }
      }
    }
