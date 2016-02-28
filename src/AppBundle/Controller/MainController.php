<?php

  namespace AppBundle\Controller;

  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
  use Symfony\Component\HttpFoundation\Response;
  use AppBundle\Entity\Test;
  use AppBundle\Entity\Question;
  use AppBundle\Entity\Answer;

  class MainController extends Controller {

    /**
    * @Route("/tests")
    */
    function tests() {
      return $this->render("/tests.html.twig");
    }
  }
