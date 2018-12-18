<?php
    
    //include 'database.php';
    function getEstoque(){
        $url = "http://localhost:3000/";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        /* Os dados vindos de uma consulta em uma API ou diretamente no banco, retornam em forma de array
         * Nesse caso, era um array de arrays, então precisava ser transformado em um array recursivo
         * Ou seja, um array com vários arrays que contém índices e valores, para isso, deve-se colocar o true no json_decode. 
         * Ex.: $x = json_decode($json, true);         
         */
        return $data;
    }
    
    function getVendas(){
        $url = "http://localhost:3000/vendas";
        $json = file_get_contents($url);
        $data = json_decode($json, true);        
        return $data;
    }

