<!DOCTYPE HTML>
<!--
    Spectral by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>SIGN UP</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="css/main2.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    </head>
    <body>

        <!-- Page Wrapper -->
            <div id="page-wrapper">

                <!-- Header -->
                    <header id="header">
                        <h1><a href="index.html">UOFL</a></h1>
                        <nav id="nav">
                            <ul>
                                <li class="special">
                                    <a href="#menu" class="menuToggle"><span>Menu</span></a>
                                    <div id="menu">
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="generic.html">Generic</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                            <li><a href="signup.html">Sign Up</a></li>
                                            <li><a href="login.html">Log In</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </header>

                <!-- Main -->
                    <article id="main">
                        <header>
                            <h2>Sign up</h2>

                        </header>
                        <section class="wrapper style5">
                            <div class="inner">

                                <section>

                                    <center>
                                    <h2>Create new account:</h2>
                                    </center>

                                </section>

                                <section>

                                    <div class="row">


                                    </div>


                                </section>





                                <section>
                                <center>
                                    <form method="post" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                                        <div class="column uniform">
                                            <br/>
                                            <div class="6u 12u$(xsmall)">
                                                <input type="text" name="name" id="demo-name" value="{{old('name')}}" placeholder="Name" />
                                            </div>
                                                    <br/>
                                            <div class="6u$ 12u$(xsmall)">
                                                <input type="email" name="email" id="demo-email" value="{{old('email')}}" placeholder="Email" />
                                            </div>

                                            <br/>
                                            <div class="6u 12u$(xsmall)">
                                                <input type="text" name="username" id="demo-username" value="{{old('username')}}" placeholder="UserName" />
                                            </div>
                                            <br/>
                                            <div class="6u$ 12u$(xsmall)">
                                                <input type="password" name="password" id="demo-password" value="" placeholder="Password" />
                                            </div>
                                            <br/>
                                            <div class="6u$ 12u$(xsmall)">
                                                <input type="password" name="password_confirmation" id="demo-cpassword" value="" placeholder="ConfirmPassword" />
                                            </div>
                                        </center>

                                            <center>
                                            <div class="4u 12u$(small)">
                                                Gender:<input type="radio" id="demo-priority-low" name="gender" checked>
                                                <label for="demo-priority-low">Male</label>
                                                <input type="radio" id="demo-priority-normal" name="gender">
                                                <label for="demo-priority-normal">Female</label>
                                                <input type="radio" id="demo-priority-high" name="gender">
                                                <label for="demo-priority-high">NotSpecifed</label>
                                            </div>
                                            </center>
                                            <center>
                                            <div class="6u 12u$(medium)">
                                            <ul class="actions vertical">
                                            <button type="submit" class="button special fit">Sign up

                                            </ul>

                                        </div>
                                            </center>
                                        </div>
                                    </form>
                                </section>



                            </div>
                        </section>
                    </article>

                <!-- Footer -->
                    <footer id="footer">

                        <ul class="copyright">
                            <li>&copy; Cardinal Gear Shop</li>
                        </ul>
                    </footer>

            </div>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="assets/js/main.js"></script>

    </body>
</html>
