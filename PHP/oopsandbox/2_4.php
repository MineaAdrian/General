<?php
class User {
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function sayHello()
    {
     return $this->name . ' Says hello';
    }
    //called when the objects instantiated from this class are not used anymore
    public function __destruct()
    {
        echo 'destructor ran..';
    }
}

$user1 = new User('Brad', 36);
echo $user1->name . ' is ' . $user1->age . ' years old';
echo '<br>';
echo $user1->sayHello();
