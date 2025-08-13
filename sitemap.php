<?php 

include_once 'controller/constantes.php';

	// Datos de conexión a la Base de Datos
	$servidor = SRV;
	$usuario = USR;
	$password = PAS;
	$db = BDA;
	$urlBase = "https://sanpedroclaver.edu.co/";
 
	// Creo la conexión
	$conexion = new mysqli($servidor, $usuario, $password, $db);
 
	// Soporte para caracteres y símbolos extraños
	$conexion->set_charset("utf8");
 
	// Validamos la conexión a la Base de Datos
	if ($conexion->connect_error) {
	    die("Erro en la Conexión a la Base de Datos: " . $conexion->connect_error);
	}
 
	// Pido el campo 'url' de todos los postres o registros de la tabla 'postres' en la Base de Datos 
	$sql = "SELECT curso.cur_dip_pre_url AS urlCurso FROM curso_diplomado_presencial as curso";
	$sql1 = "SELECT noti.noti_url AS urlCurso FROM noticias as noti";
 
	// Llamo los resultados con los postres o registros
	$resultados = $conexion->query($sql);
	$resultados1 = $conexion->query($sql1);
 
	// Defino mi archivo como XML  
	header("Content-Type: text/xml");
 
	// Inicio la estructura de mi archivo XML 
	echo "<?xml version='1.0' encoding='iso-8859-1' ?>" .
	"<urlset xmlns='https://www.sitemaps.org/schemas/sitemap/0.9'>";	
 
	echo "<url>
			<loc>$urlBase</loc>
			<changefreq>weekly</changefreq>
			<priority>"."1.0"."</priority>
		 </url>";
		 
 	echo "<url>
			<loc>".$urlBase."cursos-y-diplomados</loc>
			<changefreq>weekly</changefreq>
			<priority>"."1.0"."</priority>
		 </url>";
		 
 	echo "<url>
			<loc>".$urlBase."cursos-virtuales</loc>
			<changefreq>weekly</changefreq>
			<priority>"."1.0"."</priority>
		 </url>";
 
	echo "<url>
			<loc>".$urlBase."nosotros</loc>
			<changefreq>weekly</changefreq>
			<priority>"."0.8"."</priority>
		  </url>";
		  
	echo "<url>
			<loc>".$urlBase."requisitos</loc>
			<changefreq>weekly</changefreq>
			<priority>"."0.8"."</priority>
		  </url>";
		  
	echo "<url>
			<loc>".$urlBase."pre-inscripcion</loc>
			<changefreq>weekly</changefreq>
			<priority>"."0.8"."</priority>
		  </url>";
		  
	echo "<url>
			<loc>".$urlBase."contacto</loc>
			<changefreq>weekly</changefreq>
			<priority>"."0.8"."</priority>
		  </url>";
		  
	echo "<url>
			<loc>".$urlBase."politica-de-privacidad</loc>
			<changefreq>weekly</changefreq>
			<priority>"."0.8"."</priority>
		  </url>";	
 
	if ($resultados->num_rows > 0) {
 
	    while($row = $resultados->fetch_assoc()) {
 
	    	echo "<url>
					<loc>".$urlBase."". $row["urlCurso"]. "</loc>
					<changefreq>weekly</changefreq>
					<priority>"."1.0"."</priority>
				  </url>";
	    }
 
	} 
	if ($resultados1->num_rows > 0) {
 
	    while($row = $resultados1->fetch_assoc()) {
 
	    	echo "<url>
					<loc>".$urlBase."noticias/". $row["urlCurso"]. "</loc>
					<changefreq>weekly</changefreq>
					<priority>"."0.8"."</priority>
				  </url>";
	    }
 
	}
 
	// Si no hay registros en la Base de Datos enviamos el siguiente mensaje
	else {
	    echo "0 resultados";
	}
  
	
 	// Cierre de la etiqueta del archivo XML del Sitemap
	echo "</urlset>";
 
	// Cierro la conexión a la Base de Datos por seguridad 
	$conexion->close();  


?>
