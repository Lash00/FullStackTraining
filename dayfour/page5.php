<?php
$arr = array("VS Code", "Git", "GitHub", "Figma", "PostMan", "MySql", );
echo "Total count is : " . count($arr);
echo "<br>";
echo "<br>";
if (in_array("GitHub", $arr))
    echo "GitHub is in array";
echo "<br>";
echo "<br>";
// note -> to use the array_values function then u need to put it in var
$ans = array_values($arr);
echo "All tols : ";
print_r($ans);
echo "<br>";
?>