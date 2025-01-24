<?php
session_start();
require 'conexao.php';
if (isset($_POST['create_corretor'])) {
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
	$creci = mysqli_real_escape_string($conexao, trim($_POST['creci']));
	$sql = "INSERT INTO corretor (nome, cpf, creci) VALUES ('$nome', '$cpf', '$creci')";


	if (mb_strlen($cpf) != 11) {
		$_SESSION['mensagem'] = 'Corretor não foi criado - CPF inválido';
			header('Location: index.php');
			exit;
	}elseif (mb_strlen($nome)<2){
		$_SESSION['mensagem'] = 'Corretor não foi criado - Nome inválido';
			header('Location: index.php');
			exit;
	}elseif(mb_strlen($creci)<2){
		$_SESSION['mensagem'] = 'Corretor não foi criado - Creci inválido';
			header('Location: index.php');
			exit;
	}
	else
	{

		mysqli_query($conexao, $sql);
		if (mysqli_affected_rows($conexao) > 0) {
			$_SESSION['mensagem'] = 'Corretor criado com sucesso';
			header('Location: index.php');
			exit;
		} else {
			$_SESSION['mensagem'] = 'Corretor não foi criado';
			header('Location: index.php');
			exit;
		}
	}

	
}
if (isset($_POST['update_corretor'])) {
	$id = mysqli_real_escape_string($conexao, $_POST['id']);
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $creci = mysqli_real_escape_string($conexao, trim($_POST['creci']));


	if (mb_strlen($cpf) != 11) {
		$_SESSION['mensagem'] = 'Dados do Corretor não foram atualizados - CPF inválido';
			header('Location: index.php');
	}elseif (mb_strlen($nome)<2){
		$_SESSION['mensagem'] = 'Dados do Corretor não foram atualizados - Nome inválido';
			header('Location: index.php');
	}elseif(mb_strlen($creci)<2){
		$_SESSION['mensagem'] = 'Dados do Corretor não foram atualizados - Creci inválido';
			header('Location: index.php');
	}
	else{
	$sql = "UPDATE corretor SET nome = '$nome', cpf = '$cpf', creci = '$creci' WHERE id = '$id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Dados do Corretor atualizados com sucesso';
		header('Location: index.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Dados do Corretor não foram atualizados';
		header('Location: index.php');
		exit;
	}
}
}
if (isset($_POST['delete_corretor'])) {
	$id = mysqli_real_escape_string($conexao, $_POST['delete_corretor']);
	$sql = "DELETE FROM corretor WHERE id = '$id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['message'] = 'Corretor excluído com sucesso';
		header('Location: index.php');
		exit;
	} else {
		$_SESSION['message'] = 'Corretor não foi excluído';
		header('Location: index.php');
		exit;
	}
}
?>