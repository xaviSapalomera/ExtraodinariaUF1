<?php
// Xavi Gallego Palau


include './model/model_articles.php';


    $articles = mostrarTotsArticles();

$paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Obtener la página actual desde la URL, por defecto 1


$totalPagines = 0; // Inicializar total de páginas a 0


// Compta el nombre total d'articles
$totalArticulos = count($articles);

// Quans articles per pagina
$articulosPorPagina = 3; 

// Calcula el total de pagines que necesitarem
if ($totalArticulos > 0) {
    $totalPagines = ceil($totalArticulos / $articulosPorPagina);
}

// Calcula quin es el primer article que mostrara de cada pagina
$posicioInici = ($paginaActual - 1) * $articulosPorPagina;

// Agafa nomes els articles de la pagina actual
$articles = array_slice($articles, $posicioInici, $articulosPorPagina); // Ajustar la lógica según tu método para obtener artículos


?>
			<!-- Assegura't que els articles estan disponibles correctament -->
			<?php if (!empty($articles)){ ?>
				<ul>
					<!-- Llistem els articles obtinguts de la base de dades -->
					<?php foreach ($articles as $article){ ?>
						<li>
							<?= isset($article['id']) ? $article['id'] : 'Sense ID' ?>.- 
							<?= isset($article['titol']) ? htmlspecialchars($article['titol']) : 'Sense Titol' ?>
						</li>
						<li>
							<?= isset($article['cos']) ? htmlspecialchars($article['cos']) : 'Sense Cos' ?>
						</li>
					<?php } ?>
				</ul>
			<?php }else{ ?>
				<p>No hi ha articles disponibles en aquesta pagina.</p>
			<?php } ?>
			</section>

			<!-- Secció per a la paginació -->
			<section class="paginacio">
				<ul>
					<!-- Botó "Anterior" deshabilitat si estem a la primera pàgina -->
					<?php if ($paginaActual > 1){ ?>
						<li><a href="?page=<?= $paginaActual - 1 ?>">&laquo; Anterior</a></li>
					<?php }else{ ?>
						<li class="disabled"><a href="#">&laquo; Anterior</a></li>
					<?php } ?>

					<!-- Mostrem els números de les pàgines -->
					<?php for ($i = 1; $i <= $totalPagines; $i++){ ?>
						<?php if ($paginaActual == $i){ ?>
							<li class="active"><a href="#"><?= $i ?></a></li>
						<?php }else{ ?>
							<li><a href="?page=<?= $i ?>"><?= $i ?></a></li>
						<?php } ?>
					<?php }?>

					<!-- Botó "Següent" deshabilitat si estem a l'última pàgina -->
					<?php if ($paginaActual < $totalPagines){ ?>
						<li><a href="?page=<?= $paginaActual + 1 ?>">Següent &raquo;</a></li>
					<?php }else{?>
						<li class="disabled"><a href="#">Següent &raquo;</a></li>
					<?php } ?>
				</ul>
			</section>
		</div>




</body>
