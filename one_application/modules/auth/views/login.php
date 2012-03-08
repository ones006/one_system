<div class="login-box">
      <section class="portlet login-box-top">
            <header>
                <h2 class="ac">ALUS SOLUTION SYSTEM</h2>
            </header>
            <section>
                <div class="message info">Please login with your email/username and password below.</div>
                <?php echo $message; ?>
                <?php echo form_open("auth/login","class='has-validation' style='margin-top:30px' id='form'");?>
                    <p style="margin-bottom: 30px">
                       
                        <?php echo form_input($identity);?>
                    </p>
                    <p style="margin-bottom: 30px">
                        <?php echo form_input($password);?>
                    </p>
                    <p class="clearfix">
                        <span class="fl" style="line-height: 23px;">
                            <label class="choice" for="remember">
                                <input type="checkbox" id="remember" class="" value="1" name="remember"/>
                                Remember me
                            </label>
                        </span>

                        <button class="fr" type="submit">Login</button>
                    </p>
                <?php echo form_close();?>
                <!--<footer class="ac">
                    <a href="#" class="button">Reset Password</a>
                    <a href="#" class="button">Register</a>
                </footer>-->
            </section>
      </section>
  </div>