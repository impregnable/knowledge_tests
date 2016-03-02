<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Test;
use AppBundle\Entity\Question;
use AppBundle\Entity\Answer;

class LoadTests implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $testsData = array(
      array(
        'name' => 'First test',
        'questions' => array(
          array(
            'text' => 'Select A',
            'answers' => array(
              array('text' => 'A', 'isCorrect' => true),
              array('text' => 'B', 'isCorrect' => false),
              array('text' => 'C', 'isCorrect' => false)
            )
          ),
          array(
            'text' => 'Select A and B',
            'answers' => array(
              array('text' => 'A', 'isCorrect' => true),
              array('text' => 'B', 'isCorrect' => true),
              array('text' => 'C', 'isCorrect' => false)
            )
          ),
          array(
            'text' => 'Type C',
            'answers' => array(
              array('text' => 'C', 'isCorrect' => true)
            )
          )
        )
      )
    );
    foreach ($testsData as $testData) {
      $test = (new Test())->setName($testData['name']);
      $manager->persist($test);
      $manager->flush();

      foreach ($testData['questions'] as $questionData) {
        $question = (new Question())->setText($questionData['text'])->setTest($test);
        $manager->persist($question);
        $manager->flush();

        foreach($questionData['answers'] as $answerData) {
          $answer = (new Answer())
            ->setText($answerData['text'])
            ->setIsCorrect($answerData['isCorrect'])
            ->setQuestion($question);
          $manager->persist($answer);
          $manager->flush();
        }
      }
    }
  }
}
