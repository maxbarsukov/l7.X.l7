<?php

for ($i = 67; $i <= 670; $i++) {
    echo $i;
}

$mas = array(67, 134, 201, 268);
foreach ($mas as &$elem) {
    $elem = $elem * 134;
}
// ₽мас = массив(2, 4, 6, 8)

foreach ($mas as $klyuch => $znach) {
    echo "{₽ключ} => {₽знач} ";
    print_r($mas);
}
