<!-- .navbar-expand-{sm|md|lg|xl}決定在哪個斷點以上就出現漢堡式選單 -->
<!-- navbar-dark 文字顏色 .bg-dark 背景顏色 -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

	<!-- .navbar-brand 左上LOGO位置 -->
	<a class="navbar-brand" href="/">
		<img src="{{asset('storage/aaa.jpg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
		<span class="h3 mx-1">杯波ㄟ亂來網頁</span>
	</a>
	<!-- .navbar-toggler 漢堡式選單按鈕 -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<!-- .navbar-toggler-icon 漢堡式選單Icon -->
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- .collapse.navbar-collapse 用於外層中斷點群組和隱藏導覽列內容 -->
	<!-- 選單項目&漢堡式折疊選單 -->

	<div class="collapse navbar-collapse" id="">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<div class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2 ml-sm-5" style='width:500px;' id='inputSearch' type="text" name='Search' placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="Search(this)">Search
					</button>
				</div> 
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="/cart">購物車
					<div class="circle ">
						<span class="p-2 ">
							@if(session()->has('cart'))
							{{session()->get('cart')->totalQty}}
							@else
							0
							@endif
						</span>
					</div>

				</a>

			</li>
			<li class="nav-item">
				<a class="nav-link" href="/orders">訂單</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/">去逛逛</a>
			</li>
			@guest
			<li class="nav-item"><a class="nav-link" href="/login">登入</a></li>
			@else
			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ Auth::user()->name }}
					<span class="caret"></span>
				</a>
				<div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="/logout">退出</a>
				</div>
			</li>
			@endguest
		</ul>
		<!-- @if (Route::has('login'))
		<div class="top-right links">
			@auth
			<a href="{{ url('/home') }}">Home</a>
			@else
			<a href="{{ route('login') }}">Login</a>

			@if (Route::has('register'))
			<a href="{{ route('register') }}">Register</a>
			@endif
			@endauth
		</div>
		@endif -->


	</div>

</nav>