<div class="col-lg-6">
    <div class="d-flex flex-column h-100">
        <div class="p-4 my-auto">
            <h4 class="fs-20">Sign In</h4>
            <p class="text-muted mb-3">Enter your email address and password to access
                account.
            </p>

            <!-- form -->
            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <label for="emailaddress" class="form-label">Email address</label>
                    <input class="form-control" type="email" id="emailaddress" required="" wire:model="email"
                        placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <a href="auth-forgotpw.html" class="text-muted float-end"><small>Forgot
                            your
                            password?</small></a>
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" required="" id="password" wire:model="password"
                        placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox-signin">
                        <label class="form-check-label" for="checkbox-signin">Remember
                            me</label>
                    </div>
                </div>
                <div class="mb-0 text-start">
                    <button class="btn btn-soft-primary w-100" type="submit"><i class="ri-login-circle-fill me-1"></i>
                        <span class="fw-bold">Log
                            In</span> </button>
                </div>
            </form>
            <!-- end form-->
        </div>
    </div>
</div> <!-- end col -->
