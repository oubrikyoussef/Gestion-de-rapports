<label for="nom" class="db">Nom</label>
<input type="text" id="nom" class="w-full mbl-5 br-5 border-ccc">
<p class="error-indec-nom c-r fz-14"></p>
<label for="prenom" class="db" >Prenom</label>
<input type="text"id="prenom" class="w-full mbl-5 br-5 border-ccc">
<p class="error-indec-prenom c-r fz-14"></p>
<label for="cne" class="db" >CNE</label>
<input type="text" id="cne" class="w-full mbl-5 br-5 border-ccc">
<p class="error-indec-cin c-r fz-14"></p>
<label for="filiere" class="db" >Filiére</label>
<input type="text" id="filiere" class="w-full mbl-5 br-5 border-ccc" >
<p class="error-indec-filiere c-r fz-14"></p>
<label for="email" class="db" >Email</label>
<input type="email" id="email" class="w-full mbl-5 br-5 border-ccc">
<p class="error-indec-email c-r fz-14"></p>
<label for="password" class="db">Mot de pass</label>
<input type="password" id="password" class="w-full mbl-5 br-5 border-ccc">
<p class="error-indec-password c-r fz-14"></p>
<label for="role" class="db mbt-5">Role</label>
<?php 
include("./components/selectS.php");
?>
<option value="etudiant">Etudiant</option>
<option value="administrateur">Administrateur</option>
<?php 
include("./components/selectE.php");
?>
<label for="image" class="db mt-5">Image</label>
<input type="file" name="image" id="image" class="w-full mbl-5 br-5 border-ccc" value="../images/rapports/icon.png">
<p class="error-indec-email c-r fz-14 mb-5"></p>
<button type="submit" class="db w-full pd-8 bg-b c-w br-5 main-tr">Valider</button>
</form>