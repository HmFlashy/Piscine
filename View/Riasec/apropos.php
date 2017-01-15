<div class="riasec2">
<h2><u>Qu'est-ce que le test RIASEC ?</u></h2>
<p class = "apropos"/>Le test RIASEC ou (test Holland), mis au point par le psychologue John L. Holland, est une théorie sur les carrières et les choix vocationnels qui s'appuie sur les types psychologiques. Il identifie 6 types de personnalités en milieu professionnel qui sont à mettre en lien avec les intérêts professionnels.</p>
<h2><u>Les règles : </u></h2>
<p class = "apropos"/> Ce test contient 12 groupes de 6 questions. Et chacune de ces 6 questions sont caractérisés par une des catégories RIASEC. Vous devez donc en choisir 3 et les classer selon votre préférences.
</br>Vous verrez !
</p>
<h2><u>Le projet: </u></h2>
<p class = "apropos"> Ce site a été réalisé par cinq étudiants en Informatique et Gestion à Polytech Montpellier ;  nous devions répondre à la demande d’un client dans le cadre du projet « piscine ».</p>
</br></br>Tout au long de notre projet, nous avons été une équipe soudée. Quand nous éprouvions individuellement des difficultés sur certaines parties, nous faisions appel aux autres échanger et croiser les points de vue. Cette émulation a parfois permis de faire progresser le site. Néanmoins cela n'a pas toujours été simple d'avancer au même rythme. Chacun d'entre nous ayant des contraintes, des envies, des démarches et des visions du projet différent – parfois même contradictoires. Il nous a fallu faire des compromis et des efforts, faire preuve de ténacité pour faire aboutir notre projet collectif. Il a contribué à gommer nos caractéristiques individuelles pour faire de nous un véritable groupe de travail, et aboutir à la demande du client.
</p>
<br>
<h2><u>Voici les différentes catégories:</u></h2>
</div>
<ul style="display: inline-block;" class="riasec nav nav-pills">
  <li class="active"><a data-toggle="pill" href="#Réaliste">Realiste</a></li>
  <li><a data-toggle="pill" href="#Investigateur">Investigateur</a></li>
  <li><a data-toggle="pill" href="#Artiste">Artiste</a></li>
  <li><a data-toggle="pill" href="#Social">Social</a></li>
  <li><a data-toggle="pill" href="#Entreprenant">Entreprenant</a></li>
  <li><a data-toggle="pill" href="#Conventionnel">Conventionnel</a></li>
</ul>
<div class="riasec2 tab-content">
<?php
  foreach ($infos as $key => $value) {
              echo' <div id="'.$value['libelleCategorie'].'" class="riasec3 tab-pane ';
              if($key==0) echo 'in active';
              echo '">
              <h2>'.$value['libelleCategorie'].'</h2>
              <p class="paragraphe">'.$value['descriptionCategorie'].'</p>
              </div>';
  }
?>
</div>