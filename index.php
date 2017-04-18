<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
      session_start();
       $UID = "";
      
      require 'config_system/config_DB.php';
      require 'lib/php/public_function.php';
      $status_cookie = check_cookie($obj_con,"UID");
      
      function check_login($status_cookie){
        if($status_cookie){
         $GLOBALS['UID'] = encrypt_decrypt('decrypt',$_COOKIE['UID']);
          return true;
        }elseif(isset($_SESSION['data_user'])){
          $GLOBALS['UID'] = $_SESSION['data_user']['user_id'];
          return true;
        }else{
          return false;
        }

      }
        
      $status_login = check_login($status_cookie);
    
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>MarkDown Editor</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css"/>
    <!--external css-->
    <link href="lib/css/font-awesome.css" rel="stylesheet" />

    
    <link rel="stylesheet" type="text/css" href="lib/css/jquery.numberedtextarea.css">
	  <link rel="stylesheet" href="lib/css/agate.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/simply-toast.min.css"/>
    <link href="lib/css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
   

    <!-- Custom styles for this template -->
    <link href="lib/css/style.css" rel="stylesheet">
    <link href="lib/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/css/agate.min.css">
   
    <style type="text/css">
    #section1 {padding-top:35px;height:auto; }
    #section2 {padding-top:35px;height:auto; }
    #section3 {padding-top:35px;height:auto; }
    #section4 {padding-top:35px;height:auto; }
    #section5 {padding-top:35px;height:auto; }
    #section6 {padding-top:35px;height:auto; }
    #section7 {padding-top:35px;height:auto; }
    #section8 {padding-top:35px;height:auto; }
		.col-md-6{
			padding: 0px;
			/*background-color: #c0c2e5;*/
			height: auto;
		}

    .myhorizontal{
      border-top: 1px solid #8c8b8b;
    }
    #tutorial-content{
      background-color: #ffffff;
      height: 90vh;
      border-radius: 12px 12px 12px 12px;
      -moz-border-radius: 12px 12px 12px 12px;s
      -webkit-border-radius: 12px 12px 12px 12px;
      border: 0px solid #ffbfff;
      -webkit-box-shadow: 3px -1px 8px 0px rgba(0,0,0,0.75);
      -moz-box-shadow: 3px -1px 8px 0px rgba(0,0,0,0.75);
      box-shadow: 3px -1px 8px 0px rgba(0,0,0,0.75);
    }
		.box{
			padding: 5px;
			height: auto;
			/*background-color:#70a9d1;*/
			-webkit-box-shadow: 4px -5px 5px -4px rgba(0,0,0,0.75);
			-moz-box-shadow: 4px -5px 5px -4px rgba(0,0,0,0.75);
			box-shadow: 4px -5px 5px -4px rgba(0,0,0,0.75);

		}
    #tutorial{
      padding-top: 5px;
      padding-left: 20px;
      padding-right: 20px;
     height: auto;
    }
		.io{ 
			

			width: 100%;
			height: 80vh;
      padding: 5px;
			background-color: #ffffff;
			overflow: scroll;
		}
		hr { 
		    display: block;
		    margin-top: 0.5em;
		    margin-bottom: 0.5em;
		    margin-left: auto;
		    margin-right: auto;
		    border-style: inset;
		    border-width: 1px;
		} 
		pre{
			width: auto;
			height: auto;
			background-color: #333;

		}
		code{
			height: inherit

		}
		.navbar-box{

			background-color: #505d72;
			padding: 2%;
			/*height: 30px;*/
			border-radius: 5px 5px 0 0;
			font-size: 18px;
			width: initial;
			color: #ffffff;
		}
		.item-right{
			float: right;

		}
		li.dropdown{
			list-style: none;
		}
		.item-editor{
			width: 30px;
		}
		.dropdown-menu >li>a{
			padding: 7%;
		}
    .mylist{
     
      font-size: 11px;
      border-radius: 4px;
      -webkit-border-radius: 4px;
      border: 1px solid #64c3c2 !important;
      
      background: #424a5d;
      margin-top: 10px;
      height: 40px;
      padding-top: 10px;
      min-width: 120px;
      max-width: auto;
      text-align: center;

    }
    .item-doc{
      cursor: pointer;
    }
		/* Absolute Center Spinner */
  .loading {
    position: fixed;
    z-index: 999;
    height: 2em;
    width: 2em;
    overflow: show;
    margin: auto;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
  }

  /* Transparent Overlay */
  .loading:before {
    content: '';
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.3);
  }

  /* :not(:required) hides these rules from IE9 and below */
  .loading:not(:required) {
    /* hide "loading..." text */
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;
  }

  .loading:not(:required):after {
    content: '';
    display: block;
    font-size: 10px;
    width: 1em;
    height: 1em;
    margin-top: -0.5em;
    -webkit-animation: spinner 1500ms infinite linear;
    -moz-animation: spinner 1500ms infinite linear;
    -ms-animation: spinner 1500ms infinite linear;
    -o-animation: spinner 1500ms infinite linear;
    animation: spinner 1500ms infinite linear;
    border-radius: 0.5em;
    -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
    box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  }

  /* Animation */

  @-webkit-keyframes spinner {
    0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }
  @-moz-keyframes spinner {
    0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }
  @-o-keyframes spinner {
    0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }
  @keyframes spinner {
    0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

	</style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Mark Down</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu"> 
                <!-- navber start -->
	                 <!-- icon Editor list -->
				    <!--   <li><a href="#" class="item-editor"><i class="fa fa-bold" aria-hidden="true"></i></a></li>
				      <li style="text-align: center;"><a href="#" class="item-editor"><i class="fa fa-italic" aria-hidden="true"></i></a></li>
				      <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li> -->
				      <!-- icon Editor list -->
                <!-- navber stop -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li id="docName"><a class="mylist"  style="color: #ffffff;padding-top: 7px;cursor: pointer;">Untitled Document.md</a></li>
                    <li id="changeDocName" style="display: none;"><a class="mylist" style="color: #ffffff;padding-top: 4px;cursor: pointer;"><input type="text" style="color: #000000"></input></a></li>
                    <?php if($status_login) {?>
                     <li style="cursor: pointer;"><a class="logout" id="singout" >SIGN OUT</a></li>
                     <?php }else{?>
                    <li style="cursor: pointer;"><a class="logout" id="singin" ">SIGN IN</a></li>
                     <?php }?>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a ><img src="Resource\img\logo.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">MarkDown Editor</h5>
              	  	
                 <?php if($status_login) {?>
                  <li class="sub-menu" id="import_file">
                      <a href="javascript:;" >
                          <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                          <span>IMPORT FILE</span>
                      </a>
                      
                  </li>
                  <?php } ?>
                  <?php if($status_login) {?>
                 <!--  show Document start -->
                  <li class="sub-menu menu-doc" >
                      <a href="javascript:;" >
                          <i class="fa fa-file-text-o" aria-hidden="true"></i>
                          <span>DOCUMENTS</span>
                      </a>
                      <ul class="sub" id="show_doc">
                         
                      </ul>
                  </li>
                  <!--  show Document start -->
                  <?php } ?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-download" aria-hidden="true"></i>
                          <span>EXPORT FILE</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#" type-file="html" class="export-file" ><i class="fa fa-file-code-o"  aria-hidden="true"></i> HTML FILE</a></li>
                          <li><a  href="#" type-file="pdf" class="export-file"><i class="fa fa-file-pdf-o"  aria-hidden="true"></i> PDF FILE</a></li>
                          <li><a  href="#" type-file="md" class="export-file"><i class="fa fa-file-text-o"  aria-hidden="true"></i> MARKDOWN FILE</a></li>
                      </ul>
                  </li>
                  <?php if($status_login) {?>
                  <li class="sub-menu" id="my_save">
                      <a href="javascript:;" >
                          <i class="fa fa-floppy-o" aria-hidden="true"></i>
                          <span>SAVE</span>
                      </a>
                      
                  </li>
                  <?php }?>

                
                  <li class="sub-menu" id="btn_tutorial">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>CHEAT SHEET</span>
                      </a>
                     
                  </li>
              

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper"  id="editor-io" >
          	<!-- content -->
            <div class="row">
      			  <div class="col-md-6">

      			  	<div class="box">
      			  	<div class="navbar-box">
      			  		MARKDOWN
      			  		<div class="item-right">LINE : <div style="display: inline;" id="line">0</div></div>
      			  	</div><!-- navber -->
      			  		<textarea class="input io" id="input_md" ></textarea>
      			  	</div>
      			  </div>
      			  <div class="col-md-6">
      			  	<div class="box">
      			  	<div class="navbar-box">
      			  		HTML
      			  		<div class="item-right navbar-right">
      				  	   <li class="dropdown">
      				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;padding-right: 10px;">PREVIEW AS<span class="caret"></span></a>
      				          <ul class="dropdown-menu">
      				            <li id="btn-show-html"><a href="#"><i class="fa fa-code" aria-hidden="true"></i> HTML</a></li>	       
      				          </ul>
      				        </li>
                        	</div>

      			  	</div><!-- navber -->
      			  		<div class="output io"></div>
      			  	</div>
      			  </div>
			     </div> <!-- row -->
			<!-- content -->
      <!-- tutorial -->
          </section>
          <section class="wrapper" id="tutorial" style="display: none;">
            <div class="row" > <!-- row -->
              <div id="tutorial-content" ><!-- tutorial-content -->
                <div class="navbar-box">
                  <div class="item-right" id="tutorial-close"><a class="btn btn-danger" >X</a>
                  </div>
                  CHEAT SHEET
                </div>
                <!-- <div class="container-fluid"> -->
                    <div class="col-md-2" style="padding-left: 0px;padding-right: 0px;height: initial;">
                       <ul class="nav nav-pills nav-stacked">
                        <li><a class="content-id" href="#section1">Headers</a></li>
                        <li><a class="content-id" href="#section2">Emphasis</a></li>
                        <li><a class="content-id" href="#section3">Lists</a></li>
                        <li><a class="content-id" href="#section4">Links</a></li>
                        <li><a class="content-id" href="#section5">Images</a></li>
                        <li><a class="content-id" href="#section6">Code and Syntax Highlighting</a></li>
                        <li><a class="content-id" href="#section7">Horizontal Rule</a></li>
                        <li><a class="content-id" href="#section8">Text color</a></li>
                      </ul>
                    </div>
                    <div class="col-md-10 content-tutorial" style="height: 87.6%;max-height: 87.6%;overflow: scroll;" >
                      <style type="text/css">
                        .mypre{
                          width: auto;
                          height: auto;
                          background-color: #d6e4f9;
                          overflow: scroll;
                        }
                      </style>
                      <div id="section1" class="container-fluid" >
                      <h1>Header</h1>
                      <hr class="myhorizontal">
<!-- pre////////////////////////////////////////////////////////////////////////////- -->                  
                      <pre class="mypre">
                        <code class="nohighlight">
# H1
## H2
### H3
#### H4
##### H5
###### H6

Alternatively, for H1 and H2, an underline-ish style:

Alt-H1
======

Alt-H2
------
<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                        </code>
                      </pre>               
                        <h1>
                          H1
                        </h1>
                        </br><h2>
                          H2
                        </h2>
                        </br><h3>
                          H3
                        </h3>
                        </br><h4>
                          H4
                        </h4>
                        </br><h5>
                          H5
                        </h5>
                        </br><h6>
                          H6
                        </h6>
                        </br></br>Alternatively, for H1 and H2, an underline-ish style:
                        </br><h1>Alt-H1<hr style='border-top: 1px solid #8c8b8b;' /></h1>
                        </br><h2>Alt-H2<hr style='border-top: 1px solid #8c8b8b;' /></h2>
                      </div>
                      <div id="section2" class="container-fluid">
                        <h1>Emphasis</h1>
                        <hr class="myhorizontal">
<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                       <pre class="mypre"><code class="nohighlight no">
italics this is a *book* or _book_ .

Strong bold this is a **pan** or __pan__.

Combined This is a **pen and a _pencil_**.

Strikethrough I don't like ~~red~~ color.
                       </code></pre>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->
                        <br/><br/>
                       <h5> 
                          italics this is a <em>book</em> or <em>book</em> .
                          </br></br>Strong bold this is a <strong>pan</strong> or <strong>pan</strong>.
                          </br></br>Combined This is a <strong>pen and a <em>pencil</em></strong>.
                          </br></br>Strikethrough I don't like <del>red</del> color.
                       </h5>
                      </div>
                      <div id="section3" class="container-fluid">
                        <h1>Lists</h1>
                        <hr class="myhorizontal">
<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                       <pre class="mypre"><code class="nohighlight markdown">
### List item example
  * item1
  * item2
  * item3
  * item4
  ---
  + item1
  + item2
  + item3
  + item4 
  ---
  - item1 
  - item2 
  - item3 
  - item4 
                       </code></pre>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->
                        <h3>
                          List item example
                        </h3>
                        <ol style='list-style-type: disc;'><li> item1</li></ol>
                        <ol style='list-style-type: disc;'><li> item2</li></ol>
                        <ol style='list-style-type: disc;'><li> item3</li></ol>
                        <ol style='list-style-type: disc;'><li> item4</li></ol>
                        <hr />
                        <ol style='list-style-type: disc;'><li> item1</li></ol>
                        <ol style='list-style-type: disc;'><li> item2</li></ol>
                        <ol style='list-style-type: disc;'><li> item3</li></ol>
                        <ol style='list-style-type: disc;'><li> item4 </li></ol>
                        <hr />
                        <ol style='list-style-type: circle;'><li> item1</li></ol> 
                        <ol style='list-style-type: circle;'><li> item2</li></ol> 
                        <ol style='list-style-type: circle;'><li> item3</li></ol> 
                        <ol style='list-style-type: circle;'><li> item4</li></ol> 
                      </div>
                      <div id="section4" class="container-fluid">
                        <h1>Links</h1>
                        <hr class="myhorizontal">
<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                       <pre class="mypre"><code class="nohighlight markdown">
### link example

#### This is my [facebook](https://www.facebook.com/ikool009)

#### This is my [github](https://github.com/ujiik009)

### Combined

#### This is my **[facebook](https://www.facebook.com/ikool009)**

#### This is my *[github](https://github.com/ujiik009)*

                       </code></pre>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->
<!-- ..................................................... -->
                          <h3>
                            link example
                          </h3>
                          </br>
                          <h4>
                            This is my <a href='https://www.facebook.com/ikool009'>facebook</a>
                          </h4>
                          </br>
                          <h4>
                            This is my <a href='https://github.com/ujiik009'>github</a>
                          </h4>
                          </br>
                          <h3>
                            Combined
                          </h3>
                          </br>
                          <h4>
                            This is my <strong><a href='https://www.facebook.com/ikool009'>facebook</a></strong>
                          </h4>
                          </br>
                          <h4>
                            This is my <em><a href='https://github.com/ujiik009'>github</a></em>
                          </h4>
<!-- .............................................. -->
                      </div>
                      <div id="section5" class="container-fluid">
                        <h1>Images</h1>
                        <hr class="myhorizontal">
<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                       <pre class="mypre"><code class="nohighlight markdown">
### link image

**syntax ![text](url image)**

logo facebook ![facebook](https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-200x200.png)

### Optional function customize size

**syntax ![text](url image)(width)(height)**

logo facebook ![facebook](https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-200x200.png)(100px)(100px)
                       </code></pre>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->      

<!-- ......................................... -->
                            <h3>
                              link image
                            </h3>
                            </br></br><strong>syntax ![text](url image)</strong>
                            </br>logo facebook <img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-200x200.png" alt="facebook" />
                            </br><h3>
                              Optional function customize size
                            </h3>
                            </br></br><strong>syntax  ![text](url image)(width)(height)</strong>
                            </br>logo facebook <img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-200x200.png" alt="facebook" style="width:100px;height:100px;"/>

<!-- .............................................. -->

                      </div>
                      <div id="section6" class="container-fluid">
                        <h1>Code and Syntax Highlighting</h1>
                        <hr class="myhorizontal">
<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                       <pre class="mypre"><code class="nohighlight no">
Inline `code` has `back-ticks around` it.
                       </code></pre>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->          
                        </br>
                        </br>
                        Inline <code>code</code> has <code>back-ticks around</code> it.
                        </br>
                        </br>
                        </br>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                       <pre class="mypre"><code class="nohighlight no">
```javascript
var s = "JavaScript syntax highlighting";
alert(s);
```
 
```python
s = "Python syntax highlighting"
print s
```

```html
< div class="row">
  < div class="col-md-6">
    < p>column 1< /p>
  < /div>
  < div class="col-md-6">
    < p>column 2< /p>
  < /div>
< /div>
```
 
```no
No language indicated, so no syntax highlighting. 
But let's throw in a <b>tag</b>.
```
                       </code></pre>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->

                        <h3>result</h3>

<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                     
<pre><code class ='javascript'>var s = "JavaScript syntax highlighting";
alert(s);</code></pre> 
<pre><code class ='python'>s = "Python syntax highlighting"
print s</code></pre> 
<pre><code class ='html'>&lt;div class="row">
  &lt;div class="col-md-6">
    &lt;p>column 1&lt;/p>
  &lt;/div>
  &lt;div class="col-md-6">
    &lt;p>column 2&lt;/p>
  &lt;/div>
&lt;/div></code></pre>
<pre><code >No language indicated, so no syntax highlighting. 
But let's throw in a <b>tag</b>.</code></pre>
                       
<!-- pre////////////////////////////////////////////////////////////////////////////- -->                        

                      </div>
                      <div id="section7" class="container-fluid">
                        <h1>Horizontal Rule</h1>
                         <hr class="myhorizontal">
                        <br>
                        

<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                       <pre class="mypre"><code class="nohighlight no">    
Three or more...

minus

---           

asterisk

***

Underscores
___
                       </code></pre>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->  
                      
                         <h3>result</h3>

                            Three or more...
                            </br></br>minus
                            <hr />           
                            </br>asterisk
                            <hr />
                            </br>Underscores
                            <hr />

                      </div>
                      <div id="section8" class="container-fluid">
                        <h1>Text Color</h1>
                         <hr class="myhorizontal"><br><br>
                        <h3>Optional function customize Text color.</h3>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->    
                       <pre class="mypre"><code class="nohighlight no">    
{? Example1 ?}(red)


{? Example2 ?}(green)


{? Example3 ?}(#86a5d6)


{? Example4 ?}( rgb(188, 33, 209) )

                       </code></pre>
<!-- pre////////////////////////////////////////////////////////////////////////////- -->  

                            <h3>result</h3>
                            <span style='color:red;'>  Example1  </span>
                            </br></br><span style='color:green;'>  Example2  </span>
                            </br></br><span style='color:#86a5d6;'>  Example3  </span>
                            </br></br><span style='color: rgb(188, 33, 209) ;'>  Example4  </span>             
                      </div>
                    </div>
                <!-- </div> -->
            </div><!-- tutorial-content -->
          </div><!-- row -->
                


          </section>
      <!-- tutorial -->
      </section>


       <!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog modal-sm">
		    
		      <!-- Modal content-->
		      <div class="modal-content" id="modal-login">
		      
		      </div>
		      
		    </div>
		  </div>
		<!-- Modal -->



    <!-- modal uploadfile -->
        <!-- Start Post Attachments -->
                     <div class="modal fade" id="uploader" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">✕</button>
                            <br>
                            <i class="icon-credit-card icon-7x"></i>
                            <p class="no-margin">You can upload only 1 markdown file and text file  at a time!</p>
                          </div>
                          <div class="modal-body col-md-12">
                              
                            <form id="file_doc"  method="post" enctype="multipart/form-data">
                           <!--  action="Service/move_file_import.php?accessToken=<?=$UID ?>" -->
                            <div class="form-group">
                              <label >import file .text or .md</label>
                              <input style="width:100%;" type="file" class="form-control-file" accept="text/plain,.md" name="file_import" >
                              <input type="hidden" name="accessToken" id="accessToken"/>
                            </div>
                             <a id="btn_upload" class="btn btn-info" ><i class="fa fa-cloud-upload" aria-hidden="true"></i> IMPORT</a>
                            </form>
                           </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
      <!-- End Post Attachments -->
    <!-- modal uploadfile -->
    <!--main content end-->

    <!-- model rename start -->
      <div class="modal fade bs-example-modal-lg" id="rename-modal" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">✕</button>
                  <br>
                  <i class="icon-credit-card icon-7x"></i>
                  <h3><p class="no-margin" id="name-doc-model">name doc</p></h3>
                </div>
                <div class="modal-body col-md-12 " id="content_model_rename">

                
                 </div>
                  <div class="modal-footer">
                 <a type="button" class="btn btn-success attachtopost conf" >Rename</a>
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
      </div>
                    <!-- /.modal -->
    <!-- model rename stop -->

    <!-- model show code html -->
       <div class="modal fade bs-example-modal-lg" id="show-html-modal" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">✕</button>
                  <br>
                  <i class="icon-credit-card icon-7x"></i>
                  <h4><p class="no-margin" id="name-doc-model"><i class="fa fa-code" aria-hidden="true"></i>  HTML SOURCE </p></h4>
                </div>
                <div class="modal-body col-md-12 " id="content_model_rename">
                <textarea class="form-control" style="height: 60vh;width:inherit;" id="textarea-modal-html"></textarea>
                
                 </div>
                  <div class="modal-footer">
                 
                  <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
      </div>

    <!-- model show code html -->
    
  </section>
  <div class="loading" style="display: none;">Loading&#8230;</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <!-- jquery-1.8.3.min.js -->

  	<script type="text/javascript" src="lib/js/jquery-3.2.0.min.js"></script>
    <script src="lib/js/highlight.min.js"></script>
    <script src="lib/js/jquery.contextMenu.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/js/jquery.numberedtextarea.js"></script>
    <script src="lib/js/simply-toast.min.js"></script>
	  <script type="text/javascript" src="lib/js/tab.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/js/jquery.scrollTo.min.js"></script>
    <script src="lib/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="lib/js/md_complie.js" type="text/javascript" ></script>
    <script src="lib/js/common-scripts.js"></script>
    <script src="lib/js/add_in.js"></script>
    <script type="text/javascript" src="lib/js/FileSaver.js"></script>
    <script type="text/javascript" src="lib/js/jquery.fileDownload.js"></script>
<script type="text/javascript">
// pack function

// init
var tag_html_now = "";
var document_name = "document.md";
var UID = "<?=$UID?>";

// 1. function highlight 
 function highlight(){
    $('pre code').each(function(i, block) {
          hljs.highlightBlock(block);
    });
}
// _____________________________

// 2 function update_html 
function update_html(){
    tag_html_now = regexMD_to_html($(".input").val());
    $(".output").html(tag_html_now),highlight();
}
// ______________________________

// 3 function save_file this is function save file to server
function save_file(UID,document_name){
  var content = $("#input_md").val();
  $.post('Service/service_save_file.php', 
    {
      content: content,
      UID : UID,
      file_name:document_name
    }, 
    function() {
    /*optional stuff to do after success */
    }).done(function(data){
        var json_res = jQuery.parseJSON(data);
        if(json_res.status == true){
            $.simplyToast(json_res.message, 'success');
            show_doc_list(UID);

        }else{
            $.simplyToast(json_res.message, 'danger');
        }
    });
}
// ______________________________

// 4 function system init 
 function setup(document_name){
      hljs.initHighlightingOnLoad();
      $("#docName").children().html(document_name);
      $(".input").numberedtextarea().enableSmartTab();
      highlight();
}
// ______________________________

//5 function show doc list
 function show_doc_list(UID){
        $.post('Service/show_file.php', 
          {UID: UID}, 
          function() {
          /*optional stuff to do after success */
          }).done(function(data){
            
            var jsondata = jQuery.parseJSON(data);
            if(jsondata.status == true){
              $("#show_doc").empty();
              $.each(jsondata.data,function(index, el) {
                let name_file = '<li class="item-doc context-menu-one"><a  href="#" ><i class="fa fa-file-text-o" aria-hidden="true"></i>'+el+'</a></li>';
                $("#show_doc").append(name_file);
              });

            }else{
              alert(data);
            }
            
          },function(){
              //event load content from server
               $(".item-doc").click(function(event) {
                  let doc_name = $(this).text();
                  $.post('Service/load_content.php', 
                    {
                      UID: UID,
                      doc_name: doc_name
                    }, 
                    function() {
                    /*optional stuff to do after success */
                  }).done(function(data){
                    try{
                        let json_res = jQuery.parseJSON(data);
                        if(json_res.status == true){
                          $.simplyToast(json_res.message, 'success');
                          $("#input_md").val(json_res.data);
                          doc_update(doc_name);
                          update_html();
                        }else{
                           $.simplyToast(json_res.message, 'danger');
                        }
                    }catch(e)
                    {
                        $.simplyToast("Could not open file.", 'danger');
                       return;
                    }
                  });
                
               });
               //event load content from server

          });

 }
// ______________________________

// 6 function doc update name
function doc_update(NewDocName){
      document_name = NewDocName;
      $("#docName").children().html(document_name);
}
// ______________________________

//7 function add type file
function addTypeFile(fileName){
    return fileName+".md";
}
//_______________________________

 //8 function delete file from server
 function delete_file(UID,file_name){
    $.post('Service/delete_file.php', 
      {
        UID: UID,
        file_name:file_name

      }, function() {
    
    }).done(function(data){
     
      let json_res = jQuery.parseJSON(data);

      if(json_res.status){
        $.simplyToast(json_res.message, 'success');
        show_doc_list(UID);
       
      }else{

        $.simplyToast(json_res.message, 'danger');
        
      }
    });
 }

 // __________________________

 //9 rename Doc

function  Rename_doc(old_name,last_name){
      $.post('Service/service_rename.php', 
        {
          UID: UID,
          old_file:old_name,
          new_file:last_name
        },
         function() {
        /*optional stuff to do after success */
         }
      ).done(function(data){
        try{
          let json_res_rename = jQuery.parseJSON(data);
          if(json_res_rename){
             $("#rename-modal").modal('hide');
              show_doc_list(UID);
          }else{
            $.simplyToast(json_res_rename.message, 'danger');
          }
        }catch(e){
          alert("Renae false");
        }
      });
}
//__________________________________

//10 function new Document
function NewDoc(){
  let name_doc = "NewDocument.md";
  //alert("function new doc");
    $.post('Service/add_new_file.php', 
      {
        UID: UID,
        NewDoc:name_doc
      }, 
      function() {
      }
    ).done(function(data){
      try{
        let json = jQuery.parseJSON(data);
        if(json.status){
          show_doc_list(UID);
          $.simplyToast("Create file success", 'success');
        }else{
           $.simplyToast(json.message, 'danger');
        }
      }catch(e){
        $.simplyToast("parseJSON error", 'danger');
      }
    });
}
//_____________________________________

//11 function click right 

function clickRight(){

    $.contextMenu({
        selector: '.context-menu-one', 
        callback: function(key, options) {
          
            let file_name =  $(this).text();
            if(key == "delete"){
             
               var conf = confirm("Are you sure to delete the file "+file_name+"?");

              if(conf){    
                delete_file(UID,file_name);
              }else{
                return;
              }
            }else if(key == "rename" ){
              console.log($(this));

              $("#rename-modal").modal('toggle');
              $("#name-doc-model").text("Document name : "+ file_name);
              $("#content_model_rename").empty();
              $("#content_model_rename").append(' <input type="text" class="form-control" id="input-rename" />');
              $("#input-rename").empty().val(file_name);
              $(".conf").click(function() {
                let last_name = $("#input-rename").val();
                Rename_doc(file_name,last_name);
              });



            }else{
              alert("key error");
            }
        },
        items: {
            "rename": {name: "Rename", icon: "edit"},
            "delete": {name: "Delete", icon: "delete"}

           
        }
    });

     $.contextMenu({
        selector: '.menu-doc', 
        callback: function(key, options) {
            //var m = "clicked: " + key;
            //alert(m+" "+$(this).text());
            let file_name =  $(this).text();
            if(key == "New"){
              NewDoc();
            }else{
              alert("key error");
            }
        },
        items: {
            
            "New": {name: "New Document", icon: "add"}
           
        }
    });
}
//____________________________

//12 function singout
function singout(){
  $.get('Service/logout.php', function() {}).done(function(data){
      try{
          let json_res = jQuery.parseJSON(data);
          if(json_res.status == true){
              location.reload();
          }
      }catch(e){
        $.simplyToast(e, 'danger');
      }
  });
  
}
//___________________________

//13 function upload file
function upload_file(UID){
  $("#accessToken").val(UID);
  var formData = new FormData($("form#file_doc")[0]);
     load_overlay();
    $.ajax({
        url: 'Service/move_file_import.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
          try{
              let json_res = jQuery.parseJSON(data);
              if(json_res.status == true){
                   load_overlay();
                  $.simplyToast(json_res.message, 'success');
                  $("#uploader").modal('toggle');
                   show_doc_list(UID);
              }else{
                     load_overlay();
                   $.simplyToast(json_res.message, 'danger');
              }
          }catch(e){
               load_overlay();
              $.simplyToast(e, 'danger');
          }
      },
      cache: false,
      contentType: false,
      processData: false
  });
  
}
//___________________________________________________

//13 function ajax to render service php
function ajax_renderPDF_php(UID){
  load_overlay();
  $.post('Service/service_render_pdf.php', 
    {
      UID       : UID,
      html_tag  : tag_html_now,
      file_name : document_name
    }, 
    function() {
 
    }
  ).done(function(data){
  
    try{
      let json = jQuery.parseJSON(data);
      if(json.status == true){

          window.open(json.url_download);
          load_overlay();
      }else{
          load_overlay();
         $.simplyToast(json.message, 'danger');
      }
    }catch(e){
        load_overlay();
        $.simplyToast(e, 'danger');
    }
  });
  
}
//________________________________    

//14 function load ovarlay
function load_overlay(){
  $(".loading").toggle();
}
</script>

    
<script type="text/javascript">
$(document).ready(function() {
         
         
         //var template = "<html><meta charset='utf-8'><head></head><body><??content??></body></html>";
   
         // event show source code html
         $("#btn-show-html").click(function(event) {
           $("#textarea-modal-html").val(tag_html_now);
           $("#show-html-modal").modal("toggle");
         });
         // event show source code html
        
       

         $(".input").bind('input', function(event) {
           
          update_html();
         });
         
         // Event upload file
         $("#btn_upload").click(function(event) {
            upload_file(UID);
         });


         // Event upload file
    		
    		
       

        // event btn tutorail
        $("#btn_tutorial,#tutorial-close").click(function(event) {
          let speed = '800';
          // form editor hide or show
          $("#editor-io,#tutorial").toggle(speed);
        
        });

        // event btn tutorail

        //event btn singin start
    		$("#singin").click(function(event) {
    			$("#modal-login").empty();
    			$.get('ajax/login.html', function() {
    				
    			}).done(function(data){
    				$("#modal-login").append(data);
    				
    			},function(){
    				$("#myModal").modal('show');
    				$("#btn-singIn").click(function(event) {
    					$.post('Service/login.php', {user: $("#User").val(),password:$("#password").val()}, function() {
    						
    					}).done(function(data){
                let json_res = jQuery.parseJSON(data);
                if(json_res.status){
                     $.simplyToast("Wellcome ", 'success');

                     setTimeout(function(){ location.reload(); }, 1000);
                }else{
                      $.simplyToast(json_res.message, 'danger');
                }
    						//alert(data);
    					});
    				});
    			});
    		});
        //event btn singin stop

        //event change Doc Name focus
        $("#docName").click(function(event) {
          $(this).hide();
          $("#changeDocName").show();
          $("#changeDocName").children().children().val(document_name);
        });
        //event change Doc Name focus

       //event change Doc Name onblur save new doc Name
       $("#changeDocName").children().children().blur(function(event) {
         document_name = $(this).val();
         $("#changeDocName").hide();
          $("#docName").show();
         $("#docName").children().html(document_name);
       });
       //event change Doc Name onblur

       //event save file to server
       $("#my_save").click(function(event) {
          save_file(UID,document_name);
       });
       //event save file to server

       //event cilck import
       $("#import_file").click(function(event) {
         $("#uploader").modal('show');
       });
       //event cilck import



       // event ckick export file
       $(".export-file").click(function(event) {
           let type_file = $(this).attr("type-file");
           // tag_html_now
            let Doc_name_save = document_name.split(".");
           if(type_file == "md"){
              let text_md = $("#input_md").val();
              var file = new Blob([text_md], {type: "text/plain;charset=utf-8"}); //IE<10
              saveAs(file, Doc_name_save[0]+".md"); 
           }else if(type_file == "html"){
              
              var file = new Blob([tag_html_now], {type: "text/plain;charset=utf-8"}); //IE<10
              saveAs(file, Doc_name_save[0]+".html"); 
               //alert("Export file html");
           }else if(type_file == "pdf"){
                ajax_renderPDF_php(UID);
                //alert("Export file pdf");
           }else{
             alert(type_file);
           }
        
       });
       // event ckick export file
           
      //shot key command
      $(window).bind('keydown', function(event) {
          if (event.ctrlKey || event.metaKey) {
              switch (String.fromCharCode(event.which).toLowerCase()) {
              case 's':
                  event.preventDefault();
                  save_file(UID,document_name);
                  break;
              case 'f':
                  event.preventDefault();
                  alert('ctrl-f');
                  break;
              case 'g':
                  event.preventDefault();
                  alert('ctrl-g');
                  break;
              }
          }
      });
      //shot key command

      // event sing out 
      $("#singout").click(function(event) {
        singout();
      });
      // event sing out 



      ///////////////////////////////////////
         // Add scrollspy to <body>
          $('.content-tutorial').scrollspy({target: "", offset: 100});   

          // Add smooth scrolling on all links inside the navbar
          $(".content-id").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('.content-tutorial').animate({
                scrollTop: $(hash).offset().top
              }, 1000, function(){
           
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            }  // End if

            //alert(555);
          });

      ////////////////////////////////////////
    		

        //init function
        setup(document_name);
        if(UID!=""){
          // islogin
          show_doc_list(UID);
          clickRight();
        }
        //init function
});

    
    </script>
  </body>
</html>
