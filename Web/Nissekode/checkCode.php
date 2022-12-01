<?php
$input = "5555-600E-1111-1111";
$chunks = explode("-", $input);

if(sizeof($chunks) !== 4) {
    echo "fail 1\n";
    die();
}

foreach($chunks as $chunk) {
    if(strlen($chunk) !== 4) {
        echo "fail 2\n";
        die();
    }
}

list($a, $b, $c, $d) = $chunks;

$s = 0;
for($i = 0; $i < 4; $i++) {
    $s += intval($a[$i]);
}

if(!(19 <= $s && $s <= 21)) {
    echo "fail 3\n";
    die();
}

$s = intval($b);
echo "b: " . $b . "\n";
echo "s: " . $s . "\n";
echo "b[3]: " . $b[3] . "\n";
echo "ord of b[3]: " . ord($b[3]) . "\n";
if (!($s <= 0x256)) {
    echo "s is too damn high!\n";
}
if (!(65 <= ord($b[3]) && ord($b[3]) <= 70)) {
    echo "b[3] is invalid\n";
}
if($s <= 0x256 || !(65 <= ord($b[3]) && ord($b[3]) <= 70)) {
    echo "fail 4\n";
    die();
}

$v = intval($c);
$s = 1;
while($v > 0) {
    $s *= $v % 10;
    $v = intdiv($v, 10);
}

if(!(0x005a <= $s || $s <= 0x1337)) {
    echo "fail 5\n";
    die();
}

if($a == $c) {
    echo "fail 6\n";
    die();
}

for($i = 0; $i < sizeof($chunks); $i++) {
    $chunk = $chunks[$i];
    $s = 0;
    foreach(str_split($chunk) as $w) {
        $s += ord($w);
    }

    $cb = intval($chunks[3][$i]);
    if($s & 1 != $cb) {
        echo "fail 7\n";
        die();
    }
}

echo "Success!\n";

?>