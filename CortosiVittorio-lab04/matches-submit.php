<?php include "top.html"; ?>
<?php include "common.php"; ?>
<div class="content-wrapper">
    <div class="matches">
        <?php $user = getInfo($_GET['name'])?>
        <?php $matches = getMatches($user)?>
        <p><strong>Matches for <?php echo $user[0]?></strong></p>
        <?php for($i = 0; $i < sizeof($matches); $i++){?>
        <div class="match">
            <img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg" alt="">
            <!-- <div class="match-img"></div>-->
            <div class="match-info">
                <p></p>
                <div class="match-info-left">
                    <ul>
                        <li><strong>Gender:</strong></li>
                        <li><strong>Ages:</strong></li>
                        <li><strong>Type:</strong></li>
                        <li><strong>OS:</strong></li>
                    </ul>
                </div>
                <div class="match-info-right">
                    <ul>
                        <li><?php echo $matches[$i][0]?></li>
                        <li><?php echo $matches[$i][2]?></li>
                        <li><?php echo $matches[$i][3]?></li>
                        <li><?php echo $matches[$i][4]?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php include "bottom.html"; ?>