<?php
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

function checkType($usr_type1, $usr_type2): bool
{
    for ($i = 0; $i < strlen($usr_type1); $i++) {
        if (preg_match("/" . $usr_type1[0] . "/i", $usr_type2)) {
            return true;
        }
    }
    return false;
}

// line5 < line 2 < line 6

function getMatches($user)
{
    $file = fopen("./singles.txt", "r");
    $matches = [];
    while (!feof($file)) {
        $line = preg_split("/[,]/", fgets($file));
        if ($line[0] != $user[0]) {
            if (($user[5] < $line[2]) && ($line[2] < $user[6])) {
                if (($user[1] != $line[1]) && ($user[4] == $line[4]) && (checkType($user[4], $line[4]))) {
                    array_push($matches, $line);
                }
            }
        }
    }
    fclose($file);
    return $matches;
}
