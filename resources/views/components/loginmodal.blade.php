<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-5">
            <div class="modal-body">
                <div class="form-title">
                    <div class="d-flex justify-content-between py-3">
                        <div class="">
                            <h2>Login</h2>
                            <h5>Hi, Welcome back.</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="#" class="txt-color-main" id="modalDaftar">Register</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column text-center">
                    <form id="submit-form" action="{{ route('check-login') }}" class="login-page">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="username" id="username"
                                data-validation="required" placeholder="Email">
                        </div>
                        <div class="form-group my-3">
                            <input type="password" class="form-control" name="password" id="password"
                                data-validation="required" placeholder="Password">
                        </div>
                        <input type="hidden" name="redirect_to" id="redirect_to" value="">
                        <span class="mb-3">Forgot your password? <a href="#" class="txt-color-main" id="modalLupaPassword">Click Here</a></span>
                        <button type="submit" class="btn w-100 mt-3 text-white bg-main blue-button">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-5">
            <div class="modal-body">
                <div class="form-title">
                    <div class="row">
                        <div class="col text-center py-3">
                            <h2>Register Now</h2>
                            <h6>Already have a Lolypoly account? <a href="" class="txt-color-main modalMasuk"
                                    id="modalMasuk">Login</a></h6>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column text-center">
                    <form id="submit-form-register" action="{{ route('check-register') }}" class="login-page">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" id="register_name" name="register_name"
                                placeholder="Name" data-validation="required">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control my-3" id="register_email" name="register_email"
                                placeholder="Email" data-validation="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control my-3" id="register_password"
                                name="register_password" placeholder="Password" data-validation="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control my-3" id="register_password_confirm"
                                name="register_password_confirm" placeholder="Confirm Password"
                                data-validation="required">
                        </div>
                        <button type="submit" class="btn w-100 text-white bg-main blue-button">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-5">
            <div class="modal-body">
                <div class="form-title">
                    <div class="row">
                        <div class="col text-center py-3">
                            <h2>Forgot your Password?</h2>
                            <h6>We cannot simply send you your old password. A unique link to reset your password will
                                be sent to you. To reset your password, fill the input below with your email account and
                                follow the instructions.</h6>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column text-center">
                    <form id="submit-form-forgot-password" action="{{ route('forgot-password') }}" class="login-page">
                        <div class="form-group">
                            <input type="email" class="form-control my-3" id="customer_email"
                                name="customer_email" placeholder="Email" data-validation="required">
                        </div>
                        <button type="submit" class="btn w-100 text-white bg-main blue-button">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
