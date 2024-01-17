<div class="main-container">

	<form class="box login" action="" method="POST" autocomplete="off">
		<h5 class="title is-5 has-text-centered is-uppercase">
			Sistema de inventario
		</h5>

		<!-- USER -->
		<div class="field">
			<label class="label" for="user">
				User
			</label>
			<div class="control">
				<input id="user" class="input" type="text" name="login_user" pattern="[a-zA-Z0-9$_.\-]{4,20}" maxlength="20" required>
			</div>
		</div>

		<!-- PASS -->
		<div class="field">
			<label class="label" for="pass">
				Password
			</label>
			<div class="control">
				<input id="pass" class="input" type="password" name="login_pass" pattern="[a-zA-Z0-9$@_#&%!¡¿?.\-]{7,100}" maxlength="100" required>
			</div>
		</div>

		<!-- BUTTON -->
		<p class="has-text-centered mb-4 mt-3">
			<button type="submit" class="button is-info is-rounded">Iniciar sesion</button>
		</p>


		<?php

		if (isset($_POST['login_user']) && isset($_POST['login_pass'])) {
			require_once './php/main.php';
			require_once './php/start_session.php';
		}

		?>

	</form>

</div>