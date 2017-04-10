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
                  <ul>
                    <li><a href="/product/view/category/all" class="button alt scrolly big">Browse all products</a></li>
                  </ul>
                @else
                  <p>You are signed in!</p>
                  <ul class="actions">
                    <li><a href="/home" class="button alt scrolly big">Your Account</a></li>
                  </ul>
                  <ul>
                    <li><a href="/product/view/category/all" class="button alt scrolly big">Browse all products</a></li>
                  </ul>
                @endif
            </div>
          </section>

          <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: http://www.jssor.com -->
    <!-- This code works without jquery library. -->
    <!-- Slider not working currently
    <script src="js/jssor.slider-22.1.8.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:87.50,t:-87.50}},{b:11000,d:500,c:{x:-87.50,t:87.50}}],
              [{b:0,d:600,x:410,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:175.0,t:-175.0}},{b:0,d:800,c:{x:-175.0,t:175.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];

            var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 2000,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 700);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>
  -->
  <!--
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:600px;height:300px;overflow:hidden;visibil;">
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:300px;overflow:hidden;">
            <div>
                <img data-u="image" src="images/002.jpg" />

            </div>
            <div>
                <img data-u="image" src="images/007.jpg" />

            </div>
            <div>
                <img data-u="image" src="images/003.jpg" />

            </div>
            <div>
                <img data-u="image" src="images/004.jpg" />

            </div>
            <a data-u="any" href="http://www.jssor.com" style="display:none">Image Slider</a>
            <div>
                <img data-u="image" src="images/005.jpg" />

            </div>
        </div>
         Bullet Navigator -->
    <!--
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
            <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
         Arrow Navigator
        <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
     #endregion Jssor Slider End -->

          <!-- Gallery -->
          <section id="galleries">

          	<!-- Photo Galleries -->
          		<div class="gallery">
          			<header class="special">
          					<h2>Our Products:</h2>
          			</header>
          									<div class="content">
                              @foreach(\CECS550\Product::$categories as $category)
          									    <div class="media">
          											  <a href="/product/view/{{$category['name']}}"><img src={{$category['pic']}} /></a>
          										  </div>
                              @endforeach
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
