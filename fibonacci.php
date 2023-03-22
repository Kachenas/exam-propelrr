<?php 
    
    
    function fibonacci($n) {
        $previous_term = 0;
        $current_term = 1;

        for ($i = 0; $i < $n; $i++) {
            echo $current_term . "\n";

            $next_term = $current_term + $previous_term;
            $previous_term = $current_term;
            $current_term = $next_term;
        }


    }

    fibonacci(10);

?>