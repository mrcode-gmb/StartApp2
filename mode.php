<?php
class a{
	static function ddd($tm,$rcs = 0) {
		$cur_tm = time(); 
		$dif = $cur_tm-$tm;
		$pds = array('second','minute','hour','day','week','month','year','decade');
		$lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	
		for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
			$no = floor($no);
			if($no <> 1)
				$pds[$v] .='s';
			$x = sprintf("%d %s ",$no,$pds[$v]);
			if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0))
				$x .= time_ago($_tm);
			return $x;
	}
}
$time = 1694727411;
echo a::ddd($time);
echo time();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
	<title>Dark Mode</title>
	
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js">
	</script>
	
	<style>
		body{
		padding:10% 3% 10% 3%;
		text-align:center;
		}
		img{
			height:140px;
				width:140px;
		}
		h1{
		color: #32a852;
		}
		.mode {
			float:right;
		}
		.change {
			cursor: pointer;
			border: 1px solid #555;
			border-radius: 40%;
			width: 20px;
			text-align: center;
			padding: 5px;
			margin-left: 8px;
		}
		.dark{
			background-color: #222;
			color: #e6e6e6;
		}
	</style>
</head>

<body>
	<div class="mode">
		Dark mode:			
		<span class="change">OFF</span>
	</div>
	
	<div>
		<h1>GeeksforGeeks</h1>
		<p><i>A Computer Science Portal for Geeks</i></p>

		<h3>Light and Dark Mode</h3>
		
		<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20200122115631/GeeksforGeeks210.png">
		<p>
			Click on the switch on top-right
			to move to dark mode.
		</p>

	</div>
	
	<script>
		$( ".change" ).on("click", function() {
			if( $( "body" ).hasClass( "dark" )) {
				$( "body" ).removeClass( "dark" );
				$( ".change" ).text( "OFF" );
			} else {
				$( "body" ).addClass( "dark" );
				$( ".change" ).text( "ON" );
			}
		});
	</script>
</body>
</html>
