<?php
  @session_start();
  /* Envio do e-mail */

  $nome = htmlentities($_POST['nome']);
  $email = htmlentities($_POST['email']);
  $mensagem = htmlentities($_POST['message']);

  $error = false;
  if($nome == ''){
    $_SESSION['nome']['error'] = true;
    $error = true;
  }
  if($email == ''){
    $_SESSION['email']['error'] = true;
    $error = true;
  }
  if($mensagem == ''){
    $_SESSION['mensagem']['error'] = true;
    $error = true;
  }

  if(!$error) {
    $para = 'nav@ifrs.edu.br';
    $assunto = 'Contato - Site Acessibilidade Virtual';
  
    $from = 'From: para';
    $from.= "\r\n";
    $from.= "Reply-to: $email";
    $from.= "\r\n";
    $from.= 'Content-Type: text/html; charset=iso-8859-1';
    
    $corpo = "Nome: $nome<br>";
    $corpo.= "E-Mail: $email<br>";
    $corpo.= "Mensagem: $mensagem<br>";
    
    if(mail($para, $assunto, $corpo, $from)){ 
      $_SESSION['enviado'] = true;
    } else {
      $_SESSION['enviado'] = false;
      $_SESSION['nome']['value'] = $nome;
      $_SESSION['email']['value'] = $email;
      $_SESSION['mensagem']['value'] = $mensagem;
    }
  } else {
    $_SESSION['error'] = true;
    $_SESSION['nome']['value'] = $nome;
    $_SESSION['email']['value'] = $email;
    $_SESSION['mensagem']['value'] = $mensagem;
  }

  header('Location: ../contato');
  die;
