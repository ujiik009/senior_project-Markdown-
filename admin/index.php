<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="stylesheet" type="text/css" href="../lib/css/jquery.dataTables.min.css">


</head>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Inconsolata:400,700&subset=latin,latin-ext);
html, body {
  font-family: "Inconsolata", monoscape;
  font-size: 14px;
}

body {
  background: #f66;
}

.terminal {
  position: relative;
  
 
  padding: 4em 1em 1em;
  font-size: 1.25em;
  background: rgba(0, 0, 0, 0.9);
 /* margin: 3em auto;*/
  border-radius: 3px;
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.5);
  color: #FFFFFF;
}
.terminal .head {
  position: absolute;
  display: block;
  width: calc(100% - 2em);
  color: #333;
  top: 0;
  left: 0;
  padding: 1em;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  background: #fafafa;
}

.prompt {
  display: inline;
}

.buttons, .title {
  width: auto;
  float: left;
}

.buttons {
  width: 5em;
}
.buttons * {
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #35cf76;
}
.buttons .close {
  background: #e74c3c;
}
.buttons .minimize {
  background: #f1c40f;
}
.buttons .maximize {
  background: #35cf76;
}

.typed-cursor {
  display: inline;
  opacity: 1;
  -webkit-animation: blink 0.7s infinite;
          animation: blink 0.7s infinite;
}

@-webkit-keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

</style>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"> <h3 style="padding: 0px;margin: 0px;"> VIEW LOG </h3></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					
				</form>
				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li id="log-sys"><a href="#" class=""><i class="lnr lnr-code"></i> <span>LOG SYSTEM</span></a></li>
						<li id="tb-user"><a href="#" class=""><i class="lnr lnr-file-empty"></i> <span>USER</span></a></li>					
						<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content" style="height: 100vh">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline" style="height: auto">
						
						<div class="panel-body">
							
<!-- ___________________________________________________________________________ -->

<!-- ___________________________________________________________________________ -->

							
						</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../lib/js/jquery-3.2.0.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="../lib/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../lib/js/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript">

		var component = {
			cmd:''
		};
		$(function(){
			$.get('template/cmd_component.html', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				component.cmd = data;
			});
		});
		
		$(function(){
			get_log_sys();
			
			$("#log-sys").click(function(event) {

				get_log_sys();
				$('#cmd').show();

			});

			$('#tb-user').click(function(event) {
				$('#cmd').hide();
				$.get('service/table_user.php', function() {
					/*optional stuff to do after success */
				}).done(function(data){
					$(".panel-body").html(data);
				},function(){
					 $('#example').DataTable();
				});
			});
		});


		function get_log_sys(){

			$.get('../log/log.log', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				let log_content = data;
				 log_content = 
				 log_content.replace(/\n/gm,"<br/>").
				 			 replace(/(\[error\])/gm,"<span style='color:red'>$1</span>").
				 			 replace(/(\[pass\])/gm,"<span style='color:#79ff75'>$1</span>")
				//console.log(log_content);
				$(".panel-body").html(component.cmd);
				$("#cmd-content").html(log_content);
				$("#cmd-title").html("system.log");

			});
		}


	</script>
</body>

</html>
