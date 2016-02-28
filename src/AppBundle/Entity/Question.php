<?php

  namespace AppBundle\Entity;

  use Doctrine\ORM\Mapping as ORM;

  /**
  *@ORM\Entity
  */
  class Question {

    /**
    *@ORM\Column(type="integer")
    *@ORM\Id
    *@ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    *@ORM\Column(type="string", length=10)
    */
    protected $text;

    /**
     *@ORM\ManyToOne(targetEntity="Test")
     */
     protected $test;

    /**
    * Set id
    *
    * @param integer $id
    * @return Question
    */
    public function setId($id) {
      $this->id = $id;

      return $this;
    }

    /**
    * Get id
    *
    * @return integer
    */
    public function getId() {
      return $this->id;
    }

    /**
    * Set text
    *
    * @param string $text
    * @return Question
    */
    public function setText($text) {
      $this->text = $text;

      return $this;
    }

    /**
    * Get text
    *
    * @return string
    */
    public function getText() {
      return $this->text;
    }
  
    /**
     * Set test
     *
     * @param \AppBundle\Entity\Test $test
     * @return Question
     */
    public function setTest(\AppBundle\Entity\Test $test = null)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return \AppBundle\Entity\Test 
     */
    public function getTest()
    {
        return $this->test;
    }
}
