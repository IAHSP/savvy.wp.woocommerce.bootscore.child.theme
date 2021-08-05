<?php
/**
 * Offcanvas Login / Registration and User Dashboard
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

?>


<?php if ( is_user_logged_in() ) { ?>

  <div class="account-salution">
    <p class="h2">
      <?php esc_html_e('Hello' , 'bootscore'); ?> <?php global $current_user;
        wp_get_current_user();
        echo '' . $current_user->display_name . "\n";
      ?>
    </p>
     <p><?php esc_html_e('Here you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.', 'bootscore'); ?></p>
  </div>

  <div class="navigation">
    <nav class="woocommerce-MyAccount-navigation" role="navigation">
      <div class="list-group mb-4">
        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
        <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="list-group-item list-group-item-action"><?php echo esc_html( $label ); ?></a>
        <?php endforeach; ?>
      </div>
    </nav>
  </div>

<?php } else { ?>

  <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

  <div id="customer_login">

    <div class="login">

      <?php endif; ?>

      <p class="h2"><?php esc_html_e( 'Login', 'woocommerce' ); ?></p>
      <p class="h5"><?php esc_html_e( 'Login with your IAHSP or SAVVY Pro account.', 'woocommerce' ); ?></p>

      <div class="card mt-3 mb-4">
        <?php //echo do_shortcode('[mo_firebase_auth_display_login_form]'); ?>

        <?php
          $args = array(
            'echo'           => true,
            'remember'       => true,
            'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
            'form_id'        => 'loginform',
            'id_username'    => 'user_login',
            'id_password'    => 'user_pass',
            'id_remember'    => 'rememberme',
            'id_submit'      => 'wp-submit',
            'label_username' => __( 'Email Address' ),
            'label_password' => __( 'Password' ),
            'label_remember' => __( 'Remember Me' ),
            'label_log_in'   => __( 'Log In' ),
            'value_username' => '',
            'value_remember' => false
          );
        ?>

        <div class="card-body">
          <?php wp_login_form($args); ?>
          <div class="lost-password">
            <small><a href="/my-account/lost-password/">Lost your password?</a></small>
          </div>
        </div>
        <script>
          //Need to add the bootstrap classes manually, after WP has created the login form.
          document.getElementById('user_login').classList.add('form-control');
          document.getElementById('user_pass').classList.add('form-control');
          document.getElementById('rememberme').classList.add('form-check-input');
          document.getElementById('wp-submit').classList.add('btn', 'btn-primary');
        </script>
        <style>#wp-submit{color: #fff}</style>


        <?php if (0==1): ?>
        <form class="card-body" method="post">

          <?php do_action( 'woocommerce_login_form_start' ); ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="username"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password" />
          </p>

          <?php do_action( 'woocommerce_login_form' ); ?>

          <p class="form-check mb-3">
            <input name="rememberme" type="checkbox" class="form-check-input" id="rememberme" value="forever" />
            <label class="form-check-label" for="rememberme"><?php _e( 'Remember me', 'woocommerce' ); ?></label>
          </p>

          <p class="form-row">
            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
            <button type="submit" class="woocommerce-form-login__submit btn btn-primary" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
          </p>
          <p class="woocommerce-LostPassword lost_password mb-0 mt-3">
            <a href="https://iahsp.com/forgot"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
          </p>

          <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>
        <?php endif; ?>

      </div>

      <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

    </div>

    <div id="iahsp-reg">
      <p class="h5">Not an IAHSP member yet?</p>
      <p>That's not a problem!  Go <a href="https://iahsp.com/register/">Here To Register</a> for an account now!</p>
    </div>

    <div id="savvy-reg">
      <p class="h5">Want to become a SAVVY Pro Member only?</p>
      <p>You can sign up to be a SAVVY Pro member!  Go <a href="https://iahsp.com/register/reg-savvy">Here To Register</a> for an account now!</p>
    </div>

    
  </div>
  <?php endif; ?>

  <?php do_action( 'woocommerce_after_customer_login_form' ); ?>

<?php } ?>
