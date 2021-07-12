<?php

$html = '<img src="a.jpg" /><img src="b.jpg" /><img src="c.jpg" />';
preg_match_all('/\w\.jpg/', $html, $matches);
for ($i=0; $i<3; $i++) {
    echo $matches[0][$i] . PHP_EOL;
}
