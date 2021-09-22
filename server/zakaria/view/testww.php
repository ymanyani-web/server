<script>
$(function(){
    $('#input10').change(function(){
        var t = $("#nom222 option[value='" + $('#input10').val() + "']").attr('id');
        if(t == undefined)
        {
			document.getElementById('id01').style.display = "block";
            $( "#sub" ).prop( "disabled", true );
        }
        else{
			location.replace("operation.php?id=" + t + ""); 
            $( "#sub" ).prop( "disabled", false );
        }
    });
});
</script>

<div class="user-box">
		<input list="nom222" name="cin" id="input10" <?php if(!empty($cinn)) { echo "value='$cinn'"; }?> >
		<datalist id="nom222" >
			<?php  foreach ($repons as $rr):
				$cin = $rr['cin']; 
				$iid = $rr['id'];
				echo "<option id='$iid' value='$cin'>";
				endforeach;a
			?>
		</datalist>
		<label>C.I.N</label>
	</div>
