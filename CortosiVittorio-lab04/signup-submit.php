<?php include "top.html"; ?>
<?php include "common.php"; ?>
<?php
if ($_POST['name'] != null) {
    if (($result = checkName($_POST['name'])) == 0) {
        $i = 0;
        foreach ($_POST as $key => $vals) {
            $row[] = $_POST[$key];
        }
?>
        <p><strong>Thank you!</strong></p>
        <p>Welcome to NerdLuv, <?php $_POST['name'] ?></p>
        <p>Now <a href="./matches.php">log in to see your matches!</a></p>
<?php
        file_put_contents("singles.txt", implode(",", $row) . PHP_EOL, FILE_APPEND);
    } else if ($result == 1) {
        echo "name already exist";
    } else {
        echo "name must be not null";
    }
}

?>
<?php include "bottom.html"; ?>