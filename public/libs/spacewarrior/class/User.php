<?php
class User {
    private $name;
    private $score;

    public function __construct(
        $name,
        $score
    ){
        $this->name = $name;
        $this->score = $score;
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Score
     *
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the value of Score
     *
     * @param mixed $score
     *
     * @return self
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

}
