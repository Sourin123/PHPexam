<div>
        <form id="form" class="container g-2 p-5 m-xl" method="post" action="/UNI/server.php">
            <div class="gx-5" style="margin-left: 20%;margin-right: 20%;">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"> +91</span>
                        <input type="number" class="form-control" id="phone" name="phone">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="pass">
                
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Must be 8-20 characters long.
                    </span>
                </div>
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" checked>
                        <label class="form-check-label" for="gridRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Female">
                        <label class="form-check-label" for="gridRadios2">
                            Female
                        </label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="Others" >
                        <label class="form-check-label" for="gridRadios3">
                            Others
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                           <strong> have you read our <a href="t&c.php"> Teams and Conditions</a> . </strong>
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
    <script src="/script.js"></script>