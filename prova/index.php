<?php
// Include the php dom parser
//include_once('simplehtmldom_1_5/simple_html_dom.php');
//build the google images query

//echo "https://www.google.com/search?q=" . $firstpersonaName . "+" . $newname . '&tbm=isch';
$newname = "https://www.google.it/search?q=pane&tbm=isch";

//use parser on queried page
$html = file_get_contents($newname);
//echo $html;

// Find all images

preg_match_all('/<img[^>]+>/i',$html, $result);
var_dump($result[0][0]);

/*
foreach($html->find('img') as $element) {
    //echo $element->src . '<br>';
    $picurl = $element->src;
    array_push($picarray,$picurl);
}
//then pick two random ones
$picurl = $picarray[array_rand($picarray)];
echo "<img src=" . $picurl . ">";
$picurl = $picarray[array_rand($picarray)];
echo "<img src=" . $picurl . ">";*/

?>