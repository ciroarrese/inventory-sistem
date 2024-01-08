<div class="container is-fluid mb-6">
	<!--div class="notification is-primary"-->
	<h1 class="title">Usuarios</h1>
	<h2 class="subtitle">Nuevo usuario</h2>
	<!--/div-->
</div>

<div class="container is-max-desktop">

	<div class="form-res"></div>

	<br>

	<form action="./php/user_save.php" method="POST" class="ajax" autocomplete="off">

		<!-- Name -->
		<div class="field">
			<div class="control">
				<input class="input" type="text" name="name" placeholder="Nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}" maxlength="40" require>
			</div>
		</div>
		<!-- LastName -->
		<div class="field">
			<div class="control">
				<input class="input" type="text" name="lastname" placeholder="Apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{3,40}" maxlength="40" require>
			</div>
		</div>

		<!-- UserName -->
		<div class="field">
			<div class="control has-icons-left has-icons-right">
				<input class="input" type="text" name="user" placeholder="User Name" pattern="[a-zA-Z0-9$_.\-]{4,20}" maxlength="20" required>
				<span class="icon is-small is-left">
					<i class="fa-solid fa-user"></i>
				</span>
				<!-- <span class="icon is-small is-right">
            			<i class="fa-solid fa-circle-check"></i>
          		</span> -->
			</div>
			<!-- p class="help is-success">Usuario disponible p -->
		</div>

		<!-- Email -->
		<div class="field">
			<p class="control has-icons-left has-icons-right">
				<input class="input" type="email" name="email" placeholder="Email" maxlength="70">
				<span class="icon is-small is-left">
					<i class="fa-solid fa-at"></i>
				</span>
				<!-- <span class="icon is-small is-right">
            			<i class="fa-solid fa-circle-check"></i>
          		</span> -->
			</p>
		</div>

		<!-- Password -->
		<div class="field">
			<p class="control has-icons-left">
				<input class="input" type="password" name="pass1" placeholder="Password" pattern="[a-zA-Z0-9$@_#&%!¡¿?.\-]{7,100}" maxlength="100" required>
				<span class="icon is-small is-left">
					<i class="fa-solid fa-lock"></i>
				</span>
			</p>
		</div>
		<div class="field">
			<p class="control has-icons-left">
				<input class="input" type="password" name="pass2" placeholder="Repeat Password" pattern="[a-zA-Z0-9$@_#&%!¡¿?.\-]{7,100}" maxlength="100" required>
				<span class="icon is-small is-left">
					<i class="fa-solid fa-lock"></i>
				</span>
			</p>
		</div>

		<br>

		<!-- Send Button -->
		<div class="field">
			<p class="control">
				<button type="submit" class="button is-success is-rounded">
					<span>
						<i class="fa-solid fa-check"></i>
						Guardar
					</span>
				</button>
			</p>
		</div>

	</form>

</div>