<form action="payement.php">
	<input style="display:none;" name="ok" id="ok" value="ok" />
    <input type="text" name="num" placeholder="Numéro de carte" required pattern="[0-9]{16}" autocomplete="off">
    <input type="text" name="code" placeholder="Code de sécurité" required pattern="[0-9]{3}" autocomplete="off">
    </br>
	</br>
    <label for="Month">Date d'expiration	</label>
	<select name="Month" id="Month">
		<?php
			for ($i = 1; $i <= 12; $i++)
		    	echo '<option value="'.$i.'">'.$i.'</option>';
		?>
	</select>

	<select name="year" id="Year">
		<?php
			for ($i = 2014; $i <= 2030; $i++)
     			echo '<option value="'.$i.'">'.$i.'</option>';
		?>
	</select>
    
    <br>
    <br>
    <input type="submit"> <input type="reset">
</form>
