<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Articles</title>
    <link rel="stylesheet" href="estil.css">
</head>
<body>
<!-- Xavi Gallego -->

<div class="contenidor">
			<h1>Articles</h1>
			<section class="articles">


<?php


include './model/model_articles.php';

    $articles = mostrarTotsArticles();

	// Obtenim la pagina actual des de la URL, per defecte 1
	$paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	
	// Inicialitzem el total de pagines a 0
	$totalPagines = 0; 
	
	// Comptem el nombre d'articles disponibles
	$totalArticles = count($articles);
	
	
	// Quants articles volem mostrar per pagina
	$articlesPerPagina = 10; 
	
	if ($totalArticles > 0) {
		$totalPagines = ceil($totalArticles / $articlesPerPagina);
	}
	
	// Ajustem la llista segons la pagina actual
	$offset = ($paginaActual - 1) * $articlesPerPagina;
	$articles = array_slice($articles, $offset, $articlesPerPagina); 
	?>
	
	
	<?php if (!empty($articles)){ ?>
		<ul>
			<!-- Llistem els articles obtinguts de la base de dades -->
			<?php foreach ($articles as $article){ ?>
				<li>
					<?= isset($article['id']) ? $article['id'] : 'Sense ID' ?>.- 
					<?= isset($article['titol']) ? htmlspecialchars($article['titol']) : 'Sense títol' ?>
				</li>
				<li>
					<?= isset($article['cos']) ? htmlspecialchars($article['cos']) : 'Sense cos' ?>
				</li>
			<?php } ?>
		</ul>
	<?php }else{ ?>
		<p>No hi ha articles disponibles en aquesta pagina.</p>
	<?php } ?>
	</section>
	
	<!-- Paginacio -->
	<section class="paginacio">
		<ul>
			<!-- El boto Anterior se deshabilitat si estem a la primera pagina -->
			<?php if ($paginaActual > 1){ ?>
				<li><a href="?page=<?= $paginaActual - 1 ?>">&laquo; Anterior</a></li>
			<?php }else{ ?>
				<li class="disabled"><a href="#">&laquo; Anterior</a></li>
			<?php } ?>
	
			<!-- Mostrem els numeros de les pagines -->
			<?php for ($i = 1; $i <= $totalPagines; $i++){ ?>
				<?php if ($paginaActual == $i){ ?>
					<li class="active"><a href="#"><?= $i ?></a></li>
				<?php }else{ ?>
					<li><a href="?page=<?= $i ?>"><?= $i ?></a></li>
				<?php } ?>
			<?php }?>
	
			<!-- El boto Següent se deshabilitat si estem a l'ultima pagina -->
			<?php if ($paginaActual < $totalPagines){ ?>
				<li><a href="?page=<?= $paginaActual + 1 ?>">Següent &raquo;</a></li>
			<?php }else{?>
				<li class="disabled"><a href="#">Següent &raquo;</a></li>
			<?php } ?>
		</ul>
	</section>
	</div>
	

</body>
</html>

