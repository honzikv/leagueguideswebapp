<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <h1 class="">Register your account</h1>
        </div>

        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label for="username"></label>
                    <input type="text" class="form-control textInput" id="username"
                           aria-describedby="usernameInfo"
                           placeholder="Username" required>
                    <small id="usernameInfo" class="hintText">This username will be visible to other users</small>

                    <label for="password"></label>
                    <input type="password" class="form-control textInput" id="password" placeholder="Password"
                           required>

                    <label for="email"></label>
                    <input type="email" class="form-control textInput" id="email" name="inputEmail"
                           placeholder="email@gmail.com" required>
                </div>

                <a href="/login">Already have account? Log-in</a>
                <button type="submit" class="btn btn-primary mt-2 float-end">Register</button>
            </form>
        </div>

    </div>
</div>