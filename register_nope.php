<?php

include_once 'lib.php';
View::start('Registro de usuario');
$db = new PDO("sqlite:datos.db");
$db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión
//$res=$db->prepare('SELECT * FROM juegos;');
//$res->execute();
//session_start();
/*
$form = '<form class="registro" method=post action="<?php echo htmlspecialchars($_SERVER[\'PHP_SELF\']);?>\">
        <fieldset>
        <legend>Registro</legend>
        Usuario: <input type="text" name="usuario" required="yes"><br>
        Contraseña: <input type="text" name="pass" required="yes"><br>
        Nombre: <input type="text" required="yes"><br>
        Correo: <input type="email" name="correo" required="yes"><br><br>
        <input type="submit">
        <input type="reset">
        </fieldset>';
*/
$form = '<div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up for Free</h1>

          <form action="/" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>

          <button type="submit" class="button button-block"/>Get Started</button>

          </form>

        </div>

        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="/" method="post">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <button class="button button-block"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div>

<script type=\"text/javascript\">
$(\'.form\').find(\'input, textarea\').on(\'keyup blur focus\', function (e) {

    var $this = $(this),
        label = $this.prev(\'label\');

    if (e.type === \'keyup\') {
        if ($this.val() === \'\') {
            label.removeClass(\'active highlight\');
        } else {
            label.addClass(\'active highlight\');
        }
    } else if (e.type === \'blur\') {
        if( $this.val() === \'\' ) {
            label.removeClass(\'active highlight\');
        } else {
            label.removeClass(\'highlight\');
        }
    } else if (e.type === \'focus\') {

        if( $this.val() === \'\' ) {
            label.removeClass(\'highlight\');
        }
        else if( $this.val() !== \'\' ) {
            label.addClass(\'highlight\');
        }
    }

});

$(\'.tab a\').on(\'click\', function (e) {

    e.preventDefault();

    $(this).parent().addClass(\'active\');
    $(this).parent().siblings().removeClass(\'active\');

    target = $(this).attr(\'href\');

    $(\'.tab-content > div\').not(target).hide();

    $(target).fadeIn(600);

});</script>';
echo $form;
//echo "";

View::end();
