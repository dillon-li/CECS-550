<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css" />

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
    </head>

    <body>
      <!-- Main -->
      <section id="main">

          <!-- Banner -->
          <section id="banner" style="background-image:url('images/campus.png')">
            <div class="inner">
              <h1>Cardinal Gear Shop</h1>
                @if(Auth::guest())
                  <ul class="actions">
                    <li><a href="/register" class="button alt scrolly big">Register</a></li>
                  </ul>
                  <ul class="actions">
                    <li><a href="/login" class="button alt scrolly big">Sign In</a></li>
                  </ul>
                @else
                  <p>You are signed in!</p>
                  <ul class="actions">
                    <li><a href="/account" class="button alt scrolly big">Your Account</a></li>
                  </ul>
                @endif
            </div>
          </section>

          <!-- Gallery -->
          <section id="galleries">

          	<!-- Photo Galleries -->
          		<div class="gallery">
          			<header class="special">
          					<h2>What's new? (New product pics go below)</h2>
          			</header>
          									<div class="content">
          										<div class="media">
          											<a href="#"><img src="" alt="" title="This right here is a caption." /></a>
          										</div>
                              <div class="media">
          											<a href="#"><img src="" alt="" title="This right here is a caption." /></a>
          										</div><div class="media">
          											<a href="#"><img src="" alt="" title="This right here is a caption." /></a>
          										</div><div class="media">
          											<a href="#"><img src="" alt="" title="This right here is a caption." /></a>
          										</div><div class="media">
          											<a href="#"><img src="" alt="" title="This right here is a caption." /></a>
          										</div><div class="media">
          											<a href="#"><img src="" alt="" title="This right here is a caption." /></a>
          										</div>
          									</div>
          									<!--<footer>
          										<a href="#" class="button big">View Other Products</a>
          									</footer> -->
          								</div>
          						</section>

                      <!-- Contact -->
                      						<section id="contact">
                      							<!-- Social -->
                      								<div class="social column">
                      									<h3>About Us</h3>
                                        <p> SOME INFO HERE </p>
                                      <!--
                                        <h3>Follow Me</h3>
                                        <ul class="icons">
                      										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                      										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                      										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                      									</ul>
                                      -->
                      								</div>

                      							<!-- Form -->
                      								<div class="column">
                      									<h3>Contact Us</h3>
                      									<form action="#" method="post">
                      										<div class="field half first">
                      											<label for="name">Name</label>
                      											<input name="name" id="name" type="text" placeholder="Name">
                      										</div>
                      										<div class="field half">
                      											<label for="email">Email</label>
                      											<input name="email" id="email" type="email" placeholder="Email">
                      										</div>
                      										<div class="field">
                      											<label for="message">Message</label>
                      											<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
                      										</div>
                      										<ul class="actions">
                      											<li><input value="THIS DOESN'T DO ANYTHING YET" class="button" type="submit"></li>
                      										</ul>
                      									</form>
                      								</div>

                      						</section>

                      					<!-- Footer -->
                      						<footer id="footer">
                      							<div class="copyright">
                      								&copy;Copyright info; SOME FOOTER.
                      							</div>
                      						</footer>
                      				</section>
                      		</div>

                <!--
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
              -->
            </div>
    </body>
</html>
