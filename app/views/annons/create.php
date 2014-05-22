
	<form name="annonsform" id="annonsform" action="SkapaAnnons.php" method="POST" enctype="multipart/form-data"> 
	
		<!-- Både namn och email fylls automatiskt, linus visar/fixar -->
		
 		

		<input type="text" name="rubrik" placeholder="Skriv din rubrik" required>
			 
		<input type="text" name="telenr" placeholder="Skriv ditt telefonnummer" required>
		
		<textarea type="text" placeholder="Skriv din kommentar om här" name="kommentar" required></textarea>
		
		<input type="text" name="label" placeholder="Skriv taggar för din annons" required>
		
		<label>Bild</label>	

		<input type="file" name="file" id="file">
		
    	<input type="checkbox" name="approve" value="approve">Jag godkänner 

    	<!--//Länk till avtalet!-->
     	<a style ="color: #606060" href = "avtal.php"> avtalen.</a>

     	<input type="submit" name="submit" value="Submit">
    </form>	
