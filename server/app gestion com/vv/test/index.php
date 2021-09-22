<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
	<script src="../js/jquery-1.9.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

</head>

<body>


</html>

<div id="content">
	<h3>Hello, this is a H3 tag</h3>

	<p>A paragraph</p>
</div>
<div id="editor"></div>
<button id="cmd">generate PDF</button>

<script>
	var doc = new jsPDF();

	doc.fromHTML($('#content').html(), 15, 15, {
		'width': 170,
	});
	doc.save('sample-file.pdf');
</script>
</body>