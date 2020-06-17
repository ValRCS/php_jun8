<?php
//our blueprint,template for our house
class House
{
    public $primaryColor = "black";
    private $mySecret = "red lion";

    //functions that are defined inside class are called methods

    //constructor called upon creating new object
    public function __construct($color = "red", $secret = "purple cow")
    {

        $this->primaryColor = $color;
        $this->mySecret = $secret;
        echo "<br>Created new house with $color and $secret<br>";
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

    private function makeSpan($text, $cssclasses)
    {
        return "<span class='$cssclasses'>$text</span>";
    }

}
