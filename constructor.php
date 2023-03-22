<?php 

class BubbleClass {

  private $arr;
  private $bubbleArray;

  public function __construct(array $intArray) {
    $this->arr = $intArray;
  }

    public function bubbleSortArray() {   

        $n = count($this->myArray);

            for($i = 0; $i < $n; $i++) {
                for($j = 0; $j < $n - $i - 1; $j++) {
                    if($this->arr[$j] > $this->arr[$j + 1]) {
                    $temp = $this->arr[$j];
                    $this->arr[$j] = $this->arr[$j + 1];
                    $this->arr[$j + 1] = $temp;
                    }
                }
            }

    }

    public function getMedian() {
        $n = count($this->arr);
        $mid = floor($n / 2);
        if($n % 2 == 0) {
        return ($this->arr[$mid - 1] + $this->arr[$mid]) / 2;
        } else {
        return $this->arr[$mid];
        }
    }

    public function getLargest() {
        $n = count($this->arr);
        return $this->arr[$n - 1];
    }

}

?>