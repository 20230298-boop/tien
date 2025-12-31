<?php
// Input: a, b, op qua URL
// Output: kết quả phép tính

$a = $_GET['a'] ?? 0;
$b = $_GET['b'] ?? 0;
$op = $_GET['op'] ?? '+';
$result = 0;

switch ($op) {
    case '+': $result = $a + $b; break;
    case '-': $result = $a - $b; break;
    case '*': $result = $a * $b; break;
    case '/': 
        $result = ($b != 0) ? $a / $b : "Không chia được cho 0";
        break;
}

echo "a = $a<br>";
echo "b = $b<br>";
echo "Phép toán: $op<br>";
echo "Kết quả: $result<br>";
?>