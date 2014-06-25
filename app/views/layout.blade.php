<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gallery</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{ HTML::Style('css/bootstrap.min.css') }}
{{ HTML::Script('js/jquery.js') }}
{{ HTML::Script('js/jquery.js') }}
{{ HTML::Style('css/dzStyle.css') }}
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header" style="background:maroon">
    	<a class="navbar-brand" href="{{ URL::to('/')}}">Dashboard</a>
  	</div>
    <div class="col-md-8">
    	<div class="collapse navbar-collapse">
    		<ul class="nav navbar-nav">
          <li <?php  $exp = explode('/',Request::path()); if($exp[0] == 'branches'){ echo "class='active'"; } ?>><a href="{{ URL::route('branches.index')}}">Branches</a></li>
          <li <?php  $exp = explode('/',Request::path()); if($exp[0] == 'products' || $exp[0] == 'products'){ echo "class='active'"; } ?>><a href="{{ URL::route('products.index')}}">Items</a></li>
          <li <?php  $exp = explode('/',Request::path()); if($exp[0] == 'sales' || $exp[0] == 'sales'){ echo "class='active'"; } ?>><a href="{{ URL::route('sales.create')}}">Daily Sales</a></li>
    		</ul>
    	</div>
    </div>
    <div class="col-md-2">
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
          <li><a href="{{ URL::to('/user')}}">User</a></li>
          <li><a href="{{ URL::to('/logout')}}">Logout</a></li>
        </ul>
      </div>
    </div>
</nav>
<div class="container" style="margin-top:70px">
  @if(Session::has('message'))
      <p class="alert alert-success"><strong>{{ Session::get('message') }}</strong></p>
  @endif
	@yield('container')
</div>
<footer class="dzFooter nav navbar-inverse text-center" style="height:50px; padding-top:15px; color:#FFF ">
    Osasys &copy;  <?=date('Y')?> 
</footer>
</body>
</html>