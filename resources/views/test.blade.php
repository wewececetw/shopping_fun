<form method="POST" action="{{ route('login') }}" >
@csrf
<div class="form-group">
    <label>Username</label>
    <input type="email" class="form-control" placeholder="Email address"required="email">
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Password" required="">
</div>
<div class="form-group form-check">
    <input class="form-check-input" type="checkbox" value="" id="top-login-checkbox">
    <label class="form-check-label" for="top-login-checkbox">Remember Me</label>
</div>
<button class="btn btn-danger w-100" type="submit">Sign in</button>
</form>