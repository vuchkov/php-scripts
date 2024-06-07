<?php

$startTime  = microtime( true );

sleep (2); // Simulate a 2-second job
// Other tasks & code will be here...

$endTime  = microtime( true );
$executionTime  =  $endTime  -  $startTime ;
$formattedTime  = number_format( $executionTime , 3,  '.' ,  '' );
echo   "Execution time: "  .  $formattedTime  .  " seconds" ;
