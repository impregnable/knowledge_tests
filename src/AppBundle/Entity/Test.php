<?php

  namespace AppBundle\Entity;

  use Doctrine\ORM\Mapping as ORM;

  /**
  *@ORM\Entity
  */
  class Test {

    /**
    *@ORM\Column(type="integer")
    *@ORM\Id
    *@ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    *@ORM\Column(type="string", length=10)
    */
    protected $name;

    /** @ORM\OneToMany(targetEntity="Question", mappedBy="test") */
    protected $questions;

    /**
    * Set id
    *
    * @param integer $id
    * @return Test
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
    * Set name
    *
    * @param string $name
    * @return Test
    */
    public function setName($name) {
      $this->name = $name;

      return $this;
    }

    /**
    * Get name
    *
    * @return string
    */
    public function getName() {
      return $this->name;
    }
      /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questions
     *
     * @param \AppBundle\Entity\Question $questions
     * @return Test
     */
    public function addQuestion(\AppBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \AppBundle\Entity\Question $questions
     */
    public function removeQuestion(\AppBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
