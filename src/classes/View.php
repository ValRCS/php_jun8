<?php
class View
{
    public function render($data)
    {
        echo "Our View";
        var_dump($data);
        echo "Should render some nice data here";
    }
}
