<form class="form-signin" method="POST" action="/index.php/login/autenticate">
    <h2 class="form-signin-heading">Please log in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input name='email' type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name='pass' type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
	<label>
            <input type="checkbox" value="remember-me"> Remember me
	</label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
</form>