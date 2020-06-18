<?php
//our blueprint,template for our house
class House
{
    public static $foundation = 'concrete';
    public $primaryColor = "black";
    private $mySecret = "red lion";

    //functions that are defined inside class are called methods

    //constructor called upon creating new object
    public function __construct($color = "red", $secret = "purple cow")
    {

        $this->primaryColor = $color;
        $this->mySecret = $secret;
        echo "<br>Created new house with $color and $secret<br>";
        $this->prettyPrint(House::$foundation);
        $this->prettyPrint($this->mySecret);
    }

    public function showSecret()
    {
        echo "<div>This house secret is " . $this->mySecret . "</div>";
    }

    public function setSecret($text)
    {
        //extra validation here
        $this->mySecret = $text;
    }

    public function getSecret($text)
    {
        return $this->mySecret;
    }

    public function prettyPrint($element)
    {
        echo $this->makeSpan($element, "cool-effect");
    }

    public function add($a, $b)
    {
        return $a + $b;
    }

    public static function mult($a, $b)
    {
        return $a * $b;
    }

    private function makeSpan($text, $cssclasses)
    {
        return "<span class='$cssclasses'>$text</span>";
    }

}

class FancyHouse extends House
{
    public $poolSize = 100;
    private $batteryCount = 10;

    public function __construct($color = "red", $secret = "purple cow", $solarBatteries = 10)
    {
        //we have to call parent constructor explicitly
        //if we make our own child constructor
        parent::__construct($color, $secret);
        $this->batteryCount = $solarBatteries;
        echo "<hr>";
        var_dump($this);
        $this->swim();
    }

    public function swim()
    {
        echo "<div> I am swimming in my pool of size " . $this->poolSize . "</div>";
    }
}
