<?php
/**
 * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
 * Date: 12/13/2015
 * Time: 4:40 PM
 */

include_once('../Tools.php');

$tools = new Tools();

echo 'Ok...';

$allString = file_get_contents('mvl.html');


//$tools->dump($allString);

//$pattern = '/<table.*>.*<//';

$doc = new DOMDocument();
$doc->loadHTML($allString);

$tables = $doc->getElementsByTagName('table');
$out = array();

$i= 0;
foreach($tables as $table) {
    $content = $doc->saveHTML($table);

    $content = preg_replace('(style="[^"]*"|class="[^"]*")', "", $content);
    $tbl = new DOMDocument($content);
    $trs = $tbl->getElementsByTagName('tr');

    $tools->getMethodList($tbl);

    $out[] = $content ;

    //echo '<h1>'.(++$i).'</h1>'.$content ;
}

unset($out[0], $out[5], $out[6], $out[7], $out[8]);

$tools->mapArray($out, '<hr/><br/><br/>');

//$tools->dump($out);
