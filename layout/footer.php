<footer>
	<div class="container footer-wrap">
		<div class="pull-right">ICT 2017</div>
	</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.3/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/materialize.js"></script>
<script src="js/custom.js"></script>
<script src="js/form.js"></script>
<script src="js/validation.js"></script>
<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>	tinymce.init({
	  selector: '.editor',  	
	});
</script>
<script src="js/main.js"></script>
<script>
$(document).ready(function(){
   $('#game1-table').DataTable();
   $('#game2-table').DataTable(); 
});
</script>

</body>
</html>