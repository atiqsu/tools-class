<!DOCTYPE html>
<html>
<head>
<title> All methods and event </title>
<head>
<body>
------------------------------------------------------------------------------------




<h2>Some DOM Object Methods</h2>
<p>Here are some of the (most common) methods you will learn about in this tutorial:</p>
<table class="reference notranslate">
<tbody><tr>
<th align="left" width="33%">Method</th>
<th align="left">Description</th>
</tr>
<tr>
	<td>getElementById()</td>
	<td>Returns the element that has an ID attribute with the a value</td>
</tr>
<tr>
	<td>getElementsByTagName()</td>
	<td>Returns a node list (collection/array of nodes) containing all elements with 
	a specified tag name</td>
</tr>
	<tr>
	<td>getElementsByClassName()</td>
	<td>Returns a node list containing all elements with a specified class</td>
	</tr>

<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<tr>
	<td>appendChild()</td>
	<td>Adds a new child node to a specified node</td>
</tr>
<tr>
	<td>removeChild()</td>
	<td>Removes a child node</td>
</tr>
<tr>
	<td>replaceChild()</td>
	<td>Replaces a child node</td>
</tr>
	<tr>
	<td>insertBefore()</td>
	<td>Inserts a new child node before a specified child node</td>
	</tr>
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>createAttribute()</td>
	<td>Creates an Attribute node</td>
</tr>
<tr>
	<td>createElement()</td>
	<td>Creates an Element node</td>
</tr>
<tr>
	<td>createTextNode()</td>
	<td>Creates a Text node</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>getAttribute()</td>
	<td>Returns the specified attribute value</td>
</tr>
<tr>
	<td>setAttribute()</td>
	<td>Sets or changes the specified attribute, to the specified value</td>
</tr>

</tbody></table>
<br/>

------------------------------------------------------------------------------------

<h2>The nodeName Property</h2>
<p>The nodeName property specifies the name of a node.</p>
<ul>
	<li>nodeName is read-only</li>
	<li>nodeName of an element node is the same as the tag name</li>
	<li>nodeName of an attribute node is the attribute name</li>
	<li>nodeName of a text node is always #text</li>
	<li>nodeName of the document node is always #document</li>
</ul>
<p><b>Note:</b> nodeName always contains the uppercase tag name of an HTML element.</p>
<hr>

<h2>The nodeValue Property</h2>
<p>The nodeValue property specifies the value of a node.</p>
<ul>
	<li>nodeValue for element nodes is undefined</li>
	<li>nodeValue for text nodes is the text itself</li>
	<li>nodeValue for attribute nodes is the attribute value</li>
</ul>
<hr>


<div class="example_code notranslate">
&lt;html&gt;<br>
&lt;body&gt;<br>
<br>
&lt;p id="intro"&gt;Hello World!&lt;/p&gt;<br>
<br>
&lt;script type="text/javascript"&gt;<br>
x=document.getElementById("intro");<br>
document.write(x.firstChild.nodeValue);<br>
&lt;/script&gt;<br>
<br>
&lt;/body&gt;<br>
&lt;/html&gt;</div>
<br>
<p>The most important node types are:</p>

<table class="reference notranslate">
<tbody><tr>
<th align="left" valign="top" width="85%">Element type</th>
<th align="left" valign="top" width="15%">NodeType</th>
</tr>
<tr>
	<td valign="top">Element</td>
	<td valign="top">1</td>
</tr>
<tr>
	<td valign="top">Attribute</td>
	<td valign="top">2</td>
</tr>
<tr>
	<td valign="top">Text</td>
	<td valign="top">3</td>
</tr>
<tr>
	<td valign="top">Comment</td>
	<td valign="top">8</td>
</tr>
<tr>
	<td valign="top">Document</td>
	<td valign="top">9</td>
</tr>
</tbody></table>
<br><br>

------------------------------------------------------------------------------------

<h2>Accessing HTML Elements (Nodes)</h2>
<p>Accessing an HTML element is the same as accessing a Node.</p>
<p>You can access an HTML element in different ways:</p>
<ul>
	<li>By using the getElementById() method</li>
	<li>By using the getElementsByTagName() method</li>
	<li>By using the getElementsByClassName() method</li>
</ul>
<hr>

<h2>The getElementById() Method</h2>
<p>The getElementById() method returns the element with the specified ID:</p>

<h3>Syntax</h3>
<div class="code notranslate"><div>
<i>node</i>.getElementById(<i>"id"</i>);</div></div>
<br/><br/>
<h2>The getElementsByTagName() Method</h2>
<p>getElementsByTagName() returns all elements with a specified tag name.</p>
<h3>Syntax</h3>
<div class="code notranslate"><div>

<i>node</i>.getElementsByTagName(<i>"tagname"</i>);

</div></div>
<p>The following example returns a list of all &lt;p&gt; elements in the document:</p>
<p>The following example returns a list of all &lt;p&gt; elements that are descendants 
(children, grand-children, etc.) of 
the element with id="main":</p>
document.getElementById("main").getElementsByTagName("p");

<h2>The getElementsByClassName() Method</h2>

<p>If you want to find all HTML elements with the same class name. Use this  
method:<br>
</p>

<div class="code notranslate">
<div>
document.getElementsByClassName("intro");</div>
</div>

<textarea style="width: 482px;" class="code_input" id="pre_code" wrap="logical">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

&lt;p&gt;Hello World!&lt;/p&gt;

&lt;div id="main"&gt;
&lt;p&gt;The DOM is very useful.&lt;/p&gt;
&lt;p&gt;This example demonstrates the &lt;b&gt;getElementsByTagName&lt;/b&gt; method&lt;/p&gt;
&lt;/div&gt;

&lt;script&gt;
x=document.getElementById("main").getElementsByTagName("p");
document.write("First paragraph inside the div: " + x[0].innerHTML);
&lt;/script&gt;

&lt;/body&gt;
&lt;/html&gt;

</textarea>
<hr/>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

&lt;p id="p1"&gt;Hello world!&lt;/p&gt;
&lt;p id="p2"&gt;Hello world!&lt;/p&gt;

&lt;script&gt;
document.getElementById("p2").style.color="blue";
document.getElementById("p2").style.fontFamily="Arial";
document.getElementById("p2").style.fontSize="larger";
&lt;/script&gt;

&lt;/body&gt;
&lt;/html&gt;
<textarea style="width: 482px;" class="code_input" id="pre_code" wrap="logical">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

&lt;p id="p1"&gt;Hello world!&lt;/p&gt;
&lt;p id="p2"&gt;Hello world!&lt;/p&gt;

&lt;script&gt;
document.getElementById("p2").style.color="blue";
document.getElementById("p2").style.fontFamily="Arial";
document.getElementById("p2").style.fontSize="larger";
&lt;/script&gt;

&lt;/body&gt;
&lt;/html&gt;

</textarea>
<hr/>
------------------------------------------------------------------------------------

<h2>Creating New HTML Elements</h2>
<p>To add a new element to the HTML DOM, you must create the element (element node) first, 
and then append it to an existing element. </p>
<div class="example_code notranslate">
&lt;div id="d1"&gt;<br>
&lt;p id="p1"&gt;This is a paragraph.&lt;/p&gt;<br>
&lt;p id="p2"&gt;This is another paragraph.&lt;/p&gt;<br>
&lt;/div&gt;<br><br>&lt;script&gt;<br>
var para=document.createElement("p");<br>
var node=document.createTextNode("This is new.");<br>
para.appendChild(node);<br><br>
	var
element=document.getElementById("d1");<br>
element.appendChild(para);<br>
&lt;/script&gt;</div>
<br>

<textarea style="width: 482px;" class="code_input" id="pre_code" wrap="logical">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

&lt;input type="button"
onclick="document.body.style.backgroundColor='lavender';"
value="Change background color"&gt;

&lt;/body&gt;
&lt;/html&gt;

</textarea>
<div class="example_code notranslate">
&lt;div id="div1"&gt;<br>
&lt;p id="p1"&gt;This is a paragraph.&lt;/p&gt;<br>
&lt;p id="p2"&gt;This is another paragraph.&lt;/p&gt;<br>
&lt;/div&gt;<br><br>&lt;script&gt;<br>
var para=document.createElement("p");<br>
var node=document.createTextNode("This is new.");<br>
para.appendChild(node);<br><br>
	var
element=document.getElementById("div1");<br>
element.appendChild(para);<br>
&lt;/script&gt;</div>
<br>
------------------------------------------------------------------------------------

<h2>Example Explained&nbsp;</h2>
<p>This code creates a new &lt;p&gt; element:</p>

<div class="code notranslate">
<div>
var para=document.createElement("p");</div>
</div>
<p>To add text to the &lt;p&gt; element, you must create a text node first. This code creates a text node:</p>

<div class="code notranslate">
<div>
var node=document.createTextNode("This is a new paragraph.");</div>
</div>
<p>Then you must append the text node to the &lt;p&gt; element:</p>

<div class="code notranslate">
<div>
	para.appendChild(node);</div>
</div>
<p>Finally you must append the new element to an existing element.</p>
<p>This code finds an existing element:</p>

<div class="code notranslate">
<div>
	var
	element=document.getElementById("div1");</div>
</div>
<p>This code appends the new element to the existing element:</p>

<div class="code notranslate">
<div>
	element.appendChild(para);</div>
</div>
<br>
<hr>
<h2>Creating new HTML Elements - insertBefore()</h2>
<p>The appendChild() method in the previous example, appended the new element as 
the last child of the parent.</p>
<p>If you don't want that you can use the insertBefore() method: </p>

<div class="example_code notranslate">
&lt;div id="div1"&gt;<br>
&lt;p id="p1"&gt;This is a paragraph.&lt;/p&gt;<br>
&lt;p id="p2"&gt;This is another paragraph.&lt;/p&gt;<br>
&lt;/div&gt;<br><br>&lt;script&gt;<br>
	var para=document.createElement("p");<br>var node=document.createTextNode("This 
	is new.");<br>para.appendChild(node);<br><br>var element=document.getElementById("div1");<br>
	var child=document.getElementById("p1");<br>element.insertBefore(para,child);<br>
&lt;/script&gt;</div>
<br>
<br>
<hr>
<h2>Removing Existing HTML Elements</h2>
<p>To remove an HTML element, you must know the parent of the element:</p>
<div class="example_code notranslate">
&lt;div id="div1"&gt;<br>
&lt;p id="p1"&gt;This is a paragraph.&lt;/p&gt;<br>
&lt;p id="p2"&gt;This is another paragraph.&lt;/p&gt;<br>
&lt;/div&gt;<p>&lt;script&gt;<br>
var parent=document.getElementById("div1");<br>
var child=document.getElementById("p1");<br>
parent.removeChild(child);<br>
&lt;/script&gt;</p></div>
<br>
<h2>Example Explained&nbsp;</h2>
<p>This HTML document contains a &lt;div&gt; element with two child nodes (two &lt;p&gt; 
elements):</p>

<div class="code notranslate">
<div>
&lt;div id="div1"&gt;<br>
&lt;p id="p1"&gt;This is a paragraph.&lt;/p&gt;<br>
&lt;p id="p2"&gt;This is another paragraph.&lt;/p&gt;<br>
&lt;/div&gt;</div>
</div>
<p>Find the element with id="div1":</p>

<div class="code notranslate">
<div>
var parent=document.getElementById("div1");</div>
</div>
<p>Find the &lt;p&gt; element with id="p1":</p>

<div class="code notranslate">
<div>
var child=document.getElementById("p1");</div>
</div>
<p>Remove the child from the parent:</p>

<div class="code notranslate">
<div>
parent.removeChild(child);</div>
</div>
<br>
var child=document.getElementById("p1");<br>child.parentNode.removeChild(child);

<h2>Replacing HTML Elements&nbsp;</h2>
<p>To replace an element to the HTML DOM, use the replaceChild() method:</p>
<div class="example">
<h2 class="example">Example</h2>
<div class="example_code notranslate">
&lt;div id="div1"&gt;<br>
&lt;p id="p1"&gt;This is a paragraph.&lt;/p&gt;<br>
&lt;p id="p2"&gt;This is another paragraph.&lt;/p&gt;<br>
&lt;/div&gt;<br><br>&lt;script&gt;<br>
	var para=document.createElement("p");<br>
var node=document.createTextNode("This is new.");<br>para.appendChild(node);<br>
	<br>var parent=document.getElementById("div1");<br>var child=document.getElementById("p1");<br>parent.replaceChild(para,child);<br>
&lt;/script&gt;</div></div>
<br>
------------------------------------------------------------------------------------

<textarea style="width: 482px;" class="code_input" id="pre_code" wrap="logical">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

&lt;h1 onclick="this.innerHTML='Ooops!'"&gt;Click on this text!&lt;/h1&gt;

&lt;/body&gt;
&lt;/html&gt;

</textarea>
------------------------------------------------------------------------------------
The HTML DOM allows you to assign events to HTML elements using JavaScript:<br/>
document.getElementById("myBtn").onclick=function(){displayDate()};
<textarea style="width: 482px;" class="code_input" id="pre_code" wrap="logical">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body onload="checkCookies()"&gt;

&lt;script&gt;
function checkCookies()
{
if (navigator.cookieEnabled==true)
	{
	alert("Cookies are enabled")
	}
else
	{
	alert("Cookies are not enabled")
	}
}
&lt;/script&gt;

&lt;p&gt;An alert box should tell you if your browser has enabled cookies or not.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt; 

</textarea><br/>
<textarea style="width: 482px;" class="code_input" id="pre_code" wrap="logical">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;script&gt;
function myFunction()
{
var x=document.getElementById("fname");
x.value=x.value.toUpperCase();
}
&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;

Enter your name: &lt;input type="text" id="fname" onchange="myFunction()"&gt;
&lt;p&gt;When you leave the input field, a function is triggered which transforms the input text to upper case.&lt;/p&gt;

&lt;/body&gt;
&lt;/html&gt;

</textarea><br/>
<textarea style="width: 482px;" class="code_input" id="pre_code" wrap="logical">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

&lt;div onmouseover="mOver(this)" onmouseout="mOut(this)" style="background-color:#D94A38;width:120px;height:20px;padding:40px;"&gt;Mouse Over Me&lt;/div&gt;

&lt;script&gt;
function mOver(obj)
{
obj.innerHTML="Thank You"
}

function mOut(obj)
{
obj.innerHTML="Mouse Over Me"
}
&lt;/script&gt;

&lt;/body&gt;
&lt;/html&gt; 

</textarea>
<textarea style="width: 482px;" class="code_input" id="pre_code" wrap="logical">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

&lt;p&gt;Hello World!&lt;/p&gt;
&lt;div&gt;
&lt;p&gt;The DOM is very useful!&lt;/p&gt;
&lt;p&gt;This example demonstrates the &lt;b&gt;document.body&lt;/b&gt; property.&lt;/p&gt;
&lt;/div&gt;

&lt;script&gt;
alert(document.body.innerHTML);
&lt;/script&gt;

&lt;/body&gt;
&lt;/html&gt;

</textarea>
------------------------------------------------------------------------------------

<h2 class="example">Example</h2>
<div class="example_code notranslate">
&lt;html&gt;<br>
&lt;body&gt;<br><br>
&lt;p id="intro"&gt;Hello World!&lt;/p&gt;<br><br>
&lt;script&gt;<br>
var
txt=document.getElementById("intro").childNodes[0].nodeValue;<br>
document.write(txt);<br>
&lt;/script&gt;<br><br>
&lt;/body&gt;<br>
&lt;/html&gt;</div>
<br>

------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



------------------------------------------------------------------------------------



<p>Note that the event classification above is not exactly the same as W3C's classification.</p>
<table class="wikitable">
<tbody><tr>
<th>Category</th>
<th><a href="#DOM_Level_2">Type</a></th>
<th><a href="#DOM_Level_0">Attribute</a></th>
<th>Description</th>
<th>Bubbles</th>
<th>Cancelable</th>
</tr>
<tr>
<td rowspan="7">Mouse</td>
<td>click</td>
<td>onclick</td>
<td>Fires when the <a href="/wiki/Pointing_device" title="Pointing device">pointing device</a> button is clicked over an element. A click is defined as a mousedown and mouseup over the same screen location. The sequence of these events is:
<ul>
<li>mousedown</li>
<li>mouseup</li>
<li>click</li>
</ul>
</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>dblclick</td>
<td>ondblclick</td>
<td>Fires when the pointing device button is <a href="/wiki/Double_click" title="Double click" class="mw-redirect">double clicked</a> over an element</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>mousedown</td>
<td>onmousedown</td>
<td>Fires when the pointing device button is pressed over an element</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>mouseup</td>
<td>onmouseup</td>
<td>Fires when the pointing device button is released over an element</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td><a href="/wiki/Mouseover" title="Mouseover">mouseover</a></td>
<td>onmouseover</td>
<td>Fires when the pointing device is moved onto an element</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>mousemove</td>
<td>onmousemove</td>
<td>Fires when the pointing device is moved while it is over an element</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>mouseout</td>
<td>onmouseout</td>
<td>Fires when the pointing device is moved away from an element</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td rowspan="3">Keyboard</td>
<td>keydown</td>
<td>onkeydown</td>
<td>Fires before keypress, when a key on the keyboard is pressed.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>keypress</td>
<td>onkeypress</td>
<td>Fires after keydown, when a key on the keyboard is pressed.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>keyup</td>
<td>onkeyup</td>
<td>Fires when a key on the keyboard is released</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td rowspan="6"><a href="/wiki/Framing_(World_Wide_Web)" title="Framing (World Wide Web)">HTML frame</a>/object</td>
<td>load</td>
<td>onload</td>
<td>Fires when the <a href="/wiki/User_agent" title="User agent">user agent</a> finishes loading all content within a document, including window, frames, objects and images
<p>For elements, it fires when the target element and all of its content has finished loading</p>
</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>unload</td>
<td>onunload</td>
<td>Fires when the user agent removes all content from a window or frame
<p>For elements, it fires when the target element or any of its content has been removed</p>
</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>abort</td>
<td>onabort</td>
<td>Fires when an object/image is stopped from loading before completely loaded</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>error</td>
<td>onerror</td>
<td>Fires when an object/image/frame cannot be loaded properly</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>resize</td>
<td>onresize</td>
<td>Fires when a document view is resized</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>scroll</td>
<td>onscroll</td>
<td>Fires when a document view is scrolled</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td rowspan="6"><a href="/wiki/Form_(web)" title="Form (web)" class="mw-redirect">HTML form</a></td>
<td>select</td>
<td>onselect</td>
<td>Fires when a user selects some text in a <a href="/wiki/Text_box" title="Text box">text field</a>, including input and textarea</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>change</td>
<td>onchange</td>
<td>Fires when a control loses the input <a href="/wiki/Focus_(computing)" title="Focus (computing)">focus</a> and its value has been modified since gaining focus</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>submit</td>
<td>onsubmit</td>
<td>Fires when a form is submitted</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>reset</td>
<td>onreset</td>
<td>Fires when a form is reset</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>focus</td>
<td>onfocus</td>
<td>Fires when an element receives focus either via the pointing device or by <a href="/wiki/Tab_order" title="Tab order" class="mw-redirect">tab navigation</a></td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>blur</td>
<td>onblur</td>
<td>Fires when an element loses focus either via the pointing device or by <a href="/wiki/Tabbing_navigation" title="Tabbing navigation">tabbing navigation</a></td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td rowspan="3">User interface</td>
<td>focusin</td>
<td>(none)</td>
<td>Similar to HTML focus event, but can be applied to any focusable element</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>focusout</td>
<td>(none)</td>
<td>Similar to HTML blur event, but can be applied to any focusable element</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>DOMActivate</td>
<td>(none)</td>
<td>Similar to XUL command event. Fires when an element is activated, for instance, through a mouse click or a keypress.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td rowspan="7">Mutation</td>
<td>DOMSubtreeModified</td>
<td>(none)</td>
<td>Fires when the subtree is modified</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>DOMNodeInserted</td>
<td>(none)</td>
<td>Fires when a node has been added as a child of another node</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>DOMNodeRemoved</td>
<td>(none)</td>
<td>Fires when a node has been removed from a DOM-tree</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>DOMNodeRemovedFromDocument</td>
<td>(none)</td>
<td>Fires when a node is being removed from a document</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>DOMNodeInsertedIntoDocument</td>
<td>(none)</td>
<td>Fires when a node is being inserted into a document</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>DOMAttrModified</td>
<td>(none)</td>
<td>Fires when an attribute has been modified</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>DOMCharacterDataModified</td>
<td>(none)</td>
<td>Fires when the character data has been modified</td>
<td>Yes</td>
<td>No</td>
</tr>
</tbody></table>



------------------------------------------------------------------------------------

<table class="wikitable">
<tbody><tr>
<th>Category</th>
<th>Type</th>
<th>Attribute</th>
<th>Description</th>
<th>Bubbles</th>
<th>Cancelable</th>
</tr>
<tr>
<td rowspan="6">Touch</td>
<td>touchstart</td>
<td></td>
<td>Fires when a finger is placed on the touch surface/screen.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>touchend</td>
<td></td>
<td>Fires when a finger is removed from the touch surface/screen.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>touchmove</td>
<td></td>
<td>Fires when a finger already placed on the screen is moved across the screen.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>touchenter</td>
<td></td>
<td>Fires when a touch point moves onto the interactive area defined by a DOM element.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>touchleave</td>
<td></td>
<td>Fires when a touch point moves off the interactive area defined by a DOM element.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>touchcancel</td>
<td></td>
<td>A <a href="/wiki/User_agent" title="User agent">user agent</a> must dispatch this event type to indicate when a TouchPoint has been disrupted in an implementation-specific manner, such as by moving outside the bounds of the UA window. A user agent may also dispatch this event type when the user places more touch points (The coordinate point at which a pointer (e.g. finger or stylus) intersects the target surface of an interface) on the touch surface than the device or implementation is configured to store, in which case the earliest TouchPoint object in the TouchList should be removed.<sup id="cite_ref-w3c_v2_1-1" class="reference"><a href="#cite_note-w3c_v2-1"><span>[</span>1<span>]</span></a></sup><sup class="reference" style="white-space:nowrap;">:§5.9</sup></td>
<td>Yes</td>
<td>No</td>
</tr>
</tbody></table>



------------------------------------------------------------------------------------


<table class="wikitable">
<tbody><tr>
<th>Category</th>
<th>Type</th>
<th>Attribute</th>
<th>Description</th>
<th>Bubbles</th>
<th>Cancelable</th>
</tr>
<tr>
<td rowspan="6">Clipboard</td>
<td>cut</td>
<td>oncut</td>
<td>Fires after a selection is cut to the clipboard.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>copy</td>
<td>oncopy</td>
<td>Fires after a selection is copied to the clipboard.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>paste</td>
<td>onpaste</td>
<td>Fires after a selection is pasted from the clipboard.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>beforecut</td>
<td>onbeforecut</td>
<td>Fires before a selection is cut to the clipboard.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>beforecopy</td>
<td>onbeforecopy</td>
<td>Fires before a selection is copied to the clipboard.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>beforepaste</td>
<td>onbeforepaste</td>
<td>Fires before a selection is pasted from the clipboard.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td rowspan="11">Data binding</td>
<td>afterupdate</td>
<td>onafterupdate</td>
<td>Fires immediately after a databound object has been updated.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>beforeupdate</td>
<td>onbeforeupdate</td>
<td>Fires before a data source is updated.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>cellchange</td>
<td>oncellchange</td>
<td>Fires when a data source has changed.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>dataavailable</td>
<td>ondataavailable</td>
<td>Fires when new data from a data source become available.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>datasetchanged</td>
<td>ondatasetchanged</td>
<td>Fires when content at a data source has changed.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>datasetcomplete</td>
<td>ondatasetcomplete</td>
<td>Fires when transfer of data from the data source has completed.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>errorupdate</td>
<td>onerrorupdate</td>
<td>Fires if an error occurs while updating a data field.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>rowenter</td>
<td>onrowenter</td>
<td>Fires when a new row of data from the data source is available.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>rowexit</td>
<td>onrowexit</td>
<td>Fires when a row of data from the data source has just finished.</td>
<td>No</td>
<td>Yes</td>
</tr>
<tr>
<td>rowsdelete</td>
<td>onrowsdelete</td>
<td>Fires when a row of data from the data source is deleted.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>rowinserted</td>
<td>onrowinserted</td>
<td>Fires when a row of data from the data source is inserted.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td rowspan="9">Mouse</td>
<td>contextmenu</td>
<td>oncontextmenu</td>
<td>Fires when the context menu is shown.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>drag</td>
<td>ondrag</td>
<td>Fires when during a <a href="/wiki/Drag_and_drop" title="Drag and drop">mouse drag</a> (on the moving Element).</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>dragstart</td>
<td>ondragstart</td>
<td>Fires when a mouse drag begins (on the moving Element).</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>dragenter</td>
<td>ondragenter</td>
<td>Fires when something is dragged onto an area (on the target Element).</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>dragover</td>
<td>ondragover</td>
<td>Fires when a drag is held over an area (on the target Element).</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>dragleave</td>
<td>ondragleave</td>
<td>Fires when something is dragged out of an area (on the target Element).</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>dragend</td>
<td>ondragend</td>
<td>Fires when a mouse drag ends (on the moving Element).</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>drop</td>
<td>ondrop</td>
<td>Fires when a mouse button is released over a valid target during a drag (on the target Element).</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>selectstart</td>
<td>onselectstart</td>
<td>Fires when the user starts to select text.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>Keyboard</td>
<td>help</td>
<td>onhelp</td>
<td>Fires when the user initiates help.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td rowspan="2">HTML frame/object</td>
<td>beforeunload</td>
<td>onbeforeunload</td>
<td>Fires before a document is unloaded.</td>
<td>No</td>
<td>Yes</td>
</tr>
<tr>
<td>stop</td>
<td>onstop</td>
<td>Fires when the user stops loading the object. (unlike abort, stop event can be attached to document)</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>HTML form</td>
<td>beforeeditfocus</td>
<td>onbeforeeditfocus</td>
<td>Fires before an element gains focus for editing.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td rowspan="3">Marquee</td>
<td>start</td>
<td>onstart</td>
<td>Fires when a marquee begins a new loop.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>finish</td>
<td>onfinish</td>
<td>Fires when marquee looping is complete.</td>
<td>No</td>
<td>Yes</td>
</tr>
<tr>
<td>bounce</td>
<td>onbounce</td>
<td>Fires when a scrolling marquee bounces back in the other direction.</td>
<td>No</td>
<td>Yes</td>
</tr>
<tr>
<td rowspan="6">Miscellaneous</td>
<td>beforeprint</td>
<td>onbeforeprint</td>
<td>Fires before a document is printed</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>afterprint</td>
<td>onafterprint</td>
<td>Fires immediately after the document prints.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>propertychange</td>
<td>onpropertychange</td>
<td>Fires when the property of an object is changed.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>filterchange</td>
<td>onfilterchange</td>
<td>Fires when a filter changes properties or finishes a transition.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>readystatechange</td>
<td>onreadystatechange</td>
<td>Fires when the readyState property of an element changes.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>losecapture</td>
<td>onlosecapture</td>
<td>Fires when the releaseCapture method is invoked.</td>
<td>No</td>
<td>No</td>
</tr>
</tbody></table>
<p>Note that Mozilla, Safari and Opera also support readystatechange event for the <a href="/wiki/XMLHttpRequest" title="XMLHttpRequest">XMLHttpRequest</a> object. Mozilla also supports the beforeunload event using traditional event registration method (DOM Level 0). Mozilla and Safari also support contextmenu, but Internet Explorer for the Mac does not.</p>
<p>Note that Firefox 6 and later support beforeprint and afterprint events.</p>
<h3><span class="editsection">[<a href="/w/index.php?title=DOM_events&amp;action=edit&amp;section=6" title="Edit section: XUL events">edit</a>]</span> <span class="mw-headline" id="XUL_events">XUL events</span></h3>
<p>In addition to the common/W3C events, Mozilla defined a set of events that work only with XUL elements.</p>
<table class="wikitable">
<tbody><tr>
<th>Category</th>
<th>Type</th>
<th>Attribute</th>
<th>Description</th>
<th>Bubbles</th>
<th>Cancelable</th>
</tr>
<tr>
<td rowspan="6">Mouse</td>
<td>DOMMouseScroll</td>
<td>DOMMouseScroll</td>
<td>Fires when the mouse wheel is moved, causing the content to scroll.</td>
<td>Yes</td>
<td>Yes</td>
</tr>
<tr>
<td>dragdrop</td>
<td>ondragdrop</td>
<td>Fires when the user releases the mouse button to <a href="/wiki/Drag_and_drop" title="Drag and drop">drop an object being dragged</a>.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>dragenter</td>
<td>ondragenter</td>
<td>Fires when the mouse pointer first moves over an element during a drag. It is similar to the mouseover event but occurs while dragging.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>dragexit</td>
<td>ondragexit</td>
<td>Fires when the mouse pointer moves away from an element during a drag. It is also called after a drop on an element. It is similar to the mouseout event but occurs during a drag.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>draggesture</td>
<td>ondraggesture</td>
<td>Fires when the user starts dragging the element, usually by holding down the mouse button and moving the mouse.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>dragover</td>
<td>ondragover</td>
<td>Related to the mousemove event, this event is fired while something is being dragged over an element.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td rowspan="5">Input</td>
<td>CheckboxStateChange</td>
<td></td>
<td>Fires when a checkbox is checked or unchecked, either by the user or a script.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>RadioStateChange</td>
<td></td>
<td>Fires when a radio button is selected, either by the user or a script.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>close</td>
<td>onclose</td>
<td>Fires when a request has been made to close the window.</td>
<td>No</td>
<td>Yes</td>
</tr>
<tr>
<td>command</td>
<td>oncommand</td>
<td>Similar to W3C DOMActivate event. Fires when an element is activated, for instance, through a mouse click or a keypress.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>input</td>
<td>oninput</td>
<td>Fires when a user enters text in a textbox.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td rowspan="10">User interface</td>
<td>DOMMenuItemActive</td>
<td>DOMMenuItemActive</td>
<td>Fires when a menu or menuitem is <a href="/wiki/Mouseover" title="Mouseover">hovered over</a>, or highlighted.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>DOMMenuItemInactive</td>
<td>DOMMenuItemInactive</td>
<td>Fires when a menu or menuitem is no longer being hovered over, or highlighted.</td>
<td>Yes</td>
<td>No</td>
</tr>
<tr>
<td>contextmenu</td>
<td>oncontextmenu</td>
<td>Fires when the user requests to open the context menu for the element. The action to do this varies by platform, but it will typically be a right click.</td>
<td>No</td>
<td>Yes</td>
</tr>
<tr>
<td>overflow</td>
<td>onoverflow</td>
<td>Fires a box or other layout element when there is not enough space to display it at full size.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>overflowchanged</td>
<td>onoverflowchanged</td>
<td>Fires when the overflow state changes.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>underflow</td>
<td>onunderflow</td>
<td>Fires to an element when there becomes enough space to display it at full size.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>popuphidden</td>
<td>onpopuphidden</td>
<td>Fires to a popup after it has been hidden.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>popuphiding</td>
<td>onpopuphiding</td>
<td>Fires to a popup when it is about to be hidden.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>popupshowing</td>
<td>onpopupshowing</td>
<td>Fires to a popup just before it is popped open.</td>
<td>No</td>
<td>Yes</td>
</tr>
<tr>
<td>popupshown</td>
<td>onpopupshown</td>
<td>Fires to a popup after it has been opened, much like the onload event is sent to a window when it is opened.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td rowspan="2">Command</td>
<td>broadcast</td>
<td>onbroadcast</td>
<td>Placed on an observer. The broadcast event is sent when the attributes of the broadcaster being listened to are changed.</td>
<td>No</td>
<td>No</td>
</tr>
<tr>
<td>commandupdate</td>
<td>oncommandupdate</td>
<td>Fires when a command update occurs.</td>
<td>No</td>
<td>No</td>
</tr>
</tbody></table>


------------------------------------------------------------------------------------

<p>The W3C designed a more flexible event handling model in DOM Level 2.<sup id="cite_ref-dom2-events_6-1" class="reference"><a href="#cite_note-dom2-events-6"><span>[</span>6<span>]</span></a></sup></p>
<table class="wikitable">
<tbody><tr>
<th>Name</th>
<th>Description</th>
<th>Argument type</th>
<th>Argument name</th>
</tr>
<tr>
<td rowspan="3">addEventListener</td>
<td rowspan="3">Allows the registration of event listeners on the event target.</td>
<td>DOMString</td>
<td>type</td>
</tr>
<tr>
<td>EventListener</td>
<td>listener</td>
</tr>
<tr>
<td>boolean</td>
<td>useCapture</td>
</tr>
<tr>
<td rowspan="3">removeEventListener</td>
<td rowspan="3">Allows the removal of event listeners from the event target.</td>
<td>DOMString</td>
<td>type</td>
</tr>
<tr>
<td>EventListener</td>
<td>listener</td>
</tr>
<tr>
<td>boolean</td>
<td>useCapture</td>
</tr>
<tr>
<td>dispatchEvent</td>
<td>Allows to send the event to the subscribed event listeners.</td>
<td>Event</td>
<td>evt</td>
</tr>
</tbody></table>
<p>Some useful things to know&nbsp;:</p>
<ul>
<li>To prevent an event from bubbling, developers must call the "stopPropagation()" method of the event object.</li>
<li>To prevent the default action of the event to be called, developers must call the "preventDefault" method of the event object.</li>
</ul>



------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------




------------------------------------------------------------------------------------






</body>
</html>

<?php


?>