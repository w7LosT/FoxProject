<?php
    include 'config.php';
    
    //Conecta ao banco de dados
    function getConnection(){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
        return $link;
    }
    
    //Fecha a conexão com o banco
    function closeConnection($link){
        mysqli_close($link) or die (mysqli_error($link));
    }
    
    //Protege contra SQL Injection
    function protectDB($dados){
        $link = getConnection();
        if(!is_array($dados)){
            $dados = mysqli_real_escape_string($link, $dados);
        } else{
            $arr = $dados;
            foreach($arr as $key => $value){
                $key = mysqli_real_escape_string($link, $key);
                $value = mysqli_real_escape_string($link, $value);
                
                $dados[$key] = $values;
            }
        }
        closeConnection($link);
        return $dados;
    }
