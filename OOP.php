<?php 

class User {

    private $email;
    private $name;

    public function __construct($name, $email){
        // $this->email = 'some@email.com';
        // $this->name = 'Beverly';
        $this->email = $email;
        $this->name = $name;
    }

    public function login(){
        //echo 'the user logged in';
        echo $this->name . 'logged in';
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        if(is_string($name) && strlen($name) > 1) {
            $this->name = $name;
            return 'the name has been updated to $name';
        } else {
            return 'not a valid name';
        }
    }
}

// $userOne = new User();
// $userOne->login();
// echo $userOne->name; //nothing happens if undefined 

$userTwo = new User('Guilda', 'guilda@email.com');
// echo $userTwo->name;
// echo $userTwo->email;
//$userTwo->login();  // returns 'Guildalogged in'

// we can update the name when is public
// $userTwo->name = 'Daphne';
// echo $userTwo->name;

//echo $userTwo->getName();
//$userTwo->setName(40);
$userTwo->setName('Elizabeth');
echo $userTwo->getName();

?>