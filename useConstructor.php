<?php 

require_once 'constructor.php';

class useConstructor {

    $arrayNumbers = ['12','25','1','17','8','24'];


    $class1 = new BubbleClass($arrayNumbers);

    echo $class1->getMedian();
    echo $class1->getLargest();

}

?>