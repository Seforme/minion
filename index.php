<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Игра в жизнь</title>
</head>
<body>
<style type="text/css">
	body {
		color: ;
	}

	.map {
		width: 620px;
		height: 620px;
		border: 1px solid black;
		display: -ms-flexbox;
		display: flex;
		margin-left: auto;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		-ms-flex-direction: row !important;
		flex-direction: row !important;
		position: relative;
	}

	.start {
		position: absolute;
		width: 50px;
		height: 50px;
		z-index: -1;
	}
	.finish {
		position: absolute;
		width: 50px;
		height: 50px;
		bottom: 0;
		z-index: -1;
	}
</style>

<img src="minion.png" alt="img" width="50" height="50" style="position: absolute; transition: .3s; z-index: 1;" id="minion">
	<div class="map">
		<img src="start.png" alt="start" class="start">
		<img src="finish.png" alt="finish" class="finish">
		<?php
			$num_string = 9;
		$k = 0;
			for($i = 1; $i < 101; $i++) {

				//				if ((($i-1)%10 == 0) || $num_string < 9) {
				$ch = $num_string + $i;
				if ($num_string == 0) $num_string = 9;

				if ($ch % 20 == 0 ) {
					$res = $ch-$k;
					if($k == 9){$num_string = 9;} else {$num_string--;}
					$k++;
				} else {
					$k=0;
					$res = $i;
				}

				echo "<div id='num{$res}' style='-ms-flex: 0 0 60px; flex: 0 0 60px; max-width: 60px; width: 60px; height: 60px; position: relative; text-align: center; font-size: 16px; line-height: 4; border: 1px solid #03a9f4;'>
<span>{$res}</span>
</div>";
			}
		?>
	</div>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript" src="site.js"></script>
<div style="position: absolute; top: 0; max-height: 600px; width: 100px; overflow: auto;">
<?php
/**
 * Created by PhpStorm.
 * User: sefor
 * Date: 2/22/2019
 * Time: 7:24 PM
 */

class Player
{
	public	$position=1;
}

function roll(){
	return random_int(1,6);
}
$player = new Player;
$finish=100;

while($player->position < $finish){
	if ($player->position == 1){
		@ob_flush();
		@ob_end_flush();
		@flush();
		sleep(3);
	}
	$action='';
	$i = roll();

	$player->position +=$i;
	if($player->position > 100) $player->position -=$i;
	if($player->position == 25 || $player->position == 55){
		$player->position +=10;
		$action ='ladder';
	}
	elseif($player->position % 9 == 0){
		$player->position -=3;
		$action ='snake';
	}
	echo  '<span>'. $i . '-' . $action . $player->position. '</span><br>';
	echo "<script type='text/javascript'>reception({$player->position})</script>";
	@ob_flush();
	@ob_end_flush();
	@flush();
	sleep(1);
}?>
</div>
</body>
</html>
