<?php
$b = 4!=4;          //false
$c = 3+7 == 10;     //true

$a = ($b and $c);
echo "\$a=$a <BR>";

$a = ($b or $c);
echo "\$a=$a <BR>";

$a = ($b xor $c);
echo "\$a=$a <BR>";

$a = (!$b or $c);
echo "\$a=$a <BR>";

$a = $b && $c;
echo "\$a=$a <BR>";

$a = $b || $c;
echo "\$a=$a <BR>";
?>