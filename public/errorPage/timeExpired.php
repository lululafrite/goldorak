<section class="article__section">
	<H2 class="text-center article__section--sousTitre">Time of connexion is expired!</H2>
	<article class="text-center">
		<p class="article__paragraphe" style="color: red; font-size:20px;">
			</br>
			The time of connexion is expired. Please log in again.
			</br>
			Le temps de connexion est expiré. Veuillez vous reconnecter.
			</br>
			<a class="btn-primary" type="button" href="index.php?page=connexion">Connexion</a>
			<hr>
		</p>
	</article>
</section>

<script>

	window.onload = function(){

		setTimeout(function(){

			window.location.href = "http://goldorak/index.php?page=connexion";

		}, 5000);

	};

</script>