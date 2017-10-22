<?php
   include ("config/connect.class.php");
   include ("config/main.class.php");
   include ("config/user.class.php");
    include ("plugins/Emoji/emoji.php");
   if($MAIN->IsLoggedIn()) {
	   $theme1 = $DB->GetTheme1();
	   $theme2 = $DB->GetTheme2();
	   $DB->DO_Stuff();
	   if($_SESSION['rank'] == 0)
	   {
		   header("Location: pages/banned.php");
	   }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo SiteName; ?> - Support</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-<?php echo $theme1; ?> sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b><?php echo SiteName; ?></b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
		        echo "<img ";
				$IMG = $USER->GetImgUrlGetImgUrl($_SESSION['username']);
			    if (strpos($IMG, 'https://') !== false) {
    			  	echo "src='". $USER->GetImgUrlGetImgUrl($_SESSION['username'])."'";
			    }
				else{
					echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($_SESSION['username'])."'";
				}
				echo "  class='user-image'/>";
			?>
              <span class="hidden-xs"><?php echo $DB->SelectCustom("username", "users", "license", $_SESSION['license']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?php
		        echo "<img ";
				$IMG = $USER->GetImgUrlGetImgUrl($_SESSION['username']);
			    if (strpos($IMG, 'https://') !== false) {
    			  	echo "src='". $USER->GetImgUrlGetImgUrl($_SESSION['username'])."'";
			    }
				else{
					echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($_SESSION['username'])."'";
				}
				echo " class='img-circle'/>";
			?>
                <p>
                  <?php echo $DB->SelectCustom("username", "users", "license", $_SESSION['license']); ?>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="Messages.php"><i class="fa fa-envelope"></i> Messages</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="profile.php"><i class="fa fa-user"></i> Profile</a>
                  </div>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <?php
		        echo "<img ";
				$IMG = $USER->GetImgUrlGetImgUrl($_SESSION['username']);
			    if (strpos($IMG, 'https://') !== false) {
    			  	echo "src='". $USER->GetImgUrlGetImgUrl($_SESSION['username'])."'";
			    }
				else{
					echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($_SESSION['username'])."'";
				}
				echo " class='img-circle'/>";
			?>
        </div>
        <div class="pull-left info">
          <p><?php $DB->GetStyleIndex(); ?></p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main</li>
		<li class=""><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class=""><a href="Chat.php"><i class="fa fa-users"></i> Chat</a></li>
        <li class=""><a href="Downloads.php"><i class="fa fa-download"></i> Downloads</a></li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
		    <li class=""><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
		    <li class=""><a href="Messages.php"><i class="fa fa-envelope"></i> Messages</a></li>
          </ul>
        </li>
		<li class="header">Improvments</li>
        <li class="active"><a href="Support.php"><i class="fa fa-ticket"></i> Support Tickets</a></li>
        <li class=""><a href="Bugs.php"><i class="fa fa-bug"></i> Bugs</a></li>
        <li class=""><a href="Suggestions.php"><i class="fa fa-users"></i> Suggestions</a></li>
		<?php if($MAIN->IsAdmin() || $MAIN->IsOWNER() || $MAIN->IsStaff()) { ?>
		<li class="header">Control Panel</li>
        <li class=""><a href="admin/index.php"><i class="fa fa-cog"></i> Admin Dashboard</a></li>
		<?php } ?>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket"></i> Support Tickets
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Support Tickets</li>
      </ol>
    </section>
    <section class="content">
        <div class="col-md-12">
		<center>
		
		</center>
	</div>
	<?php
				if(isset($_GET['id']) && isset($_GET['action']) == "View")
				{ 
			         $ID = $_GET['id'];
	?>
	
	<div class="box box-<?php echo $theme2; ?> direct-chat direct-chat-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">Support Ticket - <?php echo "<span id='ID'>".$DB->GetTicket("id", $ID) ."</span>"; ?></h3>
            </div>
            <div class="box-body" style="height:400px;">
			<div class="col-md-13">
                <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $DB->GetTicket("Title", $ID); ?></h3>
                <h5>From: <b><?php echo $DB->GetTicket("By", $ID); ?></b>
                  <span class="mailbox-read-time pull-right"><?php echo $DB->GetTicket("DateTime", $ID); ?></span></h5>
              </div>
              <div class="mailbox-read-message">
                <p><?php echo emoticons($DB->GetTicket("Text", $ID)); ?></p>
				<input type="hidden" id="idd" name="idd" value="<?php echo $ID; ?>"/>
              </div>
            </div>
		</div>
              <div class="direct-chat-messages" id="chatbox" name="chatbox">
			     <?php $stmt = $DB->DB->prepare("SELECT * FROM `supportticketsreplies` WHERE `SID` = '$ID'");
    $ok = $stmt->execute();
	$result = $stmt -> fetchAll();
	foreach( $result as $row ) {
    	echo "<div class='direct-chat-msg'>
                  <img class='direct-chat-img' ";
				    $IMG = $USER->GetImgUrlGetImgUrl($row['From']);
				    if (strpos($IMG, 'https://') !== false) {
    			  		echo "src='". $USER->GetImgUrlGetImgUrl($row['From'])."'";
			        }
					else{
						echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($row['From'])."'";
					}
				  echo "' alt='Message User Image'>
                  <div class='direct-chat-text'>
                    <span class='direct-chat-name pull-left'>";
					echo" <b> ". $row['From'] ."</b> [". $row['MsgType'] ."] </span>: ". emoticons($row['Text']) ." <span class='direct-chat-timestamp pull-right'><b>". $MAIN->time_elapsed_string($row['DateTime']) ."</b></span>
                  </div>
                </div>";
	} ?>
              </div>
            </div>
            <div class="box-footer">
                <div class="input-group">
                    <input id="usermsg" name="usermsg" type="text" placeholder="Type Message ..." class="form-control">
                    <input id="pos" name="pos" type="hidden">
                      <span class="input-group-btn">
                        <button onclick="post()" id="subm" name="subm" type="submit" class="btn btn-<?php echo $theme2; ?> btn-flat">Send</button>
                      </span>
                </div>
            </div>
          </div>
				<?php } else { ?>
		<div class="col-md-13"><br>
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">Support Tickets</h3>
            </div>
            <div class="box-body">
			
			
			
			<div class="col-md-12">
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Ticket</h3>
			  
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="newssex1">Ticket Title:</label>
                      <input type="text" class="form-control" id="tickett1" placeholder="Enter Ticket Title">
                    </div>
                    <div class="form-group">
                      <label for="newssex2">Ticket Text:</label>
                      <textarea type="text" rows="5" placeholder="What's Your Problem?" id="tickett2" class="form-control"></textarea>
					</div>
					<div class="pull-right">
					    <button onClick="CreateTicket()" class="btn btn-<?php echo $theme2; ?>">Create Ticket</button>
					</div>
                </div>
              </div>
            </div>
          </div>
        </div>
				
              <div id='example2_wrapper' class='dataTables_wrapper form-inline dt-bootstrap'><div class='row'><div class='col-sm-6'>
			  </div>
			  <div class='col-sm-6'></div></div><div class='row'>
			  <div class='col-sm-12'>
			  <table id='example2' class='table table-bordered table-hover dataTable' role='grid' aria-describedby='example2_info'>
                <thead>
                <tr role='row'>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>ID</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Title</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Date</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Actions</th>
				</tr>
                </thead>
                <tbody>
			<?php
			$DB->db_connect();
			$stmt = $DB->DB->prepare("SELECT * FROM `supporttickets` WHERE `By` = '". $_SESSION['username'] ."'ORDER BY id DESC");
    		$ok = $stmt->execute();
			$result = $stmt -> fetchAll();
			foreach( $result as $rows ) {
				echo "
                <tr role='row' class='even'>
                  <td class='sorting_1'>". $rows['id'] ."</td>
                  <td>". $rows['Title'] ."</td>
                  <td>". date("Y/m/d H:i a", strtotime($rows['DateTime'])) ."</td>
                  <td><a href='Support.php?id=".$rows['id']."&action=View' class='text-link'><i class='fa fa-eye'></i> View</a></td>
                </tr>";
			}
			?>
				</tbody>
                <tfoot>
                <tr>
                </tfoot>
              </table></div></div>
            </div>
			
          </div>
        </div>
		</div>
				<?php } ?>
    </section>
  </div>
  <?php include("dist/Footer.php"); ?>
  <div class="control-sidebar-bg"></div>
</div>
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/js/jquery.toaster.js"></script>
<script>
	function CreateTicket() {
		var VR1 = $('#tickett1').val();
		var VR2 = $('#tickett2').val();
		$.ajax({
			type: "POST",
			url: "plugins/Tickets/CreateTicket.php",
			data: "tickett1=" + VR1 + "&tickett2=" + VR2 ,
			success: function(html) {
                   $.toaster({ priority : 'success', title : 'Success', message : '\nTicket Created!'});
				   setTimeout(location.reload.bind(location), 1000);
			}
		});
  	}
	$("#usermsg").keyup(function(event){
        if(event.keyCode == 13){
            $("#submitmsg").click();
        }
    });
	function post(){	
		var clientmsg = $("#usermsg").val();
		var ID = $("#idd").val();
		$.ajax ({
  		      url: "plugins/Tickets/post.php",
  	          type : "POST",
  	          cache : false,
 	          data : "ID2="+clientmsg+"&id="+ID+"&type=client",
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '\nComment Created!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
	}
</script>
</body>
</html>
   <?php } else { header("Location: login.php"); } ?>