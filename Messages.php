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
  <title><?php echo SiteName; ?> - Dashboard</title>
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
		    <li class="active"><a href="Messages.php"><i class="fa fa-envelope"></i> Messages</a></li>
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
        Messages
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Messages</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        
		<?php if( !(isset($_GET['id']))) { ?>
		<div class="col-md-12">
          <div class="box box-<?php echo $theme2; ?>">
            <div class="box-body no-padding">
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Inbox" data-toggle="tab">Inbox</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="Inbox">
			  <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
				    <?php
			      $stmt = $DB->DB->prepare("SELECT * FROM `messages` WHERE `To` = '". $_SESSION['username'] ."'");
   			      $ok = $stmt->execute();
				  $result = $stmt -> fetchAll();
				  foreach( $result as $row ) {
                    echo "<tr>
                      <td class='mailbox-name'><a href='Messages.php?id=". $row['id'] ."&action=View'>"; 
					  $TITLE = $row['Sender'];
					  $IDD = $DB->GetUSER("id", $row['Sender']);
  		    		  $INDEX = $DB->GetUSER("customindex", $IDD);
					  if($INDEX != 0) {
				 		  if($INDEX == 0){
				 			  echo $TITTLEE;
						  }
				 		  else if($INDEX == 1){
				 		  	echo "<span style='color:red; text-shadow:2px 2px 4px grey; '><span style='background-image: url(&quot;http://i.imgur.com/G7wALmA.gif&quot;); color: white; font-weight: bold'>". $TITLE ."</span></span>";
				 		  }
						  else if($INDEX == 2){
						  	echo "<span style='color: #872657; font-weight: bold;'><span style='text-shadow:1px 1px 0px #01DF01; '><font color='#FF00FF'><b>". $TITLE ."</b></font></span></span>";
						  }
						  else if($INDEX == 3){
						  	echo "<span style='font-weight: bold; color: #FF8040;'><span style='text-shadow: 0px 0px 0.2em black, 0px 0px 0.2em black, 0px 0px 0.2em black; '>". $TITLE ."</span></span>";
						  }
						  else if($INDEX == 55){
						  	echo "<span style='color:red; text-shadow:2px 2px 4px grey; '>". $TITLE ."</span>";
						  }
						  else {
						    echo $TITTLEE;
						  }
					  } echo "</a></td>
                      <td class='mailbox-subject'><b>" . $row['Title'] . "</b> - ". substr($row['Text'], 0, 25) ."</td>
                      <td class='mailbox-date'>". $MAIN->time_elapsed_string($row['DateTime']) . "</td>
                    </tr>
				  ";
				  }
				  ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
		<?php } else if(isset($_GET['id']) && $_GET['action'] == "View") { $ID = $_GET['id']; ?>
		<div class="col-md-12">
          <div class="box box-<?php echo $theme2; ?>">
		  <div class="box-header with-border">
              <h3 class="box-title"><?php echo $DB->GetMessage("Title", $ID); ?></h3>
            </div>
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h5>From: <?php echo $DB->GetStyleIndex($DB->GetUser("id", $DB->GetMessage("Sender", $ID)), $DB->GetMessage("Sender", $ID)); ?>
                  <span class="mailbox-read-time pull-right"><?php echo $MAIN->time_elapsed_string($DB->GetMessage("DateTime", $ID)); ?></span></h5>
              </div>
              <div class="mailbox-read-message">
				<p>
				<?php
				   echo emoticons($DB->GetMessage("Text", $ID));
				?></p><br><br>
              </div>
            </div>
          </div>
        </div>
		<?php } ?>
      </div>
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
<script>
    /***********************************************************************************
* Add Array.indexOf                                                                *
***********************************************************************************/
(function ()
{
	if (typeof Array.prototype.indexOf !== 'function')
	{
		Array.prototype.indexOf = function(searchElement, fromIndex)
		{
			for (var i = (fromIndex || 0), j = this.length; i < j; i += 1)
			{
				if ((searchElement === undefined) || (searchElement === null))
				{
					if (this[i] === searchElement)
					{
						return i;
					}
				}
				else if (this[i] === searchElement)
				{
					return i;
				}
			}
			return -1;
		};
	}
})();
/**********************************************************************************/

(function ($,undefined)
{
	var toasting =
	{
		gettoaster : function ()
		{
			var toaster = $('#' + settings.toaster.id);

			if(toaster.length < 1)
			{
				toaster = $(settings.toaster.template).attr('id', settings.toaster.id).css(settings.toaster.css).addClass(settings.toaster['class']);

				if ((settings.stylesheet) && (!$("link[href=" + settings.stylesheet + "]").length))
				{
					$('head').appendTo('<link rel="stylesheet" href="' + settings.stylesheet + '">');
				}

				$(settings.toaster.container).append(toaster);
			}

			return toaster;
		},

		notify : function (title, message, priority)
		{
			var $toaster = this.gettoaster();
			var $toast  = $(settings.toast.template.replace('%priority%', priority)).hide().css(settings.toast.css).addClass(settings.toast['class']);

			$('.title', $toast).css(settings.toast.csst).html(title);
			$('.message', $toast).css(settings.toast.cssm).html(message);

			if ((settings.debug) && (window.console))
			{
				console.log(toast);
			}

			$toaster.append(settings.toast.display($toast));

			if (settings.donotdismiss.indexOf(priority) === -1)
			{
				var timeout = (typeof settings.timeout === 'number') ? settings.timeout : ((typeof settings.timeout === 'object') && (priority in settings.timeout)) ? settings.timeout[priority] : 1500;
				setTimeout(function()
				{
					settings.toast.remove($toast, function()
					{
						$toast.remove();
					});
				}, timeout);
			}
		}
	};

	var defaults =
	{
		'toaster'         :
		{
			'id'        : 'toaster',
			'container' : 'body',
			'template'  : '<div></div>',
			'class'     : 'toaster',
			'css'       :
			{
				'position' : 'fixed',
				'top'      : '10px',
				'right'    : '10px',
				'width'    : '300px',
				'zIndex'   : 50000
			}
		},

		'toast'       :
		{
			'template' :
			'<div class="alert alert-%priority% alert-dismissible" role="alert">' +
				'<button type="button" class="close" data-dismiss="alert">' +
					'<span aria-hidden="true">&times;</span>' +
					'<span class="sr-only">Close</span>' +
				'</button>' +
				'<span class="title"></span>: <span class="message"></span>' +
			'</div>',

			'css'      : {},
			'cssm'     : {},
			'csst'     : { 'fontWeight' : 'bold' },

			'fade'     : 'slow',

			'display'    : function ($toast)
			{
				return $toast.fadeIn(settings.toast.fade);
			},

			'remove'     : function ($toast, callback)
			{
				return $toast.animate(
					{
						opacity : '0',
						padding : '0px',
						margin  : '0px',
						height  : '0px'
					},
					{
						duration : settings.toast.fade,
						complete : callback
					}
				);
			}
		},

		'debug'        : false,
		'timeout'      : 1500,
		'stylesheet'   : null,
		'donotdismiss' : []
	};

	var settings = {};
	$.extend(settings, defaults);

	$.toaster = function (options)
	{
		if (typeof options === 'object')
		{
			if ('settings' in options)
			{
				settings = $.extend(settings, options.settings);
			}

			var title    = ('title' in options) ? options.title : 'Notice';
			var message  = ('message' in options) ? options.message : null;
			var priority = ('priority' in options) ? options.priority : 'success';

			if (message !== null)
			{
				toasting.notify(title, message, priority);
			}
		}
	};

	$.toaster.reset = function ()
	{
		settings = {};
		$.extend(settings, defaults);
	};
})(jQuery);
</script>
</body>
</html>
   <?php } else { header("Location: login.php"); } ?>