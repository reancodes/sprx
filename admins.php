<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Responsive vertical menu navigation</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="main.css">

		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>

		<style>
			.ad {
				position: absolute;
				width: 300px;
				height: 250px;
				border: 1px solid #ddd;
				left: 50%;
				transform: translateX(-50%);
				top: 250px;
				z-index: 10;
			}
			.ad .close {
				position: absolute;
				font-family: 'ionicons';
				width: 20px;
				height: 20px;
				color: #fff;
				background-color: #999;
				font-size: 20px;
				left: -20px;
				top: -1px;
				display: table-cell;
				vertical-align: middle;
				cursor: pointer;
				text-align: center;
			}
		</style>
		<script type="text/javascript">
			$(function() {
				$('.close').click(function() {
					$('.ad').css('display', 'none');
				})
			})
		</script>

	</head>
	<body>
		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>G.A.P</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>G.A.P</span>
			</div>
			<nav>
				<ul>
					<li class="active">
						<a href="#">
							<span><i class="fa fa-home"></i></span>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="users.php">
							<span><i class="fa fa-user"></i></span>
							<span>Users</span>
						</a>
					</li>
					<li>
						<a href="#">

							<span><i class="fa fa-envelope"></i></span>
							<span>Messages</span>
						</a>
					</li>
					<li>
						<a href="admins.php">
							<span><i class="fa fa-users"></i></span>
							<span>Admins</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Payments</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
				G.A.P Shop
			</div>
			<div class="box">
			<div class="center">
				G.A.P Shop
			</div>
			</div>
			</div>
		</div>
	</body>
</html>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large">1</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large">1</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">1</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large">1</div>
							<div class="text-muted">Boosted Users</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
  <!-- /.row -->
                <!--row -->
                <!--row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent sales
                                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                                    <select class="form-control pull-right row b-none">
                                        <option>October 2017</option>
                                    </select>
                                </div>
                            </h3>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
											<th>STEAM ID</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>BOOST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="txt-oflo">Test</td>
											<td>Test ID</td>
                                            <td class="text-danger">COMPLETED</td>
                                            <td class="txt-oflo">October 9th, 2017</td>
                                            <td class="text-danger">COMPLETE.</span></td>
                                        </tr>
                                        
                                    </tbody>
                                </table> <a href="#">Check all the sales</a> </div>
                        </div>
                    </div>
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Orders</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="1" ><span class="percent">1%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Comments</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="1" ><span class="percent">1%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Users</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="1" ><span class="percent">1%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Boosted Users</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="1" ><span class="percent">1%</span></div>
					</div>
				</div>
			</div>
					</div>
				</div>
			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">2017 Copyright by <a href="https://www.medialoot.com">ReanCodes</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
