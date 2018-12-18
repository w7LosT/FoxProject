<?php
    session_start();
    include 'database.php';
    
    $email = filter_input(INPUT_POST, 'txtMail', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'txtPass', FILTER_DEFAULT);
    $descrypt = md5($senha);
 
    if(empty($email) || empty($descrypt)){
        header('Location: login.php');
        $_SESSION['errorLogin'] = "Os campos Usuário e Senha devem estar preenchidos";
    } else {
        $row = qExecute("SELECT id_tabela FROM users WHERE email = '$email' AND senha = '$senha'");
        $linhas = mysqli_num_rows($row);
        //echo $row;
        if($linhas === 1){
            $con = qExecute("SELECT user FROM users WHERE email = '$email'");
            $res = mysqli_fetch_assoc($con);
            $user = $res['user'];
            $_SESSION['user'] = $user;
            header('Location: estoque.php');
        } else{
            $_SESSION['errorLogin'] = "Usuário ou Senha inválidos";
            header('Location: login.php');
        }
    }

