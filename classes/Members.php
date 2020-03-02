<?php
class Members
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;
    function __construct($fName, $lName, $age)
    {
        $this->_fname = $fName;
        $this->_lname = $lName;
        $this->_age = $age;
        $this->_email = "Not Specified";
        $this->_state = "Not Specified";
        $this->_seeking = "Not Specified";
        $this->_bio = "Not Specified";
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return string
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param string $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}