<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
        {{flashSession.output()}}
        <!-- Login Form s-->
        <form action="{{url('register')}}" method="POST">

            <div class="login-form">
                <h4 class="login-title">Register</h4>

                <div class="row">
                    <div class="col-md-12">
                        <label>Username</label>
                        {{form.render('username')}}
                        <!-- <input type="text" name="username" placeholder="Username"> -->
                    </div>
                    <div class="col-md-12">
                        <label>Name</label>
                        {{form.render('name')}}
                        <!-- <input type="text" name="name" placeholder="Name"> -->
                    </div>
                    <div class="col-md-12">
                        <label>Email Address</label>
                        {{form.render('email')}}
                        <!-- <input type="email" name="email" placeholder="Email Address"> -->
                    </div>
                    <div class="col-md-6">
                        <label>Password</label>
                        {{form.render('password')}}
                        <!-- <input type="password" name="password" placeholder="Password"> -->
                    </div>
                    <div class="col-md-6">
                        <label>Confirm Password</label>
                        {{form.render('password_confirm')}}
                        <!-- <input type="password" name="confirm_password" placeholder="Confirm Password"> -->
                    </div>
                    <div class="col-md-6">
                        <button class="register-button" type="submit">Register</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>