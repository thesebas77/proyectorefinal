<?php include '../conexion/conexion.php'; 

?>
</main>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
	<script src="../js/materialize.js"> </script>
	<script src="../js/sweetalert2.js"> </script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121875488-1"></script>
		
	<script>
		window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-121875488-1');

		  
		 /*window.onbeforeunload = function() {
      		return "¿Estás seguro que deseas salir de la actual página?"
        }*/

		$('#buscar').keyup(function(event){
			var contenido = new RegExp($(this).val(),'i');
			$('tr').hide();
			$('tr').filter(function(){
				return contenido.test($(this).text());
			}).show();
			$('.cabecera').attr('style','');
		});

		$('.button-collpase').sideNav();

		function may(obj, id){
			obj = obj.toUpperCase();
			document.getElementById(id).value = obj;
		}

		$('select').material_select();

		  $( document ).ready(function() {
      		 $('.datepicker').pickadate({
          		format: 'dd/mm/yyyy',
         		 selectMonths: true, // Creates a dropdown to control month
          		 selectYears: 15 // Creates a dropdown of 15 years to control year
	        });
    	});

		$('.dropdown-trigger').dropdown();

		$('#pjuridica').hide();

		$("#humana").change(function(){
  			
		  $('#phumana').show();
		  $('#pjuridica').hide();
		  document.getElementById('cuil').value='';

		});

		$("#juridica").change(function(){
  
		  $('#pjuridica').show();
		  $('#phumana').hide();
		  document.getElementById('dni').value='';

		});


		$('#pimportado').hide();

		$("#nacional").change(function(){
  			
		  $('#pnacional').show();
		  $('#pimportado').hide();
		  

		});

		$("#importado").change(function(){
  
		  $('#pimportado').show();
		  $('#pnacional').hide();
		  

		});


		 $(document).ready(function(){
		    $('.parallax').parallax();
		  });

		  $(document).ready(function(){
		    $('.slider').slider();
		  });


    	$(document).ready(function(){
		    $('.scrollspy').scrollSpy();
		  });

    	 $(document).ready(function(){
		    $('.tabs').tabs();
		  });
		          

	</script>






