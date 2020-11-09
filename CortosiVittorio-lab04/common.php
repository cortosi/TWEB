<?php
//functions

/*
Function che controlla se esiste un'utente già registrato con quel nome
@return: 0 se è tutto OK, 1 se il nome esiste già, -1 se si passa un valore non valido
*/
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

/*
Function che estrae le informazioni dal file in base all'utente passato come parametro
@return: array con le specifiche dell'utente dato come parametro
*/
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

/*
Function che controlla se esiste almeno una lettera compatibile tra i tipi dei due utenti
@return: true, se esiste almeno una lettera, false se non c'è corrispondenza
*/
function checkType($usr_type1, $usr_type2): bool
{
    for ($i = 0; $i < strlen($usr_type1); $i++) {
        if (preg_match("/" . $usr_type1[0] . "/i", $usr_type2)) {
            return true;
        }
    }
    return false;
}

/*
Function che estrae tutti gli utenti compatibili con l'utente passato come parametro
@return: array bi-dimensionale
*/
function getMatches($user)
{
    $file = fopen("./singles.txt", "r");
    $matches = [];
    while (!feof($file)) {
        $line = preg_split("/[,]/", fgets($file));
        if ($line[0] != $user[0]) { //l'utente che confronto non deve essere lo stesso
            if (($user[5] < $line[2]) && ($line[2] < $user[6])) { //controllo che l'età sia nel range opportuno
                if (($user[1] != $line[1]) && ($user[4] == $line[4]) && (checkType($user[4], $line[4]))) { //controllo Sesso, Sistema operativo e tipo
                    array_push($matches, $line);
                }
            }
        }
    }
    fclose($file);
    return $matches;
}
