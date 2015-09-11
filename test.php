<?php
/**
 * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
 * Date: 2015 - 08 - 06
 * Time: 11:59 AM
 */

include_once('Tools.php');

$tools = new Tools();

//$tools->dump($tools->listFilesAndDir('asdf'));
//$tools->dump($tools->listFilesAndDir('img'));
$tools->dump($tools->dirToArray('ati'));
$tools->dump($tools->listFilesAndDir('ati'));
//$tools->dump($tools->countDirFiles('ati'));
//$tools->listFilesAndDir('ati');

//$action = $tools->deleteDirectory('ati', true );
////$action = $tools->deleteDirectory('img');
//
//if($action===true) echo 'directory deleted';
//elseif($action===false) echo 'directory delete failed.';
//else echo $action;
//
//if($tools->deleteDirectory('ati/img/aa/er.txt')===true) echo 'directory deleted';
//if($tools->checkForDirectory('ati/img/aa/er.txt', true, true)) echo 'directory exist';
//else echo 'directory creation failed!';
