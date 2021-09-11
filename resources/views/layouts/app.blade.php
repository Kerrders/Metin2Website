<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap4-arkania.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{ asset('assets/js/less.min.js') }}"></script>


	<link rel="icon" type="image/vnd.microsoft.icon" href="icons/favicon.ico">
	<link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-touch-icon.png">
	<link rel="manifest" href="/icons/site.webmanifest">
	<link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#d55b5b">
	<link rel="shortcut icon" href="icons/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="/icons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

    <title>Arkania</title>
	</head>
	<body>
		<div id="loginModal">
			<div class="login-wrapper">
				<form>
				  <div class="form-group">
					<input type="text" placeholder="BENUTZERNAME">
				  </div>
				  <div class="form-group">
					<input type="password" placeholder="PASSWORT">
				  </div>
				  <input type="submit" value="EINLOGGEN"/>
				</form>
				<div class="g-recaptcha" data-theme="dark" data-sitekey="6LehpH0UAAAAADGhoVeBj62006W6rw_rkNktoxDB" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
			</div>
			<div class="bg"></div>
		</div>
		<nav class="mainNavBootstrap navbar navbar-light bg-light navbar-expand-sm">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <a class="navbar-brand" href="#">Arkania</a>
			  <div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item active">
					<a class="nav-link" href="#">Startseite</a>
				  </li>
				  <li class="nav-item"><a class="nav-link" href="#">Registration</a></li>
				  <li class="nav-item"><a class="nav-link" href="#">Download</a></li>
				  <li class="nav-item"><a class="nav-link" href="#">Rangliste</a></li>
				  <li class="nav-item"><a class="nav-link" href="#">Forum</a></li>
				  <li class="nav-item"><a class="nav-link" href="#">Vorstellung</a></li>
				</ul>
			  </div>
		</nav>
		<div id="wrapper">

			<div class="header">
				<div id="logo" data-tilt data-tilt-scale="1.05"></div>
				<div class="btn-group languageSelect">
					<input type="hidden" class="selectValue" value="de">
					<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<span class="currentVal"><img src="assets/img/flags/de.png" style="width:20%;" /> Deutsch</span>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a data-value="de" href="#"><img src="assets/img/flags/de.png" style="width:20%;"/> Deutsch</a></li>
						<li><a data-value="en" href="#"><img src="assets/img/flags/en.png" style="width:20%;"/> English</a></li>
						<li><a data-value="ro" href="#"><img src="assets/img/flags/ro.png" style="width:20%;"/> Romanian</a></li>
						<li><a data-value="tr" href="#"><img src="assets/img/flags/tr.png" style="width:20%;"/> Monkey</a></li>
					</ul>
				</div>
			</div>

			<div class="panelbtn openModal"></div>

			<div class="mainContainer">
                <div class="content">
					@yield('content')
                </div>
				<div class="sidebarContainer">
					<div class="sidebar">
						<div class="top">Serverstatus</div>
					</div>
					<div class="sidebar">
						<div class="top">@lang('messages.topTenPlayersTitle')</div>
							<table class="table table-striped">
							  <thead>
								<tr>
								  <th scope="col">Rang</th>
								  <th scope="col">Name</th>
								  <th scope="col">Level</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <th scope="row">1</th>
								  <td>Mark</td>
								  <td>150</td>
								</tr>
								<tr>
								  <th scope="row">2</th>
								  <td>Jacob</td>
								  <td>145</td>
								</tr>
								<tr>
								  <th scope="row">3</th>
								  <td>Larry</td>
								  <td>135</td>
								</tr>
								<tr>
								  <th scope="row">4</th>
								  <td>Larry</td>
								  <td>130</td>
								</tr>
								<tr>
								  <th scope="row">5</th>
								  <td>Larry</td>
								  <td>99</td>
								</tr>
								<tr>
								  <th scope="row">6</th>
								  <td>Larry</td>
								  <td>80</td>
								</tr>
								<tr>
								  <th scope="row">7</th>
								  <td>Larry</td>
								  <td>75</td>
								</tr>
								<tr>
								  <th scope="row">8</th>
								  <td>Larry</td>
								  <td>70</td>
								</tr>
								<tr>
								  <th scope="row">9</th>
								  <td>Larry</td>
								  <td>50</td>
								</tr>
								<tr>
								  <th scope="row">10</th>
								  <td>Larry</td>
								  <td>45</td>
								</tr>
							  </tbody>
							</table>
					</div>
					<div class="clear"></div>
				</div>
			</div>

		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="./assets/js/jquery-3.1.1.min.js"></script>
		<script src="./assets/js/jquery-ui.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script>
			$( ".openModal" ).click(function() {
				$("#loginModal").fadeIn("fast");
				$(".login-wrapper").slideDown(300);
			});
			$( ".bg" ).click(function() {
				$("#loginModal").fadeOut("fast");
				$(".login-wrapper").slideUp(200);
			});
			$(".languageSelect .dropdown-menu li a").click(function(e){
				e.preventDefault();

				var elem = $(this),
					languageSelect = elem.parents('.languageSelect'),
					val = elem.data('value');

				languageSelect.find('.currentVal').html(elem.html());
				languageSelect.find('.selectValue').val(val);
			});



//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
$(document).on("submit", "#msform", function(e){
    e.preventDefault();
    alert('it works!');
    return  false;
});
$(".next").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

	$(".previous").click(function(){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		
		//de-activate current step on progressbar
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		
		//show the previous fieldset
		previous_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale previous_fs from 80% to 100%
				scale = 0.8 + (1 - now) * 0.2;
				//2. take current_fs to the right(50%) - from 0%
				left = ((1-now) * 50)+"%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'left': left});
				previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});


var validator =	$('#msform').validate({ // initialize the plugin
        rules: {
            account: {
                required: true,
                minlength: 6,
								maxlength: 16,
            },
            uname: {
                required: true,
                minlength: 3,
								maxlength: 16,
            },
            pass: {
                required: true,
                minlength: 6,
								maxlength: 16,
            },
            pass2: {
                required: true,
                minlength: 6,
								maxlength: 16,
								equalTo: "#pass"
            },	
            email: {
                required: true,
                email: true,
            },	
            loeschcode: {
                required: true,
                minlength: 7,
								maxlength: 7,
            },	
            sicherheitsa: {
                required: true,
                minlength: 3,
								maxlength: 16,
            },	
            // captcha: {
                // required: true,
                // minlength: 5,
				// maxlength: 5,
				// number: true,
            // },			
        },					
    });			
		</script>
	<script>
			$( document ).ready(function() {
				$( 'select:not([name="freundesliste"])' ).selectmenu({
		classes: {
			"ui-selectmenu-menu": "select-jquery"
		}
		});
			});	
		</script>
		<script type="text/javascript" src="assets/js/vanilla-tilt.min.js"></script>
	</body>
</html>
