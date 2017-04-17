<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
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
                          <li>
                            <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 logout
                            </a>
                          </li>
                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
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
							<p style="color:white">Your Source for Supporting the Cards</p>
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
