<!DOCTYPE html>
<html lang="en">
<?php $movie = $_GET['film']?>
	<head>
		<title><?php echo $movie?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="movie.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rotten.gif" />
        <?php include './script.php'?>
	</head>
	<body>
		<div class="top-banner">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes">
        </div>
        <div class="header-title">
            <h1><?php echo trim(getInfo($movie)[0])." (".trim(getInfo($movie)[1]).")"?></h1>
        </div>
		<div class="content-wrapper">
            <div class="content">
                <div class="overview">
                    <?php $overview = getOverview($movie);?>
                    <div class="overview-img">
                        <img src="./<?php echo $movie?>/overview.png" alt="general overview">
                    </div>
                    <div class="overview-content">
                        <dl>
                            <?php for($i = 0; $i < sizeof($overview); $i++){ ?>
                                    <dt> <?php echo $overview[$i][0]; ?> </dt>
                                    <?php for($j = 1; $j < sizeof($overview[$i]); $j++){ ?>
                                        <dd> <?php echo $overview[$i][$j]; ?> </dd>
                                    <?php } 
                                } ?>
                        </dl>
                    </div>		
                </div>
                <div class="rotten">
                <?php $nreview = nReview($movie);?>
                    <div class="rotten-header">
                        <div class="rotten-logo">
                            <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?php
                            echo (getInfo($movie)[2] >= 60) ? "freshbig.png" : "rottenbig.png";?>" alt="Rotten">
                        </div>
                        <span class="rotten-n"><?php echo getInfo($movie)[2]."%"?></span>
                    </div>
                    <div class="rotten-content">
                    <?php $half = ($nreview % 2) == 0 ? (int)($nreview / 2) : (int)($nreview / 2) + 1;?>
                        <div class="rotten-content-left">
                            <?php for($i = 0; $i < $half; $i++){ 
                                    $review = getReview($movie, $i+1); ?>
                                    <p>
                                        <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?php echo strtolower($review[1])?>.gif" alt="<?php strtolower($review[1])?>">
                                        <q><?php echo $review[0]?></q>
                                    </p>
                                    <p>
                                    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
                                        <?php echo $review[2] ?><br>
                                        <span><?php echo $review[3] ?></span>
                                    </p>
                                <?php } 
                                ?>
                        </div>  
                        <div class="rotten-content-right">
                            <?php for($i = $half; $i < $nreview && ($i <= 10); $i++){ 
                                    $review = getReview($movie, $i+1); ?>
                                    <p>
                                        <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?php echo strtolower($review[1])?>.gif" alt="<?php strtolower($review[1])?>">
                                        <q><?php echo $review[0]?></q>
                                    </p>
                                    <p>
                                    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
                                        <?php echo $review[2] ?><br>
                                        <span><?php echo $review[3] ?></span>
                                    </p>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <p> <?php echo "(1-$nreview) of ".sizeof(glob("./$movie/review*.txt")).""?></p>
                </div>
            </div>
        </div>
        <div class="validators">
            <a href="http://validator.w3.org/check/referer">
                <img width="88" src="https://upload.wikimedia.org/wikipedia/commons/b/bb/W3C_HTML5_certified.png " alt="Valid HTML5!">
            </a> <br>
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!"></a>
        </div>
	</body>
</html>
