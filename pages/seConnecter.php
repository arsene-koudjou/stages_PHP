<?php
	require_once('connexion.php');
	session_start();
	
	$LOGIN=$_POST['LOGIN'];
	$PWD=$_POST['PWD'];
	
	
	$requete="select * from utilisateur where LOGIN=? and PWD=MD5(?)";
		
	$param=array($LOGIN,$PWD);	
	$resultat = $con->prepare($requete);		
	$resultat->execute($param);	
	
	if($user=$resultat->fetch()){
		
		
				$_SESSION['utilisateur']=$user;
				header("Location:stagiaires.php");
			
    }else{
		 $_SESSION['erreurLogin']='<strong>Erreur!</strong> Login ou mot de passe incorrect!!!';
         header("Location:login.php");
    } 
	
?>