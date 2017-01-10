<?php 
	if(isset($_POST['groupe']))
	{
		if(isset($_POST['prec']) && ($_POST['groupe'] > 0))
		{
			array_pop($_POST['result1']);
			array_pop($_POST['result2']);
			array_pop($_POST['result3']);
			$_POST['groupe'] -= 1;
		}
		else
		{
			if(!isset($_POST['1']) || !isset($_POST['2']) || !isset($_POST['3']))
			{
				//On refait
			}
			else
			{
				$_POST['groupe'] += 1;
				$_POST['result1'][] = $_POST['1'];
				$_POST['result2'][] = $_POST['2'];
				$_POST['result3'][] = $_POST['3'];
				if($_POST['groupe'] == 12)
				{
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