<?php

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.itsolutionstuff.com/upload/sample.xml");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$html=curl_exec($ch);

$dom=new \DOMDocument();
$internalErrors = libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_use_internal_errors($internalErrors);


$names=$dom->getElementsByTagName('name');
$prices=$dom->getElementsByTagName('price');
$descriptions=$dom->getElementsByTagName('description');
$calories=$dom->getElementsByTagName('calories');
$count=$names->length;
// foreach($names as $name){
//     $name_text=$name->textContent;

//     $name_array[]=$name_text;
// }

// foreach($prices as $price){
//     $price_text=$price->textContent;

//     $name_array[]=$price_text;
// }
// foreach($descriptions as $des){
//     $des_text=$des->textContent;

//     $name_array[]=$des_text;
// }

// echo json_encode($name_array);
// echo ($count);

// $firstmenu=$dom->getElementById("folder1");
// $xpath=new DOMXpath($dom);
// $menu=$xpath->query("//din[@id='folder1]/div");

// $count=$menu->length;

$firstmenu=$dom->getElementsByTagName('breakfast_menu');
// $allmenu=$dom->getElementsByClassName('html_tag');
$xpath = new DOMXPath($dom);
$tags = $xpath->query('//div[@id="folder1"]/div[@class="text"]');

foreach($firstmenu as $menu){
    $name_text=$menu->textContent;

    $name_array[]=$name_text;
    
    echo ($name_text );
     
}

// foreach($allmenu as $all){
//     $name_text=$all->textContent;

//     $name_array[]=$name_text;
    
//     echo ($name_text );
     
// }