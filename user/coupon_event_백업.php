<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/header.php';

	// $where = '';
	// if(isset($_SESSION['UID'])){
	// 		$where = "B.userid = '{$_SESSION['UID']}'";
	// }
  $couponid = $_SESSION['UID'];

  $sql2 = "SELECT cp.*, usercp.* FROM user_coupons usercp 
  JOIN coupons cp ON cp.cid = usercp.couponid  
  WHERE usercp.userid='{$couponid}'and usercp.use_max_date > Now()
  ORDER BY usercp.userid DESC";

  $result2 = $mysqli -> query($sql2);
  while($rs2 = $result2 -> fetch_object()){
      $rsc2[]=$rs2;
  }

?>
<script>
	// 쿠폰 데이터를 JavaScript 변수에 할당
	var couponData = <?php echo json_encode($rsc2); ?>;
</script>

<html>
	<head>
		<title>HTML5 Canvas Winning Wheel</title>
		<link rel="stylesheet" href="css/coup_event.css" type="text/css">
		<!-- <link rel="stylesheet" href="main.css" type="text/css" /> -->
		<script type="text/javascript" src="js/Winwheel.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
	</head>
	<body>
			<div align="center">
				<table cellpadding="0" cellspacing="0">
					<tr>
							<td>
									<div class="power_controls">
											<img id="spin_button" src="img/coup/coup_event/spin_off.png" alt="Spin" onClick="startSpin();" />
											<br /><br />
											&nbsp;&nbsp;<a href="#" onClick="resetWheel(); return false;">Play Again</a><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(reset)
									</div>
							</td>
							<td width="438" height="512" class="the_wheel" valign="center">
									<canvas id="canvas" width="434" height="512">
											<p style="color: white">Sorry, your browser doesn't support canvas. Please try another.</p>
									</canvas>
							</td>
					</tr>
				</table>
			</div>
			<script src="js/coup_event.js"></script>
	</body>
</html>

<?php

  require_once $_SERVER['DOCUMENT_ROOT'].'/attention/user/inc/footer.php';
	 
?>