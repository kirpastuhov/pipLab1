<html>
    <head>
      <meta charset="utf-8" />
      	<title>Results</title>
        <style>
    			body {
    					background-color: #b4b4b4;
    					height:100%;
    			    font-familY: Monospace;
    			    font-size: 19pt;

    			}
    			h3 {
    			font-familY: Monospace;
    			font-size: 19pt;
    			}
          .inputs {
            teXt-align: left;
    			  width: 100%;
    			  position: fiXed;
    			  padding-top: 20px;
    			}
    			.graph {
    				teXt-align: left;
    				padding-top: 150px;
    			}
    			.sharp {
    			border-radius: 0px;
    			}
          .btn-submit {
    			color: Black;
    			font-size: 24px;
    			padding: 15px 71px;
    			/* background-color: LightSlateGray; */
    			background-color: rgba(180, 180, 180, 0.7);
    			border-color: Black;
    			}
    			.btn-submit:hover{
    				/* background-color: SlateGrey;  */
    				background-color: rgba(195, 195, 195, 0.7);
    			}
    			.btn-submit:active{
    				background-color: SlateGrey; /* Цвет кнопки при нажатии */
    			}

          div[class="table"]{
            text-align: center;
          	display: inline-block;
            font-familY: Monospace;
      			font-size: 25pt;
            width: 100%;
            padding-bottom: 10px;
            padding-top: 10px;
          }
          div[class=time]{
            text-align: center;
          }
          div[class=submit]{
            text-align: center;
          }


    		</style>


    </head>


    <body>
      <div class="time">

      <?php

      // echo ini_set('error_reporting', E_ALL);
      // echo ini_set('display_errors', 1);
      // echo ini_set('display_startup_errors', 1);

  			$start_time = microtime(true);

  			$X = $_POST['inputX'];
  			$Y = $_POST['inputY'];
  			$R = $_POST['inputR'];

        // echo $X;
        // echo $Y;
        // echo $R;

        $A_X = -$R/2;
        $A_Y = 0;

        $B_X = 0;
        $B_Y = 0;

        $C_X = 0;
        $C_Y = $R;



        function IsInTriangle($A_X, $A_Y, $B_X, $B_Y, $C_X, $C_Y, $X, $Y)
        {

          $a = ($A_X - $X) * ($B_Y - $A_Y) - ($B_X - $A_X) * ($A_Y - $Y);
          $b = ($B_X - $X) * ($C_Y - $B_Y) - ($C_X - $B_X) * ($B_Y - $Y);
          $c = ($C_X - $X) * ($A_Y - $C_Y) - ($A_X - $C_X) * ($C_Y - $Y);

          if (($a >= 0 && $b >= 0 && $c >= 0) || ($a <= 0 && $b <= 0 && $c <= 0))
          {
            return true;
          }
          else
          {
            return false;
          }

        }
        function IsInCircle($R, $X, $Y)
        {
          if ($X >= 0 && $X <= ($R/2) &&
              $Y >= 0 && $Y <= ($R/2) &&
             ($X * $X + $Y * $Y) <= ($R * $R))
             {
               return true;
             }
          else {
            return false;
          }
        }

  			$IN = false;


  				if (!is_numeric($Y))
  				{
  					$IN ='Неверный формат Y!';
  				}
  				elseif(($Y>3)||($Y<-5))
  				{
  					$IN = 'Y не попадает в заданный диапазон [-5, 3]!';
  				}
  	      else
  				{
  	        if(($X >= 0 && $X <= $R/2 && $Y <= 0 && $Y >= -$R)) {$IN = "IN";}
  	        elseif (IsInCircle($R, $X, $Y)) {$IN = "IN";}
  	        elseif (IsInTriangle($A_X, $A_Y, $B_X, $B_Y, $C_X, $C_Y, $X, $Y)) {$IN = "IN";}
  	        else {$IN = "OUT";}

  	        $exec_time = (microtime(true) - $start_time) * pow(10,6);
  	        echo ("<br>Execution time: ".$exec_time."<br>");
  	        echo ("Current time: ".date("H:i:s <br><br>"));
  				}

		?>
    </div>
    <script src="inputCheck.js"></script>
    <div class="table">
      <font size="2" face="Courier New" >
      <table border="1" width="100%" cellpadding="5" align-center>
       <tr>
        <th>X</th>
        <th>Y</th>
        <th>R</th>
        <th>Result</th>
       </tr>
       <tr>
        <td align="center"><?php echo $X ?></td>
        <td align="center"><?php echo $Y ?></td>
        <td align="center"><?php echo $R ?></td>
        <td id="result" align="center"><?php echo $IN ?></td>
      </tr>
     </table>
   </div>
    <div class="submit">
          <button type="back" onclick="history.go(-1);" class="btn-submit sharp">Back</button>
    </div>
    </body>
</html>
