<?php

  namespace AppBundle\Controller;

  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use AppBundle\Entity\Test;
  use AppBundle\Entity\Question;
  use AppBundle\Entity\Answer;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

  class MainController extends Controller {
    /**
    * @Route("/tests")
    */
    function getTests() {
      // create instance of QueryBuilder
     $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
     // create query that get some properties from database
     $query = $qb->select(array('t.name', 'COUNT(q) as questions_count', 't.id'))
     ->from('AppBundle\Entity\Test', 't')
     ->leftJoin('AppBundle\Entity\Question', 'q', \Doctrine\ORM\Query\Expr\Join::WITH, 'q.test = t.id')
     ->groupBy('t.id');
     // render template tests
     return  $this->render("/tests.html.twig", array('tests' => $query->getQuery()->getResult()));
    }

    /**
    * @Route("/tests/{id}", name="test")
    */
    function getCurrentTest($id) {
      // fetches Doctrine's entity manager object
      $em = $this->getDoctrine()->getManager();
      // fetching a specific test based on its id value
      $test = $em->find('AppBundle:Test', $id);

      if(!$test) {
        throw $this->createNotFoundException('No test found for id ' .$id);
      }
      return $this->render('test.html.twig', array(
        'test' => $test
      ));
    }

    /**
    * @Route("/postTest/{id}", name="postTest")
    * @Method("POST")
    */
    function postTest(Request $request) {
      echo '<pre>';
      print_r($request->request->all()['questions']);
      echo '</pre>';

    }
  }
