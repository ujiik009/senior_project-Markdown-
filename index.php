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
		.col-md-6{
			padding: 0px;
			/*background-color: #c0c2e5;*/
			height: auto;
		}
		.box{
			padding: 5px;
			height: auto;
			/*background-color:#70a9d1;*/
			-webkit-box-shadow: 4px -5px 5px -4px rgba(0,0,0,0.75);
			-moz-box-shadow: 4px -5px 5px -4px rgba(0,0,0,0.75);
			box-shadow: 4px -5px 5px -4px rgba(0,0,0,0.75);

		}
		.io{ 
			

			width: 100%;
			height: 40vw;
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
				      <li><a href="#" class="item-editor"><i class="fa fa-bold" aria-hidden="true"></i></a></li>
				      <li style="text-align: center;"><a href="#" class="item-editor"><i class="fa fa-italic" aria-hidden="true"></i></a></li>
				      <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
				      <!-- icon Editor list -->
                <!-- navber stop -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li id="docName"><a class="mylist"  style="color: #ffffff;padding-top: 7px;cursor: pointer;">Untitled Document.md</a></li>
                    <li id="changeDocName" style="display: none;"><a class="mylist" style="color: #ffffff;padding-top: 4px;cursor: pointer;"><input type="text" style="color: #000000"></input></a></li>
                    <li style="cursor: pointer;"><a class="logout" id="singin" >SING IN</a></li>
            	       
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
                          <li><a  href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i> HTML FILE</a></li>
                          <li><a  href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF FILE</a></li>
                          <li><a  href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> MARKDOWN FILE</a></li>
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

                
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>TUTORIAL</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
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
          <section class="wrapper">
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
				            <li><a href="#"><i class="fa fa-code" aria-hidden="true"></i> HTML</a></li>
				            <li><a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true" style="padding-right: 2px;"></i> PDF</a></li>
				            		       
				          </ul>
				        </li>
                  	</div>

			  	</div><!-- navber -->
			  		<div class="output io"></div>
			  	</div>
			  </div>
			</div>
			<!-- content -->
          </section>
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

                            <form  action="Service/move_file_import.php?accessToken=<?=$UID ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label >import file .text or .md</label>
                              <input style="width:100%;" type="file" class="form-control-file" accept="text/plain,.md" name="file_import" >
                              
                            </div>
                             <button class="btn btn-info" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> IMPORT</button>
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
                <div class="modal-body col-md-12">

                <input type="text" class="form-control" id="input-rename" />
                   <a type="button" class="btn btn-success attachtopost" id="conf-rename">Rename</a>
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
    <!-- model rename stop -->
    
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <!-- jquery-1.8.3.min.js -->

  	<script type="text/javascript" src="lib/js/jquery-3.2.0.js"></script>
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

    
     <script type="text/javascript">
    	$(document).ready(function() {
         var tag_html_now = "";
         var document_name = "document.md";
         var UID = "<?=$UID?>";
         
         //var template = "<html><meta charset='utf-8'><head></head><body><??content??></body></html>";
      
         // $(".input").change(function(){
         //    $(".output").html(regexMD_to_html($(".input").val())),highlight();
         //  //alert(3232);
         // });
         // function update md 
         function update_html(){
          $(".output").html(regexMD_to_html($(".input").val())),highlight();
         }
         function save_file(){
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

         // function update md 

         $(".input").bind('input', function(event) {
           /* Act on the event */
          update_html();
         });
    		$(".input").numberedtextarea().enableSmartTab();
    		function addTypeFile(fileName){
            return fileName+".md";
        }
        function setup(){
            hljs.initHighlightingOnLoad();
            $("#docName").children().html(document_name);
        }

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
    						alert(data);
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
          save_file();
       });
       //event save file to server

       //event cilck import
       $("#import_file").click(function(event) {
         $("#uploader").modal('show');
       });
       //event cilck import

       // function show doc list
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
                //alert($(this).text());
               });
               //event load content from server

          });

       }
       // function show doc list

     
       // function update doc name
       function doc_update(NewDocName){
          document_name = NewDocName;
          $("#docName").children().html(document_name);
       }
       // function update doc name

       // function delete file from server
       function delete_file(UID,file_name){
          $.post('service/delete_file.php', 
            {
              UID: UID,
              file_name:file_name

            }, function() {
            /*optional stuff to do after success */
          }).done(function(data){
            //alert(data);
            let json_res = jQuery.parseJSON(data);
            if(json_res.status){

              $.simplyToast(json_res.message, 'success');
              show_doc_list(UID);
              return true;
            }else{
              $.simplyToast(json_res.message, 'danger');
               return false;
            }
          });
       }

       // function delete file from server
        

      // function click right 
      function clickRight(){

          $.contextMenu({
              selector: '.context-menu-one', 
              callback: function(key, options) {
                  //var m = "clicked: " + key;
                  //alert(m+" "+$(this).text());
                  let file_name =  $(this).text();
                  if(key == "delete"){
                    //alert("ลบไฟล์"+" "+file_name);
                     var conf = confirm("Are you sure to delete the file "+file_name+"?");

                    if(conf){
                      //alert("ลบ ไฟล์ "+file_name);
                      if(delete_file(UID,file_name)){
                        
                      }else{

                      }

                    }else{
                      //alert("ไม่ลบ ไฟล์ "+file_name);
                    }
                  }else if(key == "rename" ){
                    

                    $("#rename-modal").modal('show');
                    $("#name-doc-model").text("Document name : "+ file_name);
                    $("#input-rename").empty().val(file_name);
                    
                    $("#conf-rename").click(function() {
                      let last_name = $("#input-rename").val();
                      Rename_doc(file_name,last_name);
                      console.log($(this));
                      //alert(444);
                      
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
     // function click right 

     // function new Document
      function NewDoc(){
        let name_doc = "NewDocument.md";
        //alert("function new doc");
          $.post('Service/add_new_file.php', 
            {
              UID: UID,
              NewDoc:name_doc
            }, 
            function() {
            /*optional stuff to do after success */
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
            
            //alert(data);
          

          });
      }
     // function new Document

     // function rename
     function  Rename_doc(old_name,last_name){
        //alert("function rename "+old_name);
        alert("ไฟล์เก่า "+old_name+" "+"ไฟล์ใหม้ "+last_name);
       

     }

     // function rename

      
      //shot key command
      $(window).bind('keydown', function(event) {
          if (event.ctrlKey || event.metaKey) {
              switch (String.fromCharCode(event.which).toLowerCase()) {
              case 's':
                  event.preventDefault();
                  save_file();
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
    		

        //init function
        setup();
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
