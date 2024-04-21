<div class="br-10 bg-w over-hidden w-fit pd-8 ps-relative">
<a href="#" class="exit c-b main-tr fz-18">
<i class="fa-solid fa-xmark"></i>
</a> 
<form method="POST" class="add-mod" action="./test/addUser.php">
id : <input class="w-full mbl-5 br-5 border-ccc" type="text" name="id">

nom : <input class="w-full mbl-5 br-5 border-ccc" type="text" name="nom">

prenom : <input class="w-full mbl-5 br-5 border-ccc" type="text" name="prenom">

email : <input class="w-full mbl-5 br-5 border-ccc" type="text" name="email">

motdepasse : <input class="w-full mbl-5 br-5 border-ccc" type="password" name="motdepasse">

role : 
<select name="role" id="role">
    <option value="chef_departement">Chef departement</option>
    <option value="secretaire">Secretaire</option>
    <option value="etudiant">Etudiant</option>
</select>
<br>
Filiere : 
<select name="filiere" id="filiere">
    <option value="informatique">Informatique</option>
    <option value="industriel">Industriel</option>
    <option value="electrique">Electrique</option>
    <option value="mecanique">Mecanique</option>
    <option value="BTP">BTP</option>
    <option value="GEE">GEE</option>
</select>
<br>
niveau : <input class="w-full mbl-5 br-5 border-ccc" type="text" name="niveau">

<button type="submit" name="ajouter"class="w-full mbl-5 br-5 border-ccc add-user">ajouter</button>
</form>
</div>