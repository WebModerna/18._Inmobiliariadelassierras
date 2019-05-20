			</div> <!-- end #content-->
		</div> <!-- end #content-top-->
		<div id="content-bottom">	</div>
		<p id="copyright">
			<span style="font-size:12px;">© Copyright <?php echo Date(Y); ?> Inmobiliaria de las Sierras.</span><br />
			Lunes a viernes de 9hs a 17hs. Sábados de 9hs a 13hs.<br />
			Salta esq. Ruta 15 | Villa Cura Brochero | Traslasierra | Córdoba | Argentina | <strong>Tel: 03544-15551212</strong><br />
			<strong>info@sierrasinmobiliaria.com.ar</strong> | <a href="http://www.sierrasinmobiliaria.com.ar" target="_blank">www.sierrasinmobiliaria.com.ar</a>
		</p>
		<p style="text-align:right !important; font-size:12px; ">Desarrollado por <a href="http://www.webmoderna.com.ar" target="_blank" style="text-align:right !important;font-size:12px !important;" >WebModerna</a>
		</p>
		</div><!-- end #container -->
	</div>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/01-all-javascript.js"></script>
	<script type="text/javascript">document.documentElement.className = 'js';</script>
	<!--<script type="text/javascript">
	$(document).ready(function(){
	//código a ejecutar cuando el DOM está listo para recibir instrucciones.
	/*$("a#menu-principal").click(function(event){
		event.preventDefault();
		$("ul#primary").slideDown("fast");
	      /*$("#menu-oculto").slideUp("fast");
	});
	$("a#menu-categorias").click(function(event){
		event.preventDefault();
		$("ul#secondary").slideDown("fast");
        /*$("#menu-oculto").slideUp("fast");
	});
	$("#menu-oculto").mousedown(function(event){
		event.preventDefault();
		$("ul#primary").slideUp("fast");
		$("ul#secondary").slideUp("fast");
		/*$("#menu-oculto").slideDown("fast");
	});
	});

	Esto estaba en el head:
	: 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
	*/
	</script>-->

<?php include_once("analyticstracking.php") ?>
	<!-- end #wrapper -->
	<?php get_template_part('includes/scripts'); ?>
	<?php wp_footer(); ?>
</body>
</html>