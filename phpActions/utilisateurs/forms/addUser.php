<label for="nom" class="db">Nom</label>
<input type="text" id="nom" class="w-full br-5 border-ccc" name="nom">
<p class="error-indec-nom c-r fz-14"></p>
<label for="prenom" class="db" >Prenom</label>
<input type="text" id="prenom" class="w-full br-5 border-ccc" name="prenom">
<p class="error-indec-prenom c-r fz-14"></p>
<p class="error-indec-cne c-r fz-14"></p>
<div class="filiere">
<label for="filiere" class="db" >Filiére</label>
<label class="select" for="filiere-options">
<select id="filiere-options" name="filiere-options">
<option value="Génie Informatique">Génie Informatique</option>
<option value="Génie Mécanique">Génie Mécanique</option>
<option value="Génie Industriel">Génie Industriel</option>
<option value="Génie Énergétique et Environnement">Génie Énergétique et Environnement</option>
<option value="Finance et ingénierie décisionnelle">Finance et ingénierie décisionnelle</option>
<option value="BTP">BTP</option>
</select>
<svg>
<use xlink:href="#select-arrow-down"></use>
</svg>
</label>
</div>
<label for="email" class="db" >Email</label>
<input type="email" id="email" class="w-full br-5 border-ccc" name="email">
<p class="error-indec-email c-r fz-14"></p>
<label for="password" class="db">Mot de pass</label>
<input type="password" id="password" class="w-full br-5 border-ccc" name="password">
<p class="error-indec-password c-r fz-14"></p>
<div class="status">
<label for="status" class="db">Status</label>
<label class="select" for="status-options" >
<select id="status-options" name="status-options">
<option value="etudiant">Etudiant</option>
<option value="administrateur">Administrateur</option>
</select>
<svg>
<use xlink:href="#select-arrow-down"></use>
</svg>
</label>
</div>
<div class="niveau">
<label for="niveau" class="db">Niveau</label>
<label class="select" for="niveau-options" >
<select id="niveau-options" name="niveau-options">
<option value="CP1">CP1</option>
<option value="CP2">CP2</option>
<option value="CI1">CI1</option>
<option value="CI2">CI2</option>
<option value="CI3">CI3</option>
</select>
<svg>
<use xlink:href="#select-arrow-down"></use>
</svg>
</label>
</div>
<!-- SVG Sprites-->
<svg class="sprites">
<symbol id="select-arrow-down" viewbox="0 0 10 6">
<polyline points="1 1 5 5 9 1"></polyline>
</symbol>
</svg>
<button type="submit" class="blue-btn pd-inline-1 pd-block-8 m-0 fz-16">Valider</button>
