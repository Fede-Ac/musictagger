<!doctype html>
<html lang="{{ app()->getLocale() }}">
<!-- CAMBIAR A ESPAÑOL -->

<head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!- favicon.ico -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

    <title>MusicTagger</title> -->
	<title>Music Tagger</title>
	<link rel="stylesheet" href="flexboxgrid.min.css">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!--  <style>
        
        html,
        body {
            background-color: black;
            color: white;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 0px 50px;
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

        .links>a {
            color:#0EE2E5;
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

        .cabecera {
            height: 60px;
        }
        .alto{
        height: 180px;
      }
      .flex-container {
            display: flex;
            justify-content: center;
                      } 
    </style> -->
<style>

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

.contenedor {
	background: black;
	width:90%;
    max-width:1200px;
	margin:auto;

	/* Flexbox */
	display:flex;
	flex-flow:row wrap;
}

body {
	background:black;
    font-family: 'Raleway', sans-serif;
	font-weight: 600;
}

header {
	background:black;
	width:100%;
	padding:20px;
    border: 2px solid #0EE2E5;

	/* Flexbox */
	display: flex;
	justify-content:space-between;
	align-items:center;

	flex-direction:row;
	flex-wrap:wrap;
}

header .logo {
	color:#fff;
	font-size:30px;
}

header .logo img {
	width:80px;
	vertical-align: top;
}

header .logo a {
	color:#fff;
	text-decoration: none;
	line-height:80px;
}

header nav {
	width:50%;
	/* Flexbox */

	display:flex;
	flex-wrap:wrap;
	align-items:center;
}

header nav a {
	background:#c0392b;
	color:#fff;
	text-align: center;
	text-decoration: none;
	padding:10px;

	/* Flexbox */
	flex-grow:1;
}

header nav a:hover {
	background:#e74c3c;
}

.main {
	background:black;
	padding:20px;
	
	flex:1 1 100%;
	/*flex:1;*/
}


.main article {
	margin-top: 40px;
	padding-bottom:20px;
	font-size: 40px;
	text-align: center;
	font-weight: bold;
}

.main article .titulo1 {
		color:#ff3db5; 
}
.main article .titulo2 {
		color:#3df2ff; 
}
.main article .titulo3 {
		color:#74ff3d; 
}
.main article:nth-last-child(1){
	margin-bottom: 0;
	padding-bottom: 0;
	border-bottom:none;
}

.main .thumb {
margin-botton: 20px;
}

.main .thumb img {
width: 100%;

}
/* evento pasar mouse cambia a un texto
.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
}

.container:hover .overlay {
  opacity: 1;
}
*/
.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

.circular--square {
	border-radius: 80%;

}

aside {
	background:#e67e22;
	padding:20px;*/
	/*FLEX*/
	flex:1 1 30%;
	flex:0 0 300px;

	display: flex;
	flex-wrap:wrap;
	flex-direction:column;
	justify-content:flex-start;
}

aside .widget {
	background: #d35400;
	height:150px;
	margin:10px;
}

footer {
	background:black;
	width: 100%;
	padding:20px;
	border: 2px solid #0EE2E5;

	/* Flexbox */
	display: flex;
	flex-wrap:wrap;
	justify-content:space-between;
}

footer .links {
	background:#c0392b;
	display:flex;
	flex-wrap:wrap;
}

footer .links a {
	flex-grow:1;

	color:#fff;
	padding:10px;
	text-align: center;
	text-decoration:none;
}

footer .links a:hover {
	background:#E74C3C;
}

footer .social {
	background:#27f0f7;
}

footer .social a {
	color:#fff;
	text-decoration: none;
	padding:10px;
	display: inline-block;
}
.links>a {
            color:#0EE2E5;
            padding: 0 10px;
            text-decoration:none;
            }

@media screen and (max-width: 800px) {
	.contenedor {
		flex-direction:column;
	}

	header {
		flex-direction:column;
		padding:0;
	}

	header .logo {
		margin:20px 0;
	}

	header nav {
		width: 100%;
	}

   aside {
		flex-direction:row;
		flex:0;
	}

	aside .widget {
		flex-grow:1;
	}
}


@media screen and (max-width: 600px) {
	aside {
		flex-direction:column;
	}

	footer {
		justify-content:space-around;
	}
}
</style> 

</head>

<body>
      
    <div class="contenedor">
        
		<header>
            
			<div class="logo">
				<img src="images/logochico.jpg" width="" alt="">
				<a href="#">Music Tagger</a>
            </div>
            <div class="">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Iniciar sesión</a>
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endauth
                    </div>
                @endif
            </div> 
            <!-- <nav>
				<a href="#">Inicio</a>
				<a href="#">Blog</a>
				<a href="#">Proyectos</a>
				<a href="#">Contacto</a>
			</nav> -->
		</header>

		<section class="main">
			<article>
				<h2 class="titulo1">Etiqueta tus canciones!</h2>
			</article>
			<article>
				<h2 class="titulo2">Crea tus Playlist</h2>
			</article>
			<article>
				<h2 class="titulo3">Generos populares</h2>
				
			</article>

			<article>
				<h2 class="titulo"></h2>
				<p></p>
			</article>
			<div class="container-fluid">
				<div class="row around-xs">
				  <div class="thumb col-xs-6 col-sm-4 col-md-3">
					<img class="circular--square" src="images/hendrix.jpg" alt="...">
			      </div>
				  <div class="thumb col-xs-6 col-sm-4 col-md-3">
					<img class="circular--square" src="images/madonna.jpg" alt="...">
						</div>
						<div class="thumb col-xs-6 col-sm-4 col-md-3">
							<img class="circular--square" src="images/guetta.jpg" alt="...">
								</div>
								<div class="thumb col-xs-6 col-sm-4 col-md-3">
									<img class="circular--square" src="images/beethoven.jpg" alt="...">
										</div>
										<div class="thumb col-xs-6 col-sm-4 col-md-3">
											<img class="circular--square" src="images/armstrong.jpg" alt="...">
												</div>
												<div class="thumb col-xs-6 col-sm-4 col-md-3">
													<img class="circular--square" src="images/bee.jpg" alt="...">
														</div>
														
						
			</div> 
		</div>  
		</section>

		<!-- <aside>
			<div class="widget">
				<div class="imagen"></div>
			</div>

			<div class="widget">
				<div class="imagen"></div>
			</div>
		</aside> -->

		<footer>
			<!--<section class="links">
				<a href="#">Inicio</a>
				<a href="#">Blog</a>
				<a href="#">Proyectos</a>
				<a href="#">Contacto</a>
			</section> -->
			<div class="card-footer">
				@include('layouts.footer')
			</div>

			<div class="social">
				<a href="#">FB</a>
				<a href="#">TW</a>
			</div>
		</footer>
	</div>
    
</body>

</html>
