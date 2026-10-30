@include('admin.include.header')

<div class="logo-block">
                      <a class="logo" href="">
                         <img class="f-logo" src="{{url('images/logo.png')}}" style="height:100px;width:100px" alt="logo"> 
                    </a>
                </div>

<div class="log-w3">
	<div class="w3layouts-main" style="    margin-top: 139px;">
		<h2>Sign In Now</h2>
			<form method="post" action="{{url('/admin/user-login')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="email" class="ggg" autocomplete="off" name="email" placeholder="Email" required="">
				<input type="password" class="ggg" autocomplete="off" name="password" placeholder="Password" required="">
				<div class="clearfix"></div>
				<input type="submit" name="login" value="submit">
			</form>	
	</div>
</div>


@include('admin.include.footer')