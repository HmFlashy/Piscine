
<!-- Convertis le tableau récupéré de la base de donnée en php en javascript -->
<script type="text/javascript">
	var q = [];
	var compteur = 0;
	var realiste=0;
	var investigatif = 0;
	var artistique = 0;
	var social =0;
	var entrepreneur = 0;
	var conventionnel = 0;
	var groupe =0;
</script>
<?php 
	$test = $connexion -> query('SELECT libelleQuestion FROM questions');
	$questions = $test -> fetchAll();
	foreach($questions as $question){
?>
<script type="text/javascript">
	q.push('<?php printf($question['libelleQuestion']) ?>');
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
		document.getElementById("realiste").innerHTML = "Realiste = " + (realiste);
		document.getElementById("investigatif").innerHTML = "Investigatif = " + (investigatif);
		document.getElementById("artistique").innerHTML = "Artistique = " + (artistique);
		document.getElementById("social").innerHTML = "Social = " + (social);
		document.getElementById("entrepreneur").innerHTML = "Entrepreneur = " + (entrepreneur);
		document.getElementById("conventionnel").innerHTML = "Conventionnel = " + (conventionnel);
		
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
		groupe = (current/6) +1;
		if(contains(choix, j))
		{
			$("#" + j).removeClass("p" + (choix.indexOf(j) + 1));
			document.getElementById("next").style.visibility = "hidden";
			switch(choix.indexOf(j))
			{
				case 0:
					//$("#" + j).addClass("p1");
					if(j==1 || j == 10 || j == 18 || j == 19 || j == 30 || j == 32 || j== 42 || j == 44 || j == 51 || j==60 || j==62 || j==70)
					{
						realiste = realiste -3;		
					document.getElementById("realiste").innerHTML = "Realiste = " + (realiste);						
					}
					if(j==2 || j == 11 || j == 17 || j == 24 || j == 28 || j == 31 || j== 39 || j == 43 || j == 50 || j==58 || j==65 || j==71)
					{
						investigatif = investigatif -3;			
					document.getElementById("investigatif").innerHTML = "Investigatif = " + (investigatif);							
					}
					if(j==3 || j == 12 || j == 14 || j == 20 || j == 25 || j == 36 || j== 38 || j == 47 || j == 53 || j==59 || j==66 || j==72)
					{
						artistique = artistique -3;		
						document.getElementById("artistique").innerHTML = "Artistique = " + (artistique);							
					}
					if(j==4 || j == 7 || j == 13 || j == 23 || j == 27 || j == 34 || j== 41 || j == 45 || j == 49 || j==57 || j==61 || j==69)
					{
						social = social -3;	
					document.getElementById("social").innerHTML = "Social = " + (social);							
					}
					if(j==5 || j == 9 || j == 16 || j == 22 || j == 26 || j == 35 || j== 37 || j == 46 || j == 52 || j==55 || j==64 || j==68)
					{
						entrepreneur = entrepreneur -3;			
						document.getElementById("entrepreneur").innerHTML = "Entrepreneur = " + (entrepreneur);							
					}
					if(j==6 || j == 8 || j == 15 || j == 21 || j == 29 || j == 33 || j== 40 || j == 48 || j == 54 || j==56 || j==63 || j==67)
					{
						conventionnel = conventionnel -3;
					document.getElementById("conventionnel").innerHTML = "Conventionnel = " + (conventionnel);							
					}
					choix[choix.indexOf(j)] = -1;
					break;
				case 1:
					//$("#" + j).addClass("p2");
					if(j==1 || j == 10 || j == 18 || j == 19 || j == 30 || j == 32 || j== 42 || j == 44 || j == 51 || j==60 || j==62 || j==70)
					{
						realiste = realiste -2;		
					document.getElementById("realiste").innerHTML = "Realiste = " + (realiste);							
					}
					if(j==2 || j == 11 || j == 17 || j == 24 || j == 28 || j == 31 || j== 39 || j == 43 || j == 50 || j==58 || j==65 || j==71)
					{
						investigatif = investigatif -2;		
					document.getElementById("investigatif").innerHTML = "Investigatif = " + (investigatif);								
					}
					if(j==3 || j == 12 || j == 14 || j == 20 || j == 25 || j == 36 || j== 38 || j == 47 || j == 53 || j==59 || j==66 || j==72)
					{
						artistique = artistique -2;		
					document.getElementById("artistique").innerHTML = "Artistique = " + (artistique);							
					}
					if(j==4 || j == 7 || j == 13 || j == 23 || j == 27 || j == 34 || j== 41 || j == 45 || j == 49 || j==57 || j==61 || j==69)
					{
						social = social -2;		
					document.getElementById("social").innerHTML = "Social = " + (social);							
					}
					if(j==5 || j == 9 || j == 16 || j == 22 || j == 26 || j == 35 || j== 37 || j == 46 || j == 52 || j==55 || j==64 || j==68)
					{
						entrepreneur = entrepreneur -2;		
					document.getElementById("entrepreneur").innerHTML = "Entrepreneur = " + (entrepreneur);							
					}
					if(j==6 || j == 8 || j == 15 || j == 21 || j == 29 || j == 33 || j== 40 || j == 48 || j == 54 || j==56 || j==63 || j==67)
					{
						conventionnel = conventionnel -2;		
					document.getElementById("conventionnel").innerHTML = "Conventionnel = " + (conventionnel);						
					}
					choix[choix.indexOf(j)] = -1;
					break;
				case 2:
					//$("#" + j).addClass("p3");
					if(j==1 || j == 10 || j == 18 || j == 19 || j == 30 || j == 32 || j== 42 || j == 44 || j == 51 || j==60 || j==62 || j==70)
					{
						realiste = realiste -1;		
					document.getElementById("realiste").innerHTML = "Realiste = " + (realiste);							
					}
					if(j==2 || j == 11 || j == 17 || j == 24 || j == 28 || j == 31 || j== 39 || j == 43 || j == 50 || j==58 || j==65 || j==71)
					{
						investigatif = investigatif -1;		
					document.getElementById("investigatif").innerHTML = "Investigatif = " + (investigatif);						
					}
					if(j==3 || j == 12 || j == 14 || j == 20 || j == 25 || j == 36 || j== 38 || j == 47 || j == 53 || j==59 || j==66 || j==72)
					{
						artistique = artistique -1;		
					document.getElementById("artistique").innerHTML = "Artistique = " + (artistique);							
					}
					if(j==4 || j == 7 || j == 13 || j == 23 || j == 27 || j == 34 || j== 41 || j == 45 || j == 49 || j==57 || j==61 || j==69)
					{
						social = social -1;						
						document.getElementById("social").innerHTML = "Social = " + (social);	
					}
					if(j==5 || j == 9 || j == 16 || j == 22 || j == 26 || j == 35 || j== 37 || j == 46 || j == 52 || j==55 || j==64 || j==68)
					{
						entrepreneur = entrepreneur -1;		
					document.getElementById("entrepreneur").innerHTML = "Entrepreneur = " + (entrepreneur);						
					}
					if(j==6 || j == 8 || j == 15 || j == 21 || j == 29 || j == 33 || j== 40 || j == 48 || j == 54 || j==56 || j==63 || j==67)
					{
						conventionnel = conventionnel -1;			
					document.getElementById("conventionnel").innerHTML = "Conventionnel = " + (conventionnel);							
					}
					choix[choix.indexOf(j)] = -1;
					break;
			}
			
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
					if(j==1 || j == 10 || j == 18 || j == 19 || j == 30 || j == 32 || j== 42 || j == 44 || j == 51 || j==60 || j==62 || j==70)
					{
						realiste = realiste +3;		
					document.getElementById("realiste").innerHTML = "Realiste = " + (realiste);						
					}
					if(j==2 || j == 11 || j == 17 || j == 24 || j == 28 || j == 31 || j== 39 || j == 43 || j == 50 || j==58 || j==65 || j==71)
					{
						investigatif = investigatif +3;			
					document.getElementById("investigatif").innerHTML = "Investigatif = " + (investigatif);							
					}
					if(j==3 || j == 12 || j == 14 || j == 20 || j == 25 || j == 36 || j== 38 || j == 47 || j == 53 || j==59 || j==66 || j==72)
					{
						artistique = artistique +3;		
						document.getElementById("artistique").innerHTML = "Artistique = " + (artistique);							
					}
					if(j==4 || j == 7 || j == 13 || j == 23 || j == 27 || j == 34 || j== 41 || j == 45 || j == 49 || j==57 || j==61 || j==69)
					{
						social = social +3;	
					document.getElementById("social").innerHTML = "Social = " + (social);							
					}
					if(j==5 || j == 9 || j == 16 || j == 22 || j == 26 || j == 35 || j== 37 || j == 46 || j == 52 || j==55 || j==64 || j==68)
					{
						entrepreneur = entrepreneur +3;			
						document.getElementById("entrepreneur").innerHTML = "Entrepreneur = " + (entrepreneur);							
					}
					if(j==6 || j == 8 || j == 15 || j == 21 || j == 29 || j == 33 || j== 40 || j == 48 || j == 54 || j==56 || j==63 || j==67)
					{
						conventionnel = conventionnel +3;
					document.getElementById("conventionnel").innerHTML = "Conventionnel = " + (conventionnel);							
					}
					break;
				case 1:
					$("#" + j).addClass("p2");
					if(j==1 || j == 10 || j == 18 || j == 19 || j == 30 || j == 32 || j== 42 || j == 44 || j == 51 || j==60 || j==62 || j==70)
					{
						realiste = realiste +2;		
document.getElementById("realiste").innerHTML = "Realiste = " + (realiste);							
					}
					if(j==2 || j == 11 || j == 17 || j == 24 || j == 28 || j == 31 || j== 39 || j == 43 || j == 50 || j==58 || j==65 || j==71)
					{
						investigatif = investigatif +2;		
document.getElementById("investigatif").innerHTML = "Investigatif = " + (investigatif);								
					}
					if(j==3 || j == 12 || j == 14 || j == 20 || j == 25 || j == 36 || j== 38 || j == 47 || j == 53 || j==59 || j==66 || j==72)
					{
						artistique = artistique +2;		
document.getElementById("artistique").innerHTML = "Artistique = " + (artistique);							
					}
					if(j==4 || j == 7 || j == 13 || j == 23 || j == 27 || j == 34 || j== 41 || j == 45 || j == 49 || j==57 || j==61 || j==69)
					{
						social = social +2;		
document.getElementById("social").innerHTML = "Social = " + (social);							
					}
					if(j==5 || j == 9 || j == 16 || j == 22 || j == 26 || j == 35 || j== 37 || j == 46 || j == 52 || j==55 || j==64 || j==68)
					{
						entrepreneur = entrepreneur +2;		
document.getElementById("entrepreneur").innerHTML = "Entrepreneur = " + (entrepreneur);							
					}
					if(j==6 || j == 8 || j == 15 || j == 21 || j == 29 || j == 33 || j== 40 || j == 48 || j == 54 || j==56 || j==63 || j==67)
					{
						conventionnel = conventionnel +2;		
document.getElementById("conventionnel").innerHTML = "Conventionnel = " + (conventionnel);						
					}
					break;
				case 2:
					$("#" + j).addClass("p3");
					if(j==1 || j == 10 || j == 18 || j == 19 || j == 30 || j == 32 || j== 42 || j == 44 || j == 51 || j==60 || j==62 || j==70)
					{
						realiste = realiste +1;		
					document.getElementById("realiste").innerHTML = "Realiste = " + (realiste);							
					}
					if(j==2 || j == 11 || j == 17 || j == 24 || j == 28 || j == 31 || j== 39 || j == 43 || j == 50 || j==58 || j==65 || j==71)
					{
						investigatif = investigatif +1;		
					document.getElementById("investigatif").innerHTML = "Investigatif = " + (investigatif);						
					}
					if(j==3 || j == 12 || j == 14 || j == 20 || j == 25 || j == 36 || j== 38 || j == 47 || j == 53 || j==59 || j==66 || j==72)
					{
						artistique = artistique +1;		
					document.getElementById("artistique").innerHTML = "Artistique = " + (artistique);							
					}
					if(j==4 || j == 7 || j == 13 || j == 23 || j == 27 || j == 34 || j== 41 || j == 45 || j == 49 || j==57 || j==61 || j==69)
					{
						social = social +1;						
						document.getElementById("social").innerHTML = "Social = " + (social);	
					}
					if(j==5 || j == 9 || j == 16 || j == 22 || j == 26 || j == 35 || j== 37 || j == 46 || j == 52 || j==55 || j==64 || j==68)
					{
						entrepreneur = entrepreneur +1;		
					document.getElementById("entrepreneur").innerHTML = "Entrepreneur = " + (entrepreneur);						
					}
					if(j==6 || j == 8 || j == 15 || j == 21 || j == 29 || j == 33 || j== 40 || j == 48 || j == 54 || j==56 || j==63 || j==67)
					{
						conventionnel = conventionnel +1;			
					document.getElementById("conventionnel").innerHTML = "Conventionnel = " + (conventionnel);							
					}
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
		<p id="realiste" class style="color:black;font-size:30px;margin:0;"></p><br><br>
		<p id="investigatif" class style="color:black;font-size:30px;margin:0"></p><br><br>
		<p id="artistique" class style="color:black;font-size:30px;margin:0"></p><br><br>
		<p id="social" class style="color:black;font-size:30px;margin:0"></p><br><br>
		<p id="entrepreneur" class style="color:black;font-size:30px;margin:0"></p><br><br>
		<p id="conventionnel" class style="color:black;font-size:30px;margin:0"></p><br><br>
	</div>
</div>