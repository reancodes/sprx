<?php
    include ("config/connect.class.php");
    include ("config/main.class.php");
    include ("config/user.class.php");
    if($MAIN->IsLoggedIn()) { header("Location: index.php"); }
	   $DB->DB = new PDO('mysql:host='.HOST.';dbname='. DBNAME.'', USER, PASS);
?>
<html><head><style id="stndz-style"></style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo SiteName; ?> | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b><?php echo SiteName; ?></b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to <?php echo SiteName; ?></p>
	
      <div class="form-group has-feedback">
	  <label for="key">License key:</label>
        <input id="key" name="key" type="text" class="form-control" placeholder="0000-0000-0000">
        <span class="fa fa-key form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <input id="LoginY" onclick="Login()" onClick="Login()" type="button" class="btn btn-success btn-block btn-flat" value='Sign In'/>
        </div>
      </div>

    <a href="#">I Forgot My License key</a><br><br>
    <button onClick="window.location.href = 'Purchase.html';" class="btn btn-success btn-block text-center" <?php echo (($DB->GetSettings("Value", "2") == "1") ? "disabled" : ""); ?>>Buy New License Key Now!</button>
  </div>
</div>
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
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
<script type="text/javascript" src="dist/js/llogin.js"></script>
</body></html>