<?php include "top.html"; ?>
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

//functions
function checkName(string $name): int
{
    if ($name == null) {
        return -1;
    } else {
        $file = fopen("./singles.txt", "r");
        while (!feof($file)) {
            $line = preg_split("/[,]/", fgets($file));
            if ($line[0] == $name) {
                fclose($file);
                return 1;
            }
        }
        fclose($file);
        return 0;
    }
}

function getInfo(string $username)
{
    $file = fopen("./singles.txt", "r");
    while (!feof($file)) {
        $line = preg_split("/[,]/", fgets($file));
        if ($line[0] == $username) {
            fclose($file);
            return $line;
        }
    }
    return NULL;
}
?>
<?php include "bottom.html"; ?>