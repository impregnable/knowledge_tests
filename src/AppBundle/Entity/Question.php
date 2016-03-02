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
    *@ORM\Column(type="string")
    */
    protected $text;

    /**
     *@ORM\ManyToOne(targetEntity="Test")
     */
     protected $test;

     /** @ORM\OneToMany(targetEntity="Answer", mappedBy="question") */
     protected $answers;

     public function __toString() {
       return $this->text;
     }

     public function getType() {
       $qs = $this->getAnswers();
       if($qs->count() == 1) {
         return 'textarea';
       }
       elseif ($qs->count() > 1) {
         $correctCount = $qs->filter(function($q) { return $q->getIsCorrect(); })->count();
         if($correctCount > 1)
          return 'checkbox';
        else
          return 'select';
       }
     }

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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add answers
     *
     * @param \AppBundle\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\AppBundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \AppBundle\Entity\Answer $answers
     */
    public function removeAnswer(\AppBundle\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
