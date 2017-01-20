<?php 
	if(!isset($_POST['idSession']))
	{
		echo '<p>Vous devez d\'abord choisir une session! Retour dans 3 secondes..<p>';
		header("refresh:3;url=?");//Renvoie sur la page d'acceuil au bout de 3s.
		exit;
	}
	if(isset($_POST['groupe']))
	{
		//Si précédent on supprimer les derniers éléments du tableau
		if(isset($_POST['prec']))
		{
			if($_POST['groupe'] > 0)
			{
				array_pop($_POST['result1']);
				array_pop($_POST['result2']);
				array_pop($_POST['result3']);
				$_POST['groupe'] -= 1;
			}
		}
		else
		{
			//Si il manque une réponse un fait rien et on repose les mêmes questions
			if(!isset($_POST['1']) || !isset($_POST['2']) || !isset($_POST['3']))
			{
				//On refait
			}
			else
			{
				//On rajoute les identifiants de catégories dans chaque tableau et on incrémente le groupe de question
				$_POST['groupe'] += 1;
				$_POST['result1'][] = $_POST['1'];
				$_POST['result2'][] = $_POST['2'];
				$_POST['result3'][] = $_POST['3'];
				if($_POST['groupe'] == 12)
				{
					//Si on est au dernier groupe on change de page et on traite les réponses, on stocke les tableau dans des cookies qui vont être supprimer juste après
					setcookie('result1', serialize($_POST['result1']), time()+3600);
					setcookie('result2', serialize($_POST['result2']), time()+3600);
					setcookie('result3', serialize($_POST['result3']), time()+3600);
					setcookie('promo', $_POST['promo'], time()+3600);
					setcookie('idSession', $_POST['idSession'], time()+3600);
					header('Location: ?page=resultatTest');
				}
			}
		}
		$groupe = $_POST['groupe'];
	}
	else
	{
		$groupe = 0;
	}
	include_once('Model/Question/recupererInfosQuestions.php');
	$questions = recupererInfosQuestions($connexion, $groupe);
	include_once('View/Test/test.php');
?>