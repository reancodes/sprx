<?php
    include ("config/connect.class.php");
    include ("config/main.class.php");
    include ("config/user.class.php");
    include ("plugins/Emoji/emoji.php");
    if($MAIN->IsLoggedIn()) {
	    $theme1 = $DB->GetTheme1();
	    $theme2 = $DB->GetTheme2();
	    if($_SESSION['rank'] == "0")
	    {
		    header("Location: pages/banned.php");
	    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo SiteName; ?> - Profile</title>
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
		    <li class="active"><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
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
		<?php
		if(isset($_GET['id'])){
			$ID = $_GET['id'];
		}
		else {
		    $ID = $_SESSION['id'];
		}
		?>
    <section class="content-header">
      <h1>
        <?php echo $DB->GetUSER("username", $ID) . "'s Profile"; ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> <?php echo $DB->GetUSER("username", $ID) . "'s Profile"; ?></li>
      </ol>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <div class="box box-<?php echo $theme2; ?>">
            <div class="box-body box-profile">
			
			<?php
		        echo "<img ";
				$IMG = $USER->GetImgUrlGetImgUrl($DB->GetUSER("username", $ID));
			    if (strpos($IMG, 'https://') !== false) {
    			  	echo "src='". $USER->GetImgUrlGetImgUrl($DB->GetUSER("username", $ID))."'";
			    }
				else{
					echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($DB->GetUSER("username", $ID))."'";
				}
				echo " class='profile-user-img img-responsive img-circle'>";
			?>

              <h3 class="profile-username text-center"><?php $DB->GetStyleIndex($ID, $DB->GetUSER("username", $ID)); ?></h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Rank:</b> <span class="pull-right text-primary"><?php echo $MAIN->GetRank($DB->GetUSER("rank", $ID)); ?></span>
                </li>
                <li class="list-group-item">
                  <b>Times Logged In:</b> <span class="pull-right text-primary">0</span>
                </li>
                <li class="list-group-item">
                  <b>Joined:</b> <span class="pull-right text-primary"><?php echo $MAIN->time_elapsed_string($DB->GetUSER("DateJoined", $ID)); ?></span>
                </li>
              </ul>
            </div>
          </div>
          <div class="box box-<?php echo $theme2; ?>">
            <div class="box-header with-border">
              <h3 class="box-title">About <?php echo (($ID == $_SESSION['id']) ? "Me" : $DB->GetUSER("username", $ID)); ?>:</h3>
            </div>
            <div class="box-body">
              <?php echo $DB->GetUSER("bio", $ID);?>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <?php if($ID == $_SESSION['id']) { ?><li><a href="#settings" data-toggle="tab" >Settings</a></li> <?php } ?>
              <?php if($ID == $_SESSION['id']) { ?><li><a href="#LoginHistory" data-toggle="tab" >Login History</a></li> <?php } ?>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
			  <?php
			   if($ID == $_SESSION['id']) {
				   ?>
				   <div class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9"> 
                        <input id="mind" name="mind" class="form-control input-sm" placeholder="What's in your mind?">
                      </div>
                      <div class="col-sm-3">
                        <button onclick='pPost()' onClick='pPost()' type="button" class="btn btn-<?php echo $theme2; ?> pull-right btn-block btn-sm">post</button>
                      </div>
                    </div>
                  </div>
				   <?php
			   }
			  ?><br>
			  <?php 
			  $stmt = $DB->DB->prepare("SELECT * FROM `user_activity` WHERE `username` = '".$DB->GetUSER("username", $ID)."' ORDER BY `DateTime` DESC LIMIT 4");
              $ok = $stmt->execute();
	          $result = $stmt -> fetchAll();
	          foreach( $result as $row ) {
		          echo "<div class='post'>
                  <div class='user-block'>";
				  echo "<img ";
						$IMG = $USER->GetImgUrlGetImgUrl($DB->GetUSER("username", $ID));
			   		    if (strpos($IMG, 'https://') !== false) {
    			  			echo "src='". $USER->GetImgUrlGetImgUrl($DB->GetUSER("username", $ID))."'";
			    		}
						else{
							echo "src='dist/img/users/" . $USER->GetImgUrlGetImgUrl($DB->GetUSER("username", $ID))."'";
						}
						echo " class='img-circle img-bordered-sm'>";
				  echo "<span class='username text-$theme2'>
                          <a href='#'>".$row['username']."</a>
                        </span>
                    <span class='description'>Shared publicly - ". $MAIN->time_elapsed_string($row['DateTime']) ."</span>
                  </div>
                  <p>
				  ". emoticons($row['text']) ."
                  </p>
                </div>";
	          } 
	          ?>
              </div>
			  <?php if($ID == $_SESSION['id']) { ?>
              <div class="tab-pane" id="settings">
                <div class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName"name="inputName" placeholder="Your Username Name" value="<?php echo $DB->GetUSER("username", $ID); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Your Email" value="<?php echo $DB->GetUSER("email", $ID); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="themeid" class="col-sm-2 control-label">Theme:</label>
                    <div class="col-sm-10">
                       <select id="themeid" name="themeid" class="form-control">
					      <option <?php echo (($DB->GetUSER("theme", $ID) == "red") ? "selected" : ""); ?> value="red">red</option>
					      <option <?php echo (($DB->GetUSER("theme", $ID) == "green") ? "selected" : ""); ?> value="green">green</option>
					      <option <?php echo (($DB->GetUSER("theme", $ID) == "yellow") ? "selected" : ""); ?> value="yellow">yellow</option>
					      <option <?php echo (($DB->GetUSER("theme", $ID) == "blue") ? "selected" : ""); ?> value="blue">blue</option>
					      <option <?php echo (($DB->GetUSER("theme", $ID) == "purple") ? "selected" : ""); ?> value="purple">purple</option>
					   </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" onClick="EditUserProfile()" class="btn btn-<?php echo $theme2; ?>">Save Changes</button>
                    </div>
                  </div>
                </div>
              </div>
			  
			  
			  <div class="tab-pane" id="LoginHistory">
                <div class="form-horizontal">
                  <table id='example2' class='table table-bordered table-hover dataTable' role='grid' aria-describedby='example2_info'>
                <thead>
                <tr role='row'>
				<th class='sorting_asc' tabindex='0' aria-controls='example2' rowspan='1' colspan='1' aria-sort='ascending'>Username</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Type</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>IP</th>
				<th class='sorting' tabindex='0' aria-controls='example2' rowspan='1' colspan='1'>Date</th>
				</tr>
                </thead>
                <tbody>
			    <?php
			        $DB->db_connect();
					$stmt = $DB->DB->prepare("SELECT * FROM `login_history` WHERE `username` = '" . $_SESSION['username'] ."'");
    				$ok = $stmt->execute();
					$result = $stmt -> fetchAll();
					foreach( $result as $rows ) {
						echo "
                		    <tr role='row' class='even'>
                		        <td>". $rows['username'] ."</td>
                		        <td>". $rows['type'] ."</td>
                		        <td>". $rows['ip'] ."</td>
                		        <td>". $MAIN->time_elapsed_string($rows['DateTime']) ."</td>
                            </tr>";
			        }
			    ?>
				</tbody>
              </table>
                </div>
              </div>
			  <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include("dist/Footer.php"); ?>
</div>
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
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
<script src="dist/js/profile.js"></script>
<script>
function pPost() {
		var clientmsg = $("#mind").val();
		if(clientmsg == ""){
                   $.toaster({ priority : 'info', title : 'Info', message : '\nType Something!'});
		}
		else {
		$.ajax ({
  		      url: "plugins/Profile/post.php",
  	          type : "POST",
  	          cache : false,
 	          data : "mind="+clientmsg,
  	          success: function(response)
  	          {
                   $.toaster({ priority : 'success', title : 'Success', message : '<br/>Post Created!'});
				   setTimeout(location.reload.bind(location), 1000);
  	          }
  	    });
		}
	}
	function EditUserProfile() {
		var clientmsg1 = $("#inputName").val();
		var clientmsg2 = $("#inputEmail").val();
	    var inputRank = document.getElementById("themeid");
		var theme = inputRank.options[inputRank.selectedIndex].value;
		if(clientmsg1 == "" || clientmsg2 == ""){
                   $.toaster({ priority : 'error', title : 'Error', message : '\n!'});
		}
		else {
			$.ajax({
				type: "POST",
				url: "plugins/Profile/edit.php",
				data: "name="+clientmsg1+"&email="+clientmsg2+"&theme="+theme,
				success: function(response) {
                   $.toaster({ priority : 'success', title : 'Success', message : '<br/>Profile Updated!'});
				   setTimeout(location.reload.bind(location), 1000);
				}
			});
		}
  	}
	</script>
</body>
</html>
   <?php } else { header("Location: login.php"); } ?>