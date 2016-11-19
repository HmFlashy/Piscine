
<!-- Convertis le tableau récupéré de la base de donnée en php en javascript -->
<script type="text/javascript">
	var q = [];
	var compteur = 0;
</script>
<?php 
	$test = $connexion -> query('SELECT question FROM questions');
	$questions = $test -> fetchAll();
	foreach($questions as $question){
?>
<script type="text/javascript">
	q.push('<?php printf($question['question']) ?>');
	compteur++;
</script>
<?php } ?>
<!-- Jusqu'ici -->



<script type="text/javascript">
	var choix = [-1, -1, -1]; //Tableau contenant les choix dans l'ordre de préférence (pour les couleurs et l'attribution des points)
	var current = 0; //Pour savoir ou on en est dans les questions par rapport au total de questions et pour pouvoir les afficher

	//Fonction qui permet de changer les phrases à afficher en fonctions de leurs indices (a faire, ici elle affiche juste des numéros)
	function changePhrase(){
		if (document.getElementById("commencer"))
		{
			$("#commencer").remove();
		}
		document.getElementById("groupe").innerHTML = "Groupe " + ((current / 6) + 1);
		for(j = current; j < current + 6; j++)
		{
			var bouton = document.createElement('button');
			var div = document.createElement('div');
			div.setAttribute('id', 'dBut');
			bouton.setAttribute('id', j+1);
			bouton.setAttribute('onclick', 'changeCouleur(' + (j+1) + ')');
			bouton.setAttribute("class", "col-xs-12");
			div.innerHTML = q[j];
			bouton.appendChild(div);
			$('.row')[0].appendChild(bouton);
		} 
	}

	//Fonction qui regarde si un objet obj est compris dans le tableau a
	function contains(a, obj) {
	    for (var i = 0; i < 3; i++) {
	        if (a[i] === obj) {
	            return true;
	        }
	    }
	    return false;
	}

	//Fonction qui affiche les phrases suivantes et stockent les données des phrases actuelles
	function suivant()
	{
		if(choix.indexOf(-1) ==-1)
		{
			for(p = current; p < current + 6; p++)
			{
				document.getElementById(p+1).remove();
			}
			current += 6;
			if(current >= 5)
				document.getElementById("previous").style.visibility = "visible";
			document.getElementById("next").style.visibility = "hidden";
			changePhrase();
			for(i = 0; i < 3; i++)
				choix[i] = -1;
		}
	}

	//Fonction qui affiche les phrases précédentes et suppriment les données enregistrés des phrases précédentes
	function precedent()
	{
		if(current > 5)
		{
			document.getElementById("next").style.visibility = "hidden";
			for(p = current; p < current + 6; p++)
			{
				document.getElementById(p+1).remove();
			}
			current -= 6;
			if(current < 6)
			{
				document.getElementById("previous").style.visibility = "hidden";
			}
			changePhrase();
			for(i = 0; i < 3; i++)
				choix[i] = -1;
		}
	}

	//Fonction qui change la couleur des cases on fonction de l'ordre à laquelle est sont cliqués
	function changeCouleur(j)
	{
		if(contains(choix, j))
		{
			$("#" + j).removeClass("p" + (choix.indexOf(j) + 1));
			document.getElementById("next").style.visibility = "hidden";
			choix[choix.indexOf(j)] = -1;
		}
		else
		{
			if(choix.indexOf(-1) != -1)
			{
				choix[choix.indexOf(-1)] = j;
				document.getElementById("next").style.visibility = "hidden";
			}
			if(choix.indexOf(-1) == -1)
			{
				if(current < 60)
					document.getElementById("next").style.visibility = "visible";
			}
			switch(choix.indexOf(j))
			{
				case 0:
					$("#" + j).addClass("p1");
					break;
				case 1:
					$("#" + j).addClass("p2");
					break;
				case 2:
					$("#" + j).addClass("p3");
					break;
			}
		}
	}
</script>
<div class="container-fluid">
	<div class="container-fluid" style="text-align: center;"">
		<h1 id="groupe" class></h1><br><br>
		<div id="commencer" "><button id="bCommencer" class="btn btn-primary btn-md" onclick="changePhrase()">Commencer</button></div>
		<div class="row" id="questionnaire"></div>
		<ul class="pager">
			<li id="previous" style="visibility: hidden;" onclick="precedent()""><a href="#">Précédent</a></li>
			<li id="next" style="visibility: hidden;" onclick="suivant()"><a href="#">Suivant</a></li>
		</ul>
	</div>
</div>