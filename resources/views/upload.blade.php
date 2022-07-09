<h1>Upload File</h1>
<form method="POST" action="upload" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file[]" multiple> <br><br>
	<button type="submit">Upload File</button>
	
</form>