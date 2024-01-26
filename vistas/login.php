<div class="wrapper">
	<form class="login-box" action="" method="POST" autocomplete="off">
		<div class="login-header">
			<span>Login</span>
		</div>

		<!-- USERNAME -->
		<div class="input-box">
			<input class="input-field" id="user" type="text" name="login_user" pattern="[a-zA-Z0-9$_.\-]{4,20}" placeholder=" " maxlength="20" required>
			<label for="user" class="label">Username</label>
			<i class="bx bx-user icon"></i>
		</div>

		<!-- PASS -->
		<div class="input-box">
			<input class="input-field" id="pass" type="password" name="login_pass" pattern="[a-zA-Z0-9$@_#&%!¡¿?.\-]{7,100}" placeholder=" " maxlength="100" required>
			<label for="pass" class="label">Password</label>
			<i class="bx bx-lock-alt icon"></i>
		</div>

		<!-- REMEMBER & FORGOT -->
		<div class="remember-forgot">
			<div class="remember-me">
				<input type="checkbox" id="remember">
				<label for="remember">Remember me</label>
			</div>

			<div class="forgot">
				<a href="#">Forgot password?</a>
			</div>
		</div>

		<!-- BUTTON -->
		<div class="input-box">
			<button type="submit" class="input-submit">Start</button>
		</div>

		<!-- REGISTER -->
		<div class="register">
			<span>Don't have an account? <a href="#">Register</a></span>
		</div>

		<?php

		if (isset($_POST['login_user']) && isset($_POST['login_pass'])) {
			require_once './php/main.php';
			require_once './php/start_session.php';
		}

		?>

	</form>
</div>