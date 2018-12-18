<?php
    include 'connection.php';
    //Executa Querys
    function qExecute($query, $insertId = false){
        $link = getConnection();
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if($insertId){
            $result = mysqli_insert_id($link);
        }
        closeConnection($link);
        return $result; //Se a query foi executada, retorna true, sen retorna false e mostra o erro
    }
    
    //Grava dados
    function dbCadastrar($table, $dados, $insertId = false){ //$table é o nome da tabela, $dados são os dados a serem armazenados(devem estar em array)
        //$table = DB_PREFIX.'_'.$table; //para pegar o prefixo da tabela caso use 
        $dados = protectDB($dados);
        $fields = implode(', ', array_keys($dados));
        $values = implode("', '", $data);
        
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
        return qExecute($query, $insertId);
    }
    
    //Lê dados do banco
    function dbRead($table, $params = null, $fields = '*'){
        //$table = DB_PREFIX.'_'.$table; //para pegar o prefixo da tabela caso use 
        $params = ($params) ? " {$params}" : null; //Serve apenas para definir se haverá espaço entre $table e $params 
        $query = "SELECT {$fields} FROM {$table}{$params}";//por isso, aqui está sem espaço
        $result = qExecute($query);
        $i = 0;
        
        if(!mysqli_num_rows($result)){ //checa se a execução da query retornou algum resultado
            return false;
        } else{
            while ($res = mysqli_fetch_array($result)){ //Transforma o resultado em um array, onde o cabeçalho das colunas são índices e as linhas são os dados de cada índice
                $i++;
                $data[$i] = $res; //Pega cada array e joga dentro de outro array
            }
            return $data;
        }
    }
    
    //Altera Dados do banco
    function dbUpdate($table, array $data, $where = null, $insertId = false){
        foreach ($data as $key => $value){ //Percorre os campos lendo o índice e o valor do array data
            $fields[] = "{$key} = '{$value}'"; //Atribui os índices e seus respectivos valor para um array
        }
        $fields = implode(', ', $fields); //Separa cada campo com vírgula
        //$table = DB_PREFIX.'_'.$table; //para pegar o prefixo da tabela caso use 
        $where = ($where) ? " WHERE {$where}" : null; //Serve apenas para definir se haverá espaço entre fields e where
        $query = "UPDATE $table SET {$fields}{$where}"; //por isso, aqui não vai espaço
        return qExecute($query, $insertId);
    }
    
    //Deletando dados do banco
    function dbDelete($table, $where = null, $insertId = false){
        //$table = DB_PREFIX.'_'.$table; //para pegar o prefixo da tabela caso use
        $where = ($where) ? " WHERE {$where}" : null;
        $query = "DELETE FROM {$table}{$where}";
        return qExecute($query, $insertId);
    }
    
    //Cria tabelas estoque
    function createTable($id, $nome){
        $nameTable = $id.'-'.$nome;
        $query = "create table if not exists {$nameTable}(codigo int not null auto_increment primary key, nome varchar(20) not null unique,"
                . "quantidade int, unidade varchar(8) not null, preco double not null);";
        qExecute($query);
    }

