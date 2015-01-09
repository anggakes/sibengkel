<!doctype html>
<html>

	<head>
		<title>Tambah Kategori Motor</title>
		{{ HTML::script('assets/js/jquery-1.9.1.min.js') }}
		{{ HTML::script('assets/js/ajax/kategori_motor.js') }}		
		{{ HTML::style('assets/css/form.css') }}		
		

	</head>
	<body>
		<pre id="status-simpan"></pre>
		<form id="kategori">
			<p>Nama Kategori Motor : 
				<input autofocus type="text" id="nama" value="" required>
				<input type="hidden" id="idk" value="">
			</p>
			<input name="submit" id="submit" value="Save" type="submit"> 	 
			<input type="reset"value="reset">
		</form>
		<pre id="status"></pre>
		<div id="grid" style="display:block;"></div>
	</body>

</html>