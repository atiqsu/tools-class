<code>
<form method="post" action="myform.php" id="myform">
  ... form items here ...

<input type="submit" name="enter_key" value="true" style="display:none">
<input type="hidden" name="pressed_button" id="pressed_button" value="false">
<input type="button" value="Submit"
  onclick="document.getElementById('pressed_button').value='true';document.getElementById('myform').submit();">
</form>

In myform.php:

if ($_POST['pressed_button']=='false') {
   // Logic for enter key
} else {
   // Logic for button press
}
</code>
<br/>----------------------------------------------------------------<br/>
<code>
<input type="submit" name="action" value="Edit">
<input type="submit" name="action" value="Preview">
<input type="submit" name="action" value="Post">

The $_POST array (or $_GET/$_REQUEST) will contain the key "action" with the value of the enacted button (whether clicked or not).
</code>
<br>

<br/>----------------------------------------------------------------<br/>
<br>
<code>
var fireOnThis = document.getElementById('someID');
var evObj = document.createEvent('MouseEvents');
evObj.initEvent( 'click', true, true );
fireOnThis.dispatchEvent(evObj);

var fireOnThis = document.getElementById('someID');
var evObj = document.createEvent('MouseEvents');
evObj.initMouseEvent( 'click', true, true, window, 1, 12, 345, 7, 220, false, false, true, false, 0, null );
fireOnThis.dispatchEvent(evObj);

var fireOnThis = document.getElementById('someID');
if( window.KeyEvent ) {
  var evObj = document.createEvent('KeyEvents');
  evObj.initKeyEvent( 'keyup', true, true, window, false, false, false, false, 13, 0 );
} else {
  var evObj = document.createEvent('UIEvents');
  evObj.initUIEvent( 'keyup', true, true, window, 1 );
  evObj.keyCode = 13;
}
fireOnThis.dispatchEvent(evObj);
</code>
<br>

<br/><br/>----------------------------------------------------------------<br/>
<br/>
<code>
button looks like link <br/>
button.link {
    display:inline-block;
    position:relative;
    background-color: transparent;
    cursor: pointer;
    border:0;
    padding:0;
    color:#00f;
    text-decoration:underline;
}</code>
<br>

<br/><br/>----------------------------------------------------------------<br/>
<br/>
<br>

<code>
window.location.href = '/#'
</code><br>

<br/><br/>----------------------------------------------------------------<br/>
<br/>
<br>
<code>
<code class="js plain">&lt;!DOCTYPE HTML&gt;</code>
<code class="js plain">&lt;html&gt;</code>
<div class="line number3 index2 alt2"><code class="js plain">&lt;head&gt;</code></div>
<div class="line number4 index3 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>
<code class="js plain">&lt;script type=</code>
<code class="js string">"text/javascript"</code>
 <code class="js plain">charset=</code>
 <code class="js string">"utf-8"</code>
 <code class="js plain">&gt;</code></div>
 <div class="line number5 index4 alt2"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js keyword">function</code> 
 <code class="js plain">init() {</code></div>
 <div class="line number6 index5 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js keyword">var</code> 
 
 <code class="js plain">toc = document.getElementById(</code><code class="js string">"toc"</code>
 <code class="js plain">);</code></div>
 
 <div class="line number7 index6 alt2"><code class="js spaces">&nbsp;&nbsp;&nbsp;</code>
 <code class="js keyword">var</code> <code class="js plain">i, li, newAnchor;</code></div>
 
 <div class="line number8 index7 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;</code>
 <code class="js keyword">for</code> 
 <code class="js plain">(i = 0; i &lt; document.anchors.length; i++) {</code>
 </div><div class="line number9 index8 alt2">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">li = document.createElement(</code><code class="js string">"li"</code>
 <code class="js plain">);</code></div><div class="line number10 index9 alt1">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">newAnchor = document.createElement(</code><code class="js string">'a'</code>
 <code class="js plain">);</code></div><div class="line number11 index10 alt2">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">newAnchor.href = </code><code class="js string">"#"</code> 
 <code class="js plain">+ document.anchors[i].name;</code></div>
 <div class="line number12 index11 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">newAnchor.innerHTML = document.anchors[i].text;</code></div>
 <div class="line number13 index12 alt2">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">li.appendChild(newAnchor);</code></div><div class="line number14 index13 alt1">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">toc.appendChild(li);</code></div><div class="line number15 index14 alt2">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">}</code></div><div class="line number16 index15 alt1">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="js plain">}</code></div>
 <div class="line number17 index16 alt2">&nbsp;</div><div class="line number18 index17 alt1">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="js plain">&lt;/script&gt;</code>
 </div><div class="line number19 index18 alt2"><code class="js plain">&lt;/head&gt;</code></div>
 <div class="line number20 index19 alt1"><code class="js plain">&lt;body onload=</code>
 <code class="js string">"init()"</code><code class="js plain">&gt;</code></div>
 <div class="line number21 index20 alt2">&nbsp;</div><div class="line number22 index21 alt1">
 <code class="js plain">&lt;h1&gt;Title&lt;/h1&gt;</code></div><div class="line number23 index22 alt2">
 <code class="js plain">&lt;a name=</code><code class="js string">"contents"</code>
 <code class="js plain">&gt;&lt;h2&gt;Contents&lt;/h2&gt;&lt;/a&gt;</code></div>
 <div class="line number24 index23 alt1"><code class="js plain">&lt;ul id=</code>
 <code class="js string">"toc"</code><code class="js plain">&gt;&lt;/ul&gt;</code></div>
 <div class="line number25 index24 alt2">&nbsp;</div><div class="line number26 index25 alt1">
 <code class="js plain">&lt;a name=</code><code class="js string">"plants"</code>
 <code class="js plain">&gt;&lt;h2&gt;Plants&lt;/h2&gt;&lt;/a&gt;</code></div>
 <div class="line number27 index26 alt2"><code class="js plain">&lt;ol&gt;</code></div>
 <div class="line number28 index27 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">&lt;li&gt;Apples&lt;/li&gt;</code></div><div class="line number29 index28 alt2">
 <code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code> 
 <code class="js plain">&lt;li&gt;Oranges&lt;/li&gt;</code>
 </div><div class="line number30 index29 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">&lt;li&gt;Pears&lt;/li&gt;</code></div><div class="line number31 index30 alt2">
 <code class="js plain">&lt;/ol&gt;</code></div><div class="line number32 index31 alt1">&nbsp;</div>
 <div class="line number33 index32 alt2"><code class="js plain">&lt;a name=</code>
 <code class="js string">"veggies"</code><code class="js plain">&gt;&lt;h2&gt;Veggies&lt;/h2&gt;&lt;/a&gt;</code>
 </div><div class="line number34 index33 alt1"><code class="js plain">&lt;ol&gt;</code></div>
 <div class="line number35 index34 alt2"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">&lt;li&gt;Carrots&lt;/li&gt;</code></div>
 <div class="line number36 index35 alt1"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">&lt;li&gt;Celery&lt;/li&gt;</code></div>
 <div class="line number37 index36 alt2"><code class="js spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>
 <code class="js plain">&lt;li&gt;Beats&lt;/li&gt;</code></div><div class="line number38 index37 alt1">
 <code class="js plain">&lt;/ol&gt;</code></div><div class="line number39 index38 alt2">&nbsp;</div>
 <div class="line number40 index39 alt1"><code class="js plain">&lt;/body&gt;</code></div>
 <div class="line number41 index40 alt2"><code class="js plain">&lt;/html&gt;</code>
<br/></div>
This is for finding all anchors
</code><br>

<br/><br/>----------------------------------------------------------------<br/>
<br/>
<h2>Heres how to list all files in a directory</h2><br/>
//path to directory to scan<br/>
$directory = "index_files/";<br/>
 
//get all files in specified directory<br/>
$files = glob($directory . "*");<br/>
 
//print each file name<br/>
foreach($files as $file)<br/>
{
 //check to see if the file is a folder/directory<br/>
 if(is_dir($file))
 {
  echo $file;
 }
}
<br/>

<code>
$directory = "../images/team/harry/";
if (glob($directory . "*.jpg") != false)
{
 $filecount = count(glob($directory . "*.jpg"));
 echo $filecount;
}
else
{
 echo 0;
}

</code><br>

<code>
I am a new in PHP but i try Your code thanks.
Modified code for directory Listing

<php
$sno = 1;
echo count(glob('*.*'));
echo " Files�;
foreach(glob(�*.*�) as $file)
{echo �$sno. $file\n�;$sno++;}
>

</code>
<code>

</code>
<code>

</code>
<code>

</code>
<code>

</code>
<code>

</code>
<code>

</code>
<br/><br/>----------------------------------------------------------------<br/>
<br/>
Showing selected amount of words from user input<br/>
<code>/ sentence teaser
// this function will cut the string by how many words you want
function word_teaser($string, $count){
  $original_string = $string;
  $words = explode(' ', $original_string);
 
  if (count($words) > $count){
   $words = array_slice($words, 0, $count);
   $string = implode(' ', $words);
  }
 
  return $string;
}
 
// sentence reveal teaser
// this function will get the remaining words
function word_teaser_end($string, $count){
 $words = explode(' ', $string);
 $words = array_slice($words, $count);
 $string = implode(' ', $words);
  return $string;
}

</code>
<br/><br/>----------------------------------------------------------------<br/>
<br/>
How to check if file exists on a different domain<br/>
<code>

$image = "http://www.example.co.uk/images/1.jpg";
$handle = @fopen("$image", "r");
if(strpos($handle, "Resource id") !== false)
{
echo "file does exist";
}
else
{
echo "file does not exist";
}
</code>
better.....
<code>
$url = "http://www.example.com/index.php";
$header_response = get_headers($url, 1);
if ( strpos( $header_response[0], "404" ) !== false )
{
  // FILE DOES NOT EXIST
} 
else 
{
  // FILE EXISTS!!
}
</code>

<code>

</code>

<code>

</code>
<code>

</code>
<code>

</code>
<code>

</code>
<code>

</code>
<br/><br/>----------------------------------------------------------------<br/>
<br/>
<h2> Selecting all href of a page
<code>
getElementByTagName gives you a nodelist (an array of nodes).

var a = document.getElementsByTagName('a');

for (var idx= 0; idx < a.length; ++idx){
    console.log(a[idx].href);
}

I really suggest that you use a frame work for this, like jquery. It makes your life so much easier.

Example with jquery:

$("a").each(function(){
  console.log(this.href);
});


</code>
<code>

</code>

<br/><br/>----------------------------------------------------------------<br/>
<br/>
<h3>  </h3>
<h3>  </h3>
<h3>Loading from another page using getelementsbyid  </h3>
<code>
!DOCTYPE html>
html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
jQuery(function($){
	$('#result').load('Page2.html #intro');
});
</script>
</head>
<body>
<div id="result"></div>
<div>Other Stuff Here</div>
</body>
/html>
</code>
<code>

</code>


<br/><br/>----------------------------------------------------------------<br/>
<br/>
<code>
<input type="checkbox" name="checkbox[1]" />
<input type="checkbox" name="checkbox[2]" />
<input type="checkbox" name="checkbox[3]" />
<input type="checkbox" name="checkbox[4]" />

Let's say the user checks 1 and 3. Then they submit. On the PHP side, you'll see this:

$all_checked_boxes = $_REQUEST['checkbox'];
foreach($all_checked_boxes as $id=>$blah)
{
echo "$id was checked!";
}

You should see "1 was checked! 3 was checked!"

I hope that helps. 
</code>


<code>

</code>




<br/><br/>----------------------------------------------------------------<br/>
<br/>
<code>

</code>


<code>

</code>




<br/>----------------------------------------------------------------<br/>
<code>

</code>


<code>

</code>


<code>

</code>




<br/>----------------------------------------------------------------<br/>
<code>

</code>


<code>

</code>


<code>

</code>




<br/>----------------------------------------------------------------<br/>
<code>

</code>


<code>

</code>


<code>

</code>


<code>

</code>



<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>
<br/>----------------------------------------------------------------<br/>






