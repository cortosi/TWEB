<?php

/*
Funzione che permette di estrarre il contenuto del file "info.txt"
@return: array in cui ogni posizione è una riga del file
*/
function getInfo(string $file_name) {
    return file("./".$file_name."/info.txt");
};

/*
Funzione conta il numero di review
@return: intero, numero delle review (massimo 10)
*/
function nReview($file_name) : int{
    return sizeof(glob("./$file_name/review*.txt")) < 10 ? sizeof(glob("./$file_name/review*.txt")) : 10;
}

/*
Funzione che estrae il contenuto del file "overview.txt"
@return: array bi-dimensionale, in cui ogni posizione a indice [0][0], indica 
         l'intestazione, i restanti valori di riga ([0][1], [0][1], ...) indicano
         i valori della lista
*/
function getOverview(string $file_name){
    $rows = file("./".$file_name."/overview.txt");
    for($i = 0; $i < sizeof($rows); $i++){
        $rows[$i] = preg_split("/[:]/", $rows[$i]);
    }
    return $rows;
}

/*
Funzione che permette di estrarre il contenuto di un singolo file "review"
@return: array in cui ogni posizione è una riga del file
*/
function getReview(string $file_name, $index=1){
    $aux = "";
    if(nReview($file_name) >= 10){
        if($index != 10){
            $aux = '0'.$index;
        }else{
            $aux = $index;
        }
    }else{
        $aux = $index;
    }
    return file("./".$file_name."/review$aux.txt");
}
?>
