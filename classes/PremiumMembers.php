<?php
class PremiumMembers extends members
{
    private $_interestArray;

    function __construct($fName, $lName, $age)
    {
        parent::__construct($fName, $lName, $age);
        $this->_interestArray= "Not Specified";
    }

    /**
     * @return string
     */
    public function getInterestArray()
    {
        return $this->_interestArray;
    }

    /**
     * @param string $interestArray
     */
    public function setInterestArray($interestArray)
    {
        $this->_interestArray = $interestArray;
    }
}