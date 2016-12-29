
<?php
if (isset($_GET['choixSup']))
{
?>
<h2 id="titreAcc">Choisissez le département dans lequel vous voulez supprimer un code : </h2>
<form action="?page=choixPromotion&choixSup=supprimerCodePromo" method="POST">
<a><button class="button btn btn-primary" name="IG" style=""  style="color:black; font-weight:bold"onclick>IG</button></a>
<a><button class="button btn btn-primary" name="ENR" style=""  style="color:black; font-weight:bold"onclick>ENR</button></a>
<a><button class="button btn btn-primary" name="GBA" style=""  style="color:black; font-weight:bold"onclick>GBA</button></a>
<a><button class="button btn btn-primary" name="MAT" style=""  style="color:black; font-weight:bold"onclick>MAT</button></a>
<a><button class="button btn btn-primary" name="MI" style=""  style="color:black; font-weight:bold"onclick>MI</button></a>
<a><button class="button btn btn-primary" name="MEA" style=""  style="color:black; font-weight:bold"onclick>MEA</button></a>
<a><button class="button btn btn-primary" name="STE" style=""  style="color:black; font-weight:bold"onclick>STE</button></a>
<a><button class="button btn btn-primary" name="EGC" style=""  style="color:black; font-weight:bold"onclick>EGC</button></a>
<?php
}
else
{
?>
	<h2 id="titreAcc">Choisissez le département : </h2>
	<form action="?page=choixPromotion" method="POST">
<a><button class="button btn btn-primary" name="IG" style=""  style="color:black; font-weight:bold"onclick>IG</button></a>
<a><button class="button btn btn-primary" name="ENR" style=""  style="color:black; font-weight:bold"onclick>ENR</button></a>
<a><button class="button btn btn-primary" name="GBA" style=""  style="color:black; font-weight:bold"onclick>GBA</button></a>
<a><button class="button btn btn-primary" name="MAT" style=""  style="color:black; font-weight:bold"onclick>MAT</button></a>
<a><button class="button btn btn-primary" name="MI" style=""  style="color:black; font-weight:bold"onclick>MI</button></a>
<a><button class="button btn btn-primary" name="MEA" style=""  style="color:black; font-weight:bold"onclick>MEA</button></a>
<a><button class="button btn btn-primary" name="STE" style=""  style="color:black; font-weight:bold"onclick>STE</button></a>
<a><button class="button btn btn-primary" name="EGC" style=""  style="color:black; font-weight:bold"onclick>EGC</button></a>
<?php
}
?>