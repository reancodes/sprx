<?php
    include ("config/connect.class.php");
    include ("config/main.class.php");
    include ("config/user.class.php");
    include ("plugins/Emoji/emoji.php");
   $MAIN = new MainC();
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
  <title><?php echo SiteName; ?> - Downloads</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
    <a href="index.php" class="logo">
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
        <li class="active"><a href="Downloads.php"><i class="fa fa-download"></i> Downloads</a></li>
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
        <li class=""><a href="Support.php"><i class="fa fa-ticket"></i> Support Tickets</a></li>
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
        Downloads
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Downloads</li>
      </ol>
    </section>
    <section class="content">
		<div class="col-md-13">
		<br>
		  <div class="col-md-8" style="height:500px;">
          <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
				<tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 5000px">File</th>
                  <th style="width: 80px">Size</th>
                  <th style="width: 80px">Type</th>
                  <th style="width: 40px">Version</th>
                  <th style="width: 100px">Action</th>
                </tr>
				<?php
				    $DW = $DB->SelectAll("downloads");
					foreach($DW as $row){
						echo "<tr>
                  <td><center>". $row['id'] ."</center></td>
                  <td>". $row['filename'] ."</td>
                  <td><center>". $MAIN->FileSizeConvert(filesize('uploads/'.$row['filename'].'.'.$row['type'])) ."</center></td>
                  <td><center>". $row['type'] ."</center></td>
                  <td><center>". $row['Version'] ."</center></td>
                  <td>
				  <center>
				  <button onclick='Download(". $row['id'] .")' class='btn btn-primary btn-xs' title='Download ". $row['filename'] .".". $row['type'] ." Now!'><i class='fa fa-download'></i></button>";
				  if($MAIN->IsAdmin() || $MAIN->IsOWNER()) { echo "<button onclick='DeleteFile(". $row['id'] .")' class='btn btn-danger btn-xs' title='Delete ". $row['filename'] .".". $row['type'] ."'><i class='fa fa-remove'></i></button>"; }
				  echo "</center>
				  </td>
                </tr>";
					}
				?>
              </tbody>
			  </table>
            </div>
          </div>
          </div>
		  <div class="col-md-4" style="height:500px;">
		  <div class="box box-solid box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">Change log</h3>
            </div>
            <div class="box-body">
			    <div class='nav-tabs-custom'>
            <ul class='nav nav-tabs'>
			<?php
				$DW = $DB->SelectAll("downloads");
				foreach($DW as $row){
					echo 
					"
						<li class=''><a href='#tab_". $row['id'] ."' data-toggle='tab'>". $row['filename'] .".". $row['type'] ." -     v". $row['Version'] ."</a></li>
					";
				}
			?>
            </ul>
            <div class='tab-content'>
			   <?php
				$DW = $DB->SelectAll("downloads");
				foreach($DW as $row){
					echo 
					"
						<div class='tab-pane' id='tab_". $row['id'] ."'>
			                <p>". $DB->GetChangeLog($row['id'], $row['Version']) ."</p>
                        </div>
					";
				}
			    ?>
            </div>
          </div>
            </div>
        </div>
          </div>
	</section>
        </div>
  <?php include("dist/Footer.php"); ?>
	<?php
				    $DW = $DB->SelectAll("downloads");
					foreach($DW as $row2){
						echo "
						<a download id='Download". $row2['id'] ."' href='uploads/". $row2['filename'] .".". $row2['type'] ."' hidden value='". $row2['filename'] ."'>". $row2['filename'] ."</a>
						<input id='Download-". $row2['id'] ."' hidden value='". $row2['filename'] ."'/>";
					}
	?>
</div>
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
<script src="dist/js/jquery.toaster.js"></script>
<script>
function DeleteFile(id) {
  		var chatInput = id;
		$.ajax({
			type: "POST",
			url: "plugins/Downloads/DeleteFile.php",
			data: "id=" + id ,
			success: function(html) {
		        document.getElementById('Download'+id).click();
                $.toaster({ priority : 'success', title : 'Success', message : '<br>File Deleted!'});
			}
		});
  	}
	function Download(id) {
		var file = $('#Download-'+id).val();
		var exampleInputFile = document.getElementById("Download-"+id).value;
		$.ajax({
			type: "POST",
			url: "plugins/Downloads/Download.php",
 	        data : "filenm="+exampleInputFile,
			success: function(html) {
		        document.getElementById('Download'+id).click();
                $.toaster({ priority : 'success', title : 'Success', message : '<br>File Is Now Downloading!'});
			}
		});
  	}
</script>
</body>
</html>
   <?php } else { header("Location: login.php"); } ?>
