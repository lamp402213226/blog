
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<title>CSS3红色下拉三级导航菜单 - 源码之家</title>
 <link rel="stylesheet" href="/h/css/nav_menu3.css" type="text/css" media="all" />

</head>
<body> 

<div class="nav_menu3">
	<ul>
		@foreach($common_cates_data as $k=>$v)
		<li class='nav-has-sub'><a href='#'>{{ $v->cname }}</a>
		  <ul>
		  	@foreach($v['sub'] as $kk=>$vv)
			 <li class='nav-has-sub'><a href='#'>{{ $vv->cname }}</a>
				<ul>
					@foreach($vv['sub'] as $kkk=>$vvv)
				   <li><a href='#'>{{ $vvv->cname }}</a></li>
				   @endforeach
				</ul>
			 </li>
			 @endforeach
		  </ul>
	   </li>
	   @endforeach
	</ul>
</div>

<div style="text-align:center;">
<p>更多源码：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>