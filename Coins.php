<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coins v2.2</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
// Check for coin code parameter
if (isset($_GET['coin'])) {
        if (filter_var($_GET['coin'], FILTER_SANITIZE_SPECIAL_CHARS)) {
            $coin = $_GET['coin'];
        }
    }else {
		$coin = null;
	}
if (isset($_GET['flush'])) {
        if (filter_var($_GET['flush'], FILTER_SANITIZE_SPECIAL_CHARS)) {
            $flush = $_GET['flush'];
        }
    }else {
		$flush = false;
	}
// Include the required Class file
include('PAI_Coins.php');
$Coins = new PAI_Coins;
$Coinsversion = $Coins::version;
$data = $Coins->getCoins($coin,$flush);

?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Coins
					<?php
					echo ("<small>v{$Coinsversion}</small>\n");
					?>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <h3>
                    <a href="#">Coins</a>
                </h3>
				<?php
				echo ("<table border='1' width='90%' >\n");
				echo ("<tr><th>Coin</th><th>Price</th></tr>\n");
				//now echo to table
				foreach($data[1] as $item) {
					echo("<tr>\n");
					echo("<td>" . $item[0] . "</td>\n");
					echo("<td>" . $item[1] . "</td>\n");
					echo("</tr>\n");
				}
				?>
				</table>
            </div>
        </div>
        <!-- /.row -->

        <hr>


        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-md-12">
                    <p>Data source: CryptoCompare.com at <?php echo (date("Y-m-d h:i:s A",$data[0]));?></p>
                    <p>Copyright &copy; 2018 Pathfinder Associates, Inc.</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
