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
          $testNames = array('Test1', 'Test2', 'Test3');
            foreach ($testNames as $testName) {
              $test = new Test();
              $test->setName($testName);
              $manager->persist($test);
              $manager->flush();

          $questionNames = array('Question1', 'Question2', 'Question3');
            foreach ($questionNames as $questionName) {
              $question = new Question();
              $question->setText($questionName)->setTest($test);
              $manager->persist($question);
              $manager->flush();
            }
            }
      }
  }
