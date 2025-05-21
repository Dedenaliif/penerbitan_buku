
<!DOCTYPE html>
<html lang="en">

<head>
	@include('marketplace.head')
</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

	<div id="header-wrap">

		<div class="top-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<div class="social-links">
							<ul>
								<li>
									<a href="#"><i class="icon icon-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-youtube-play"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon icon-behance-square"></i></a>
								</li>
							</ul>
						</div><!--social-links-->
					</div>
					<div class="col-md-6">
						<div class="right-element">
							<a href="#" class="user-account for-buy"><i
									class="icon icon-user"></i><span>Account</span></a>
							<a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i><span>Cart:(0
									$)</span></a>

						</div><!--top-right-->
					</div>

				</div>
			</div>
		</div><!--top-content-->

		<header id="header">
			<div class="container-fluid">
				<div class="row">

					<div class="col-md-2">
						<div class="main-logo">
							<h4>CRP</h4>
						</div>

					</div>

					<div class="col-md-10">

						@include('marketplace.navbar')

					</div>

				</div>
			</div>
		</header>

	</div><!--header-wrap-->

	@include('marketplace.billboard')

	<section id="client-holder" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="logo-wrap">
						<div class="grid">
							<a href="#"><img src="{{ asset('assets/images/client-image1.png') }}" alt="client"></a>
							<a href="#"><img src="{{ asset('assets/images/client-image2.png') }}" alt="client"></a>
							<a href="#"><img src="{{ asset('assets/images/client-image3.png') }}" alt="client"></a>
							<a href="#"><img src="{{ asset('assets/images/client-image4.png') }}" alt="client"></a>
							<a href="#"><img src="{{ asset('assets/images/client-image5.png') }}" alt="client"></a>
						</div>
					</div><!--image-holder-->
				</div>
			</div>
		</div>
	</section>

    @include('marketplace.featured')

    @include('marketplace.popular')

	@include('marketplace.footer')

	@include('marketplace.script')

</body>

</html>