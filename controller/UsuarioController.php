<?php
include_once "../conexao/Conexao.php";
include_once "../model/Usuario.php";
include_once "../dao/UsuarioDAO.php";

//instanciar as classes
$usuario = new Usuario();
$usuariodao = new UsuarioDAO();

//passar os posts - dados 

$d = filter_input_array(INPUT_POST);

//Se for garavado com sucesso
if(isset($_POST['cadastrar'])){

    $usuario->setNome($d['nome']);
    $usuario->setSobrenome($d['sobrenome']);
    $usuario->setIdade($d['idade']);
    $usuario->setSexo($d['sexo']);

    $usuariodao->create($usuario);
    
    header("Location: ../../");
}

else if(isset($_POST['editar'])){

    $usuario->setNome($d['nome']);
    $usuario->setSobrenome($d['sobrenome']);
    $usuario->setIdade($d['idade']);
    $usuario->setSexo($d['sexo']);
    $usuario->setId($d['id']);

    $usuariodao->update($usuario);
    
    header("Location: ../../");
}

// se for deletar
else if(isset($_GET['del'])){

    $usuario->setId($_GET['del']);
    $usuariodao->delete($usuario);
    header("Location: ../../");
}else{
    header("Location: ../../");
}
