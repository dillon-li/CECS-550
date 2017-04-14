<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main2.css" />

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>


        <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">

        <title>Laravel</title>

        <!-- Styles -->
        <style>
            /* jssor slider bullet navigator skin 01 css */
            /*
            .jssorb01 div           (normal)
            .jssorb01 div:hover     (normal mouseover)
            .jssorb01 .av           (active)
            .jssorb01 .av:hover     (active mouseover)
            .jssorb01 .dn           (mousedown)
            */
            /*
            .jssorb01 {
                position: absolute;
            }
            .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
                position: absolute;
                width: 12px;
                height: 12px;
                filter: alpha(opacity=70);
                opacity: .7;
                overflow: hidden;
                cursor: pointer;
                border: #000 1px solid;
            }

            .jssorb01 div { background-color: gray; }
            .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
            .jssorb01 .av { background-color: #fff; }
            .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

            /* jssor slider arrow navigator skin 02 css */
            /*
            .jssora02l                  (normal)
            .jssora02r                  (normal)
            .jssora02l:hover            (normal mouseover)
            .jssora02r:hover            (normal mouseover)
            .jssora02l.jssora02ldn      (mousedown)
            .jssora02r.jssora02rdn      (mousedown)
            .jssora02l.jssora02lds      (disabled)
            .jssora02r.jssora02rds      (disabled)
            */
            /*
            .jssora02l, .jssora02r {
                display: block;
                position: absolute;
                width: 55px;
                height: 55px;
                cursor: pointer;
                background: url('img/a02.png') no-repeat;
                overflow: hidden;
            }
            .jssora02l { background-position: -3px -33px; }
            .jssora02r { background-position: -63px -33px; }
            .jssora02l:hover { background-position: -123px -33px; }
            .jssora02r:hover { background-position: -183px -33px; }
            .jssora02l.jssora02ldn { background-position: -3px -33px; }
            .jssora02r.jssora02rdn { background-position: -63px -33px; }
            .jssora02l.jssora02lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
            .jssora02r.jssora02rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }

            */

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .welcome_msg {
              font-weight:bold;
            }

            .g
            {
              font-size:20pt;
              color:#61b4e7;
              font-family:showcard Gothic;
            }
        </style>
    </head>

    <body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="/">UOFL</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
                      @if(Auth::guest())
											    <li><a href="/register">Sign Up</a></li>
											    <li><a href="/login">Log In</a></li>
                      @else
                          <li><a href="/cart">Cart ({{Cart::count()}})</a></li>
                          <li><a href="/home">Dashboard</a></li>
                          <li><a href="/account">Account</a></li>
                          <li><a href="/logout">Logout</a></li>
                      @endif
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
						<header>
							<h2>Cardinal Gear Shop</h2>
							<p>Your Source for Supporting the Cards</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">

								<section>
									<h4>Browse Our Categories</h4>

									<div class="box alt">
										<div class="row uniform 50%">
                      @foreach(\CECS550\Product::$categories as $category)

											    <div class="3u"><span class="image fit"><a href="/product/view/{{$category['name']}}"><img src={{$category['pic']}} alt="" /></a></span></div>
                      @endforeach
											<hr />

								</section>

								<hr />


							</div>
						</section>
					</article>

				<!-- Footer -->
					<footer id="footer">

						<ul class="copyright">
							<li>&copy; Cardinal Gearshop</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="/js/jquery.min.js"></script>
			<script src="/js/jquery.scrollex.min.js"></script>
			<script src="/js/jquery.scrolly.min.js"></script>
			<script src="/js/skel.min.js"></script>
			<script src="/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="/js/main.js"></script>

	</body>
</html>
