<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES["photo"]) && $_FILES["photo"]["errore"]==0){
        $estensioni_permesse=array("jpg" =>"image/jpg", "jpeg" => "image/jpeg");
        $nome_file=$_FILES["photo"]["name"];
        $tipo_file=$_FILES["photo"]["type"];
        $dimensione_file=$_FILES["photo"]["size"];

        $estensione=pathinfo($nome_file, PATHINFO_EXTENSION);
        if(!array_key_exists($estensione, $estensioni_permesse)) die("Errore selezioanare un formato valide!");

        $dimensione_massima=5*1024*1024;
        if($dimensione_file > $dimensione_massima) die("Errore! file troppo grande");

        if(in_array($tipo_file, $estensioni_permesse)){
            if(file_exists("upload/".$nome_file)){
                echo $nome_file." esiste gia";
            }else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/".$nome_file);
                echo "Il tuo file è stato caricato con successo";
            }
        }else{
            echo "Errore nel caricamento!";
        }
    }else{
        echo "Errore".$_FILES["photo"]["error"];
    }
}

?>