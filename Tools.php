<?php
/**
 * Created by Md. Atiqur Rahman
 * Email: atiq.cse.cu0506.su@gmail.com
 * Skype: atiq.cu
 * Date: 4/22/2015
 * Time: 8:25 PM
 * Features : Mainly static type functions
 *
 * *********Modification log***************
 *
 * Last Modified : 3rd December 2015
 * Last Modified : 24th April 2015
 *
 * ******** Method list *******************
 * 1.  arrayToCsv
 * 2.  csvToArray
 * 3.  removeDoubleSpace
 * 4.  removeSpace
 * 5.  removeSpaceFeed
 * 6.  smartClean
 * 7.  replaceSpaceWithParam
 * 8.  replaceParamWithParam
 * 9.  dumps
 * 10. dump
 * 11. csvToArray
 * 12. processKendoFilters
 * 13. processKendoClause
 * 14. camelCaseToFlat
 * 15. flatToCamelCase
 * 16. average
 * 17. sum
 *
 */



/**
 * Class Tools
 * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
 * @version 1.0.5
 */
class Tools {

    ## worked in local environment........ please raise issue in git if you find any issue.

    /**
     * Basic and simple sanitize.
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.5
     * @param $data
     * @return string
     */
    public function sanitizeSimple($data){
        return htmlentities($data, ENT_QUOTES, 'UTF-8');
    }


    /**
     * Create simple numeric patterned sting.
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.1
     * @param $FirstPart
     * @param $lastPart
     * @param int $varUpTo
     * @param int $varStart
     * @param string $append
     * @param string $prepend
     * @param int $step
     * @return array
     */
    function getSlideShareLinks($FirstPart, $lastPart, $varUpTo = 30, $varStart = 1, $append='', $prepend ='', $step=1){

        $return = array();

        for($i = $varStart ; $i<$varUpTo ; $i= $i+$step){
            $tmp = $prepend.$FirstPart.$i.$lastPart.$append ;
            $return[] = $tmp ;
        }

        return $return ;
    }

    /**
     * Creating image tag from a source array.
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.1
     * @param array $arr
     * @param bool $addTitle
     * @param bool $returnOutput
     * @return array|string
     */
    function makeImageTagFromArray(array $arr, $addTitle = true, $returnOutput = false){

        $i=1;
        $buffer = '';
        $bufferArray = array();

        if($addTitle){
            foreach($arr as $imSrc){
                $bufferArray[] = '<img src="'.$imSrc.'" title = "Slide no:'.($i++).'"/>';
                $buffer .= '<img src="'.$imSrc.'" title = "Slide no:'.($i++).'"/>';

            }

        }else{
            foreach($arr as $imSrc){
                $bufferArray[] = '<img src="'.$imSrc.'" />';
                $buffer .= '<img src="'.$imSrc.'" />';
            }
        }

        if(!$returnOutput){
            echo $buffer;
        }

        return $bufferArray;
    }


    /**
     * Get intersecting as wel as subtracting element of two array
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param $arr1
     * @param $arr2
     * @return array
     */
    public function arrayCompare($arr1, $arr2){

        $ret =array();
        $ret['count']['arr1']=count($arr1);
        $ret['count']['arr2']=count($arr2);
        $ret['unique']['arr1']=array_diff($arr1, $arr2);
        $ret['unique']['arr2']=array_diff($arr2, $arr1);
        $ret['given']['arr1']=$arr1;
        $ret['given']['arr2']=$arr2;

        if(count($ret['unique']['arr1'])>0){

            foreach($ret['unique']['arr1'] as $key=>$val){

                unset($arr1[$key]);

            }
            $ret['unique']['common']= $arr1;
        }
        else $ret['unique']['common']= $ret['given']['arr1'];

        $ret['count']['common']=count($ret['unique']['common']);

        return $ret;

    }


    /**
     * Calculate sum of given numbers
     * Example : sum(3,2,1); sum(false,array(),5,5); // will return 10
     * @return int|string
     */
    public static function sum(){
        $s=0;
        foreach(func_get_args() as $a) $s+= is_numeric($a)? $a: 0;
        return $s;
    }


    /**
     * Calculates average of some given number
     * Example : average(10, 15, 20, 25);
     * @return float
     */
    public static function average(){
        return array_sum(func_get_args())/func_num_args();
    }


    /**
     * Flat to camel case word : atiqur_rahman : atiqurRahman
     * For more perfect case conversion see below
     * http://framework.zend.com/manual/2.2/en/modules/zend.filter.word.html
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param string $input
     * @param string $sap
     * @return string
     */
    public static function flatToCamelCase($input='', $sap='_'){
        $ret = explode($sap, $input);
        $output='';
        foreach($ret as $rt) $output.= ucfirst($rt);
        return lcfirst($output);
    }


    /**
     * Flat to studly case word
     * @usage flatToStudlyCase('atiqur_rahman') -> AtiqurRahman
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param string $input
     * @param string $sap
     * @return string
     */
    public static function flatToStudlyCase($input='', $sap='_'){
        $ret = explode($sap, $input);
        $output='';
        foreach($ret as $rt) $output.= ucfirst($rt);
        return $output;
    }


    /**
     * Camel/studly case to flat
     * @usage - camelCaseToFlat('atiqurRahman' , ' ') = atiqur rahman
     * @param $string
     * @param string $sap
     * @return string
     */
    public static function camelCaseToFlat($string, $sap='_'){

        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode($sap, $ret);
    }


    /**
     * Convert array into comma separated value (csv)
     * @param array $arr
     * @param string $separator - default is ', ' (comma+space)
     * @return string
     */
    public static function arrayToCsv($arr=array(), $separator=', '){

        if(is_array($arr) and count($arr)>0){
            $sap='';
            $return='';
            foreach($arr as $r){
                $return.=$sap.$r;
                $sap=$separator;
            }
            return $return;

        }else return '';
    }

    /**
     * Convert Csv[comma separated value] into array.
     * @param string $str
     * @param string $sap - default is ', ' (comma+space)
     * @return array
     */
    public static function csvToArray($str='', $sap=', '){

        if(strlen($str)>0){
            $return = explode($sap, $str);
            return $return;

        }else return array();
    }


    /**
     * Remove double space from string. optionally can replace every double space with something else.
     * @param null $string
     * @param string $rep
     * @return mixed
     */
    public static function removeDoubleSpace($string = null, $rep=' '){
        return  $ret = preg_replace('/([\s])\1+/', $rep, $string);
    }

    /**
     * Remove/replace space from a string.
     * @param null $string
     * @param string $rep
     * @return mixed
     */
    public static function removeSpace($string = null, $rep=''){
        return $ret = preg_replace('/[\s]+/', $rep, $string );
    }

    /**
     * Remove/replace space feed from a string.
     * @param null $s
     * @param string $rep
     * @return mixed
     */
    public static function removeSpaceFeed( $s = null, $rep=''){
        return $ret = preg_replace('/[\t\n\r\0\x0B]/', $rep, $s);
    }

    /**
     * First remove space feed then remove every double space then trim the string.
     * @param null $s
     * @return string
     */
    public static function smartClean($s = null){
        return $ret = trim( self::removeDoubleSpace( self::removeSpaceFeed($s) ) );
    }

    /**
     * Remove space feed then replace space with given parameter.
     * @param null $string
     * @param string $rep
     * @return mixed
     */
    public static function replaceSpaceWithParam($string = null, $rep='_'){
        $ret = trim(self::removeSpaceFeed($string));
        return self::replaceParamWithParam($ret, ' ', $rep);
    }

    /**
     * alias of str_replace - but modified for default replace string is space.
     * @param $string
     * @param $replace
     * @param string $with
     * @return mixed
     */
    public static function replaceParamWithParam($string, $replace, $with=' '){
        return str_replace($replace, $with, $string);
    }


    /**
     * Dumping variable for debugging
     * @param $var
     * @param bool $die
     * @param null $die_msg
     * @param bool $varDump
     */
    public static function dump($var, $die=true, $die_msg=NULL, $varDump=false){

        if('comment'===$die){   echo '<!-- ';}
        echo '<pre>';

        if($varDump===true)  var_dump($var);
        elseif(is_array($var) && count($var)>0) print_r($var);
        elseif(is_object($var)) print_r($var);
        else var_dump($var);

        echo '</pre>';
        if($die==='comment') echo '-->';
        if($die===true)	die('Died from dump helper...'.$die_msg);
    }


    /**
     * dumping variables passed as arguments of this function.
     * @param bool $die
     */
    public static function dumps($die=true){
        echo '<pre>';
        $args = func_get_args();
        foreach ($args as $arg){
            if(is_array($arg) && count($arg)>0) print_r($arg);
            elseif(is_object($arg)) print_r($arg);
            else var_dump($arg);

        }
        echo "</pre>";
        if($die===true)	die('Died from dumps helper...');
    }

    /**
     * Printing line break
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param bool $eol
     * @param string $var
     * @param string $br
     * @return void
     */
    public static function println($eol = false, $var ='', $br = '<br/>'){
        if($eol)       echo $var.PHP_EOL;
        else      echo $var.$br;
    }


    /**
     * Dump string in pre tag.
     * @author  Md. Atiqur Rahman
     * @param $var
     * @param bool $die
     * @param null $die_msg
     */
    public static function dumpInPre($var, $die=false, $die_msg=NULL){

        echo '<pre>'.$var.'</pre>';
        if($die===true)	die('Died from dumper'.$die_msg);
    }

    /**
     * Alias of dumpInPre
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param $var
     * @param bool $die
     * @param null $die_msg
     * @return void
     */
    public static function printInPre($var, $die=false, $die_msg=NULL){
        Tools::dumpInPre($var, $die, $die_msg);
    }


    /**
     * @param $conf - An associative array with value as Index/key and label text as array value $arr['car']= 'Select Car'
     * @param $elementName  - name of the select element
     * @param string $selected  - any item should be selected when created pass the value here createSelectBox($arr, 'trans', 'car', , 'class="primary"');
     * @param null $elementId
     * @param null $attributes - extra attributes like class , style etc.
     * @return bool|string
     */
    public static function createSelectBox($conf, $elementName, $selected='', $elementId=NULL, $attributes=NULL){

        if(is_array($conf)){
            $return='<select name="'.$elementName.'" size="1" '.(NULL!=$elementId?' id="'.$elementId.'" ':'').$attributes.' >';
            foreach($conf as $value=>$labelText){
                $return.='<option value="'.$value.'" ';
                if($value== $selected) $return.=' selected ';
                $return.=' >'.$labelText.'</option>';
            }
            $return.='</select>';
            return $return;
        }
        return false;
    }

    /**
     * For echoing output...
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param $array
     * @param $extraHtmlSeparator
     * @return void
     */
    public function mapArray($array, $extraHtmlSeparator=''){

        if(is_array($array)){

            foreach($array as $val){
                echo $val.$extraHtmlSeparator ;
            }
        }else{
            echo $array.$extraHtmlSeparator ;
        }
    }

    /**
     * Find available methods on object of class
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param $object
     * @param bool $die
     * @return void
     */
    public function getMethodList($object, $die=false){

        if(is_object($object)){

            $list= get_class_methods($object);
            sort($list);
            echo '<pre>'; print_r($list); echo '</pre>';

        }else{
            echo 'is not a object. -its '.gettype($object);
        }

        if($die) die('died from method helper......');
    }

    /**
     * Alias of getMethodList
     * @author Md. Atiqur Rahman <atiq.cse.cu0506.su@gmail.com>
     * @since 1.0.0
     * @param $object
     * @param bool $die
     * @return void
     */
    public function getClassMethod($object, $die=false){

        $this->getMethodList($object, $die);
    }


    //--------------in progress work not fully tested there may be even syntax error so when use this class comment from here to end, then use the class-----------------

    public function cleanString($string) {
        $s = trim($string);
        $s = iconv("UTF-8", "UTF-8//IGNORE", $s); // drop all non utf-8 characters

        // this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think
        $s = preg_replace('/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', '-', $s);
        $s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space
        return $s;
    }



    //checked and reviewed....20151203=================

    function check_for_directory()
    {
        //use real_path function
        if (!file_exists($this->directory_name))
        {
            mkdir($this->directory_name,0777);
        }
        @chmod($this->directory_name,0777);
    }

    function listChr(){
        for ($i = 0; $i < 256; ++$i) {
            static $genNum;
            $genNum++;
            echo "chr($genNum) will output '";
            echo (chr($genNum));
            echo "'< br>\n";
        }
    }

    function Encode($txtData, $Level){
        for ($j = 0; $j<$Level; $j++){
            $tmpStr = '';
            for ($i = 0;$i<strlen($txtData);$i++)
                $tmpStr .= ord(substr(strtoupper($txtData), $i, 1));
            $txtData = $tmpStr;
        }
        return (strlen($Level)).$Level.$txtData;
    }

    function Decode($txtData){
        $tmpStr = '';
        $intLevel = substr($txtData, 1, substr($txtData, 0, 1));
        $startStr = substr($txtData, substr($txtData, 0, 1)+1, strlen($txtData));
        for ($j = 0;$j<$intLevel;$j++){
            for ($i = 0;$i<strlen($startStr);$i+=2)
                $tmpStr .= chr(intval(substr($startStr, $i, 2)));
            $startStr = $tmpStr;

            $tmpStr = "";
        }
        return $startStr;
    }

    function ascii2str($str) {
        $arr=array(
            "&#32;"=>' ', "&#33;"=>'!', "&#34;"=>'"', "&#35;"=>'#', "&#36;"=>'$',
            "&#37;"=>'%', "&#38;"=>'&', "&#39;"=>"'", "&#40;"=>'(', "&#41;"=>')',
            "&#42;"=>'*', "&#43;"=>'+', "&#44;"=>',', "&#45;"=>'-', "&#46;"=>'.',
            "&#47;"=>'/', "&#48;"=>'0', "&#49;"=>'1', "&#50;"=>'2', "&#51;"=>'3',
            "&#52;"=>'4', "&#53;"=>'5', "&#54;"=>'6', "&#55;"=>'7', "&#56;"=>'8',
            "&#57;"=>'9', "&#58;"=>':', "&#59;"=>';', "&#60;"=>'<', "&#61;"=>'=',
            "&#62;"=>'>', "&#63;"=>'?', "&#64;"=>'@', "&#65;"=>'A', "&#66;"=>'B',
            "&#67;"=>'C', "&#68;"=>'D', "&#69;"=>'E', "&#70;"=>'F', "&#71;"=>'G',
            "&#72;"=>'H', "&#73;"=>'I', "&#74;"=>'J', "&#75;"=>'K', "&#76;"=>'L',
            "&#77;"=>'M', "&#78;"=>'N', "&#79;"=>'O', "&#80;"=>'P', "&#81;"=>'Q',
            "&#82;"=>'R', "&#83;"=>'S', "&#84;"=>'T', "&#85;"=>'U', "&#86;"=>'V',
            "&#87;"=>'W', "&#88;"=>'X', "&#89;"=>'Y', "&#90;"=>'Z', "&#91;"=>'[',
            "&#92;"=>'\\', "&#93;"=>']', "&#94;"=>'^', "&#95;"=>'_', "&#96;"=>'`',
            "&#97;"=>'a', "&#98;"=>'b', "&#99;"=>'c', "&#100;"=>'d', "&#101;"=>'e',
            "&#102;"=>'f', "&#103;"=>'g', "&#104;"=>'h', "&#105;"=>'i', "&#106;"=>'j',
            "&#107;"=>'k', "&#108;"=>'l', "&#109;"=>'m', "&#110;"=>'n', "&#111;"=>'o',
            "&#112;"=>'p', "&#113;"=>'q', "&#114;"=>'r', "&#115;"=>'s', "&#116;"=>'t',
            "&#117;"=>'u', "&#118;"=>'v', "&#119;"=>'w', "&#120;"=>'x', "&#121;"=>'y',
            "&#122;"=>'z', "&#123;"=>'{', "&#124;"=>'|', "&#125;"=>'}', "&#126;"=>'~'
        );
        return strtr($str,$arr);
    }

    function utfCharToNumber($char) {
        $i = 0;
        $number = '';
        while (isset($char{$i})) {
            $number.= ord($char{$i});
            ++$i;
        }
        return $number;
    }

    function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    //define('DS', DIRECTORY_SEPARATOR); // I always use this short form in my code.

    function copy_r( $path, $dest )
    {
        if( is_dir($path) )
        {
            @mkdir( $dest );
            $objects = scandir($path);
            if( sizeof($objects) > 0 )
            {
                foreach( $objects as $file )
                {
                    if( $file == "." || $file == ".." )
                        continue;
                    // go on
                    if( is_dir( $path.DS.$file ) )
                    {
                        copy_r( $path.DS.$file, $dest.DS.$file );
                    }
                    else
                    {
                        copy( $path.DS.$file, $dest.DS.$file );
                    }
                }
            }
            return true;
        }
        elseif( is_file($path) )
        {
            return copy($path, $dest);
        }
        else
        {
            return false;
        }
    }

    /**
     * Copy file or folder from source to destination, it can do
     * recursive copy as well and is very smart
     * It recursively creates the dest file or directory path if there weren't exists
     * Situtaions :
     * - Src:/home/test/file.txt ,Dst:/home/test/b ,Result:/home/test/b -> If source was file copy file.txt name with b as name to destination
     * - Src:/home/test/file.txt ,Dst:/home/test/b/ ,Result:/home/test/b/file.txt -> If source was file Creates b directory if does not exsits and copy file.txt into it
     * - Src:/home/test ,Dst:/home/ ,Result:/home/test/** -> If source was directory copy test directory and all of its content into dest
     * - Src:/home/test/ ,Dst:/home/ ,Result:/home/**-> if source was direcotry copy its content to dest
     * - Src:/home/test ,Dst:/home/test2 ,Result:/home/test2/** -> if source was directoy copy it and its content to dest with test2 as name
     * - Src:/home/test/ ,Dst:/home/test2 ,Result:->/home/test2/** if source was directoy copy it and its content to dest with test2 as name
     * @todo
     *     - Should have rollback technique so it can undo the copy when it wasn't successful
     *  - Auto destination technique should be possible to turn off
     *  - Supporting callback function
     *  - May prevent some issues on shared enviroments : http://us3.php.net/umask
     * @param $source //file or folder
     * @param $dest ///file or folder
     * @param $options //folderPermission,filePermission
     * @return boolean
     */
    function smartCopy($source, $dest, $options=array('folderPermission'=>0755,'filePermission'=>0755))
    {
        $result=false;

        if (is_file($source)) {
            if ($dest[strlen($dest)-1]=='/') {
                if (!file_exists($dest)) {
                    cmfcDirectory::makeAll($dest,$options['folderPermission'],true);
                }
                $__dest=$dest."/".basename($source);
            } else {
                $__dest=$dest;
            }
            $result=copy($source, $__dest);
            chmod($__dest,$options['filePermission']);

        } elseif(is_dir($source)) {
            if ($dest[strlen($dest)-1]=='/') {
                if ($source[strlen($source)-1]=='/') {
                    //Copy only contents
                } else {
                    //Change parent itself and its contents
                    $dest=$dest.basename($source);
                    @mkdir($dest);
                    chmod($dest,$options['filePermission']);
                }
            } else {
                if ($source[strlen($source)-1]=='/') {
                    //Copy parent directory with new name and all its content
                    @mkdir($dest,$options['folderPermission']);
                    chmod($dest,$options['filePermission']);
                } else {
                    //Copy parent directory with new name and all its content
                    @mkdir($dest,$options['folderPermission']);
                    chmod($dest,$options['filePermission']);
                }
            }

            $dirHandle=opendir($source);
            while($file=readdir($dirHandle))
            {
                if($file!="." && $file!="..")
                {
                    if(!is_dir($source."/".$file)) {
                        $__dest=$dest."/".$file;
                    } else {
                        $__dest=$dest."/".$file;
                    }
                    //echo "$source/$file ||| $__dest<br />";
                    $result=smartCopy($source."/".$file, $__dest, $options);
                }
            }
            closedir($dirHandle);

        } else {
            $result=false;
        }
        return $result;
    }
    //echo Encode('123',4).'<br>';
    //echo Decode(Encode('123',5));
    function getDirectorySize($directory){

        $dirSize=0;

        if(!$dh=opendir($directory))
        {
            return false;
        }

        while($file = readdir($dh))
        {
            if($file == "." || $file == "..")
            {
                continue;
            }

            if(is_file($directory."/".$file))
            {
                $dirSize += filesize($directory."/".$file);
            }

            if(is_dir($directory."/".$file))
            {
                $dirSize += getDirectorySize($directory."/".$file);
            }
        }

        closedir($dh);

        return $dirSize;
    }

    function count_dir_files($dirname){
        $total_files=0;
        if(is_dir($dirname))
        {
            $dp=opendir($dirname);
            if($dp)
            {
                while(($filename=readdir($dp)) == true)
                {
                    if(($filename !=".") && ($filename !=".."))
                    {
                        $total_files++;
                    }
                }
            }
        }
        return $total_files;
    }

    function url_exists($url)
    {
        if((strpos($url, "http")) === false)
        {
            $url = "http://" . $url;
        }
        @$a=get_headers($url);

        if (is_array($a))
        {
            $status=$a[0];
            $statusArr=explode(" ",$status);
            $statusCode=$statusArr[1];
            if(intval($statusCode==200))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    function scanDirectories($rootDir, $allowext, $allData=array()) {
        $dirContent = scandir($rootDir);
        foreach($dirContent as $key => $content) {
            $path = $rootDir.'/'.$content;
            $ext = substr($content, strrpos($content, '.') + 1);

            if(in_array($ext, $allowext)) {
                if(is_file($path) && is_readable($path)) {
                    $allData[] = $path;
                }elseif(is_dir($path) && is_readable($path)) {
                    // recursive callback to open new directory
                    $allData = scanDirectories($path, $allData);
                }
            }
        }
        return $allData;
    }
    /*
     *  $rootDir = "www";
$allowext = array("zip","rar","html");
$files_array = scanDirectories($rootDir,$allowext);
print_r($files_array);
     */


    //NNNIIIinnnjaaa::
//array of files without directories... optionally filtered by extension
    function file_list($d,$x){
        foreach(array_diff(scandir($d),array('.','..')) as $f)
            if(is_file($d.'/'.$f)&&(($x)?ereg($x.'$',$f):1))
                $l[]=$f;

        return $l;
    }

//NNNIIIinnnjaaa::
//array of directories
    function dir_list($d){
        foreach(array_diff(scandir($d),array('.','..')) as $f)if(is_dir($d.'/'.$f))$l[]=$f;
        return $l;
    }


    function find_all_files($dir)
    {
        $root = scandir($dir);
        foreach($root as $value)
        {
            if($value === '.' || $value === '..') {continue;}
            if(is_file("$dir/$value")) {$result[]="$dir/$value";continue;}
            foreach(find_all_files("$dir/$value") as $value)
            {
                $result[]=$value;
            }
        }
        return $result;
    }

    function findFiles($directory, $extensions = array()) {
        $directories = array();
        function glob_recursive($directory, &$directories = array()) {
            foreach(glob($directory, GLOB_ONLYDIR | GLOB_NOSORT) as $folder) {
                $directories[] = $folder;
                glob_recursive("{$folder}/*", $directories);
            }
        }
        glob_recursive($directory, $directories);
        $files = array ();
        foreach($directories as $directory) {
            foreach($extensions as $extension) {
                foreach(glob("{$directory}/*.{$extension}") as $file) {
                    $files[$extension][] = $file;
                }
            }
        }
        return $files;
    }

    function makedirs($dirpath, $mode=0777) {
        return is_dir($dirpath) || mkdir($dirpath, $mode, true);
    }

    // end of raw functions...............................
    //==============================================================================================


    /**
     * Lists files recursively.
     * @author Md. Atiqur Rahman.
     * @param $directory
     * @return array
     */
    function listFilesAndDir($directory){

        $return = array();
        $dKey = end(explode('/',$directory));
        $lst = $this->countDirFiles($directory);

        if($lst['total'] ==0 ){

            if($lst['status']=='error')  $return[$dKey] = '__EmptyDirectory! - '.$lst['msg'];
            else $return[$dKey][] = '__EmptyDirectory!';

        }else{

            if($lst['totalFiles']>0){
                foreach($lst['filesNames'] as $file){
                    $return[$dKey][] = $file;
                }
            }

            if($lst['totalDir']>0){

                foreach($lst['dirNames'] as $dir){
                    $sub = $this->listFilesAndDir($directory.'/'.$dir);
                    $return[$dKey][$dir] = $sub[$dir];
                }
            }
        }

        return $return;

    }

    /**
     * Scanning directory recursive.
     * @author copiedFrom php.org
     * @param $dir
     * @return array
     */
    function dirToArray($dir) {

        $result = array();
        $cDir = scandir($dir);
        foreach ($cDir as $key => $value)
        {
            if (!in_array($value,array(".","..")))
            {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)){

                    $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                }
                else
                {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

    /**
     * Count files and file name.
     * @param $directory
     * @param bool $returnFileName
     * @return array
     */
    function countDirFiles($directory, $returnFileName = true){

        $total=0;
        $totalFiles=0;
        $totalDir=0;
        $return = array();

        if(is_dir($directory))
        {
            $dp=opendir($directory);
            if($dp)
            {
                while(($filename=readdir($dp)) == true)
                {
                    if(($filename !=".") && ($filename !=".."))
                    {
                        $return['scanned'][] = $filename;
                        if(is_file($directory.'/'.$filename)){

                            $totalFiles++;
                            $return['filesNames'][]= $filename;
                        }
                        else{

                            $totalDir++;
                            $return['dirNames'][]= $filename;
                        }
                        $total++;
                    }
                }
                $return['totalFiles'] = $totalFiles;
                $return['totalDir'] = $totalDir;
                $return['total'] = $total;
                $return['status'] = 'ok';

            }else{
                $return['totalFiles'] = $totalFiles;
                $return['totalDir'] = $totalDir;
                $return['total'] = $total;
                $return['msg'] = 'Inaccessible directory.';
                $return['status'] = 'error';
            }
        }else{
            $return['totalFiles'] = $totalFiles;
            $return['total'] = $total;
            $return['msg'] = 'Directory does not exist.';
            $return['status'] = 'error';
        }

        if($returnFileName===true) unset($return['scanned']);
        return $return;
    }
    /**
     * Delete a directory
     * @param $directory - directory to be deleted.
     * @param bool $deleteNonEmptyDir - flag for force delete of non empty directory.
     * @return bool | string
     */
    function deleteDirectory($directory, $deleteNonEmptyDir = false){

        if (!is_dir($directory)){

            return "Directory doesn't exist.";
        }

        $list = scandir($directory);

        if(count($list)>2){

            if($deleteNonEmptyDir!==true)   return 'Non empty directory.';

            if(!$dh=opendir($directory))
            {
                return "Inaccessible directory.!";
            }

            while($file=readdir($dh))
            {
                if($file == "." || $file == "..")
                {
                    continue;
                }

                if(is_dir($directory."/".$file))
                {
                    $this->deleteDirectory($directory."/".$file, $deleteNonEmptyDir);
                }

                if(is_file($directory."/".$file))
                {
                    unlink($directory."/".$file);
                }
            }
            closedir($dh);
        }

        return rmdir($directory);
    }

    /**
     * Check if directory exist, if not exist create the directory
     * @param $dir
     * @param bool $forceCreate
     * @param bool $recursive
     * @param int $mode
     * @return bool
     */
    function checkForDirectory($dir, $forceCreate=true, $recursive = false, $mode = 0777){
        if (!file_exists($dir))
        {
            if($forceCreate){
                return mkdir($dir, $mode, $recursive);
            }
            return false;
        }
        return true;
    }



    /**
     * todo - need to improve
     * @param $arrFilter
     * @return string
     */
    function processKendoFilters($arrFilter){
        $logic= strtolower($arrFilter['logic']);
        $clause=' ';
        switch($logic){

            case 'and':
                $clause .= self:: processKendoClause($arrFilter['filters']);
                break;
            default :
                die('something wrong happened!');
        }
        return $clause ;
    }

    /**
     * todo - need to improve
     * @param $filters
     * @param string $logic
     * @return string
     */
    function processKendoClause($filters, $logic='AND'){

        $separator ='';
        $clause = '';
        foreach($filters as $flt){
            switch($flt['operator']){
                case 'contains': $clause .= $separator."$flt[field] LIKE '%$flt[value]%'"; break;
                case 'doesnotcontain': $clause .= $separator."$flt[field] NOT LIKE '%$flt[value]%'"; break;
                case 'startswith': $clause .= $separator."$flt[field] LIKE '$flt[value]%'"; break;
                case 'endswith': $clause .= $separator."$flt[field] LIKE '%$flt[value]'"; break;

                case 'eq': $clause .= $separator."$flt[field] = '$flt[value]'"; break;
                case 'gte': $clause .= $separator."$flt[field] >= '$flt[value]'"; break;
                case 'lt': $clause .= $separator."$flt[field] < '$flt[value]'"; break;
                case 'lte': $clause .= $separator."$flt[field] <= '$flt[value]'"; break;
                case 'neq': $clause .= $separator."$flt[field] != '$flt[value]'"; break;
            }
            $separator = " $logic ";
        }
        return $clause;
    }

}





