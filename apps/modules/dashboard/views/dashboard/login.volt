<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
        {{flashSession.output()}}
        <!-- Login Form s-->
        <form action="{{url('login')}}" method="POST">

            <div class="login-form">
                <h4 class="login-title">Login</h4>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <label>Username</label>
                        <input class="mb-0" type="username" name="username" placeholder="Username" required autofocus>
                    </div>
                    <div class="col-12">
                        <label>Password</label>
                        <input class="mb-0" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="col-md-8">
                    </div>

                    <div class="col-md-4 mt-10 text-left text-md-right">
                        <a href="{{url('register')}}"> Create New Account</a>
                    </div>

                    <div class="col-md-6">
                        <button class="register-button mt-0" type="submit">Login</button>
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>