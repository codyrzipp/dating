<?php
/*
--------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `seeking` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `premium` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interest_id` int(11) NOT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--------------------------------------------------------

--
-- Table structure for table `memberInterest`
--

CREATE TABLE `memberInterest` (
  `member_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memberInterest`
--
ALTER TABLE `memberInterest`
  ADD KEY `member_id` (`member_id`),
  ADD KEY `interest_id` (`interest_id`);
COMMIT;

 */
require ('../../../connect.php');
class database
{
    private $_dbh;

    function __construct($f3)
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            //create a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//            echo "connected";
        } catch (PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function insertMembers($newMember)
    {
        $first = $newMember->getFname();
        $last = $newMember->getLname();
        $age = $newMember->getLname();
        $phone = $newMember->getLname();
        $email = $newMember->getLname();
        $state = $newMember->getLname();
        $seeking = $newMember->getLname();
        $bio = $newMember->getLname();


        $sql = "INSERT INTO `member` (first, last, age, phone, email,
                state, seeking, bio)
                VALUES (:first, :last, :age, :phone, :email, :state,
                 :seeking, :bio)";

        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(":first", $first);
        $statement->bindParam(":last", $last);
        $statement->bindParam(":age", $age, PDO::PARAM_INT);
        $statement->bindParam(":phone", $phone);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":state", $state);
        $statement->bindParam(":seeking", $seeking);
        $statement->bindParam(":bio", $bio);

        $statement->execute();

        $id = $this->_dbh->lastInsertId();
    }

    public function insertMemberInterests($newMember)
    {
        $id = $newMember->getID();

        $indoorInterests = $newMember->getIndoorInterests();
        $outdoorInterests = $newMember->getOutdoorInterests();
    }

    function getMembers()
    {
        // 1. define the query
        $sql = "SELECT * 
                FROM member 
                ORDER  BY last, first";

        // 2. prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // 3. bind the parameters

        // 4. Execute the statement
        $statement->execute();

        // 5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}