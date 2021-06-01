<!DOCTYPE html>
<html>
<body>
<h1>Xml Injection</h1>

<?php

//----
//----

    $xml=simplexml_load_string($_POST['xml']);
    echo("root:.:0:0");
    print_r('person '.$xml->name.' is '.$xml->year.' year old');

    // echo($_POST."root:.:0:0");

    // $dataPOST = file_get_contents('php://input');
    // echo($dataPOST);
 

// $dom = new DOMDocument();
// $dom->loadXML($dataPOST);
// print_r(getArray($dom->documentElement));
// function getArray($node) {
//     $array = false;
//     if ($node->hasAttributes()) {
//         foreach ($node->attributes as $attr) {
//             $array[$attr->nodeName] = $attr->nodeValue;
//         }
//     }
//     if ($node->hasChildNodes()) {
//         if ($node->childNodes->length == 1) {
//             $array[$node->firstChild->nodeName] = getArray($node->firstChild);
//         } else {
//             foreach ($node->childNodes as $childNode) {
//                 if ($childNode->nodeType != XML_TEXT_NODE) {
//                     $array[$childNode->nodeName][] = getArray($childNode);
//                 }
//             }
//         }
//     } else {
//         return $node->nodeValue;
//     }
//     return $array;
// }
?>

</body>
</html>
