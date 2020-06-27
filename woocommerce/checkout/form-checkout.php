<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );



// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<div class="steps-checkout">
    <ul class="cart__steps uk-child-width-expand uk-grid-collapse" uk-grid>
        <li class="and-active">
            <div class="uk-grid-small uk-width-auto" uk-grid>
                <div class="cart__steps-icon">
                    <span class="icon" uk-icon="icon: cart"></span>
                    <span>1</span>
                </div>
                <div class="uk-grid-small uk-width-expand uk-flex uk-flex-middle" uk-grid>
                    <div class="uk-width-expand"><span class="uk-visible@m">Корзина</span></div>
                </div>
            </div>
        </li>
        <li class="active">
            <div class="uk-grid-small uk-width-auto" uk-grid>
                <div class="cart__steps-icon">
                    <span class="icon" uk-icon="icon: file-edit"></span>
                    <span>2</span>
                </div>
                <div class="uk-grid-small@s uk-grid-collapse uk-width-expand uk-flex uk-flex-middle" uk-grid>
                    <div class="uk-width-expand"><span class="uk-visible@m">Анкета</span></div>
                </div>
            </div>

        </li>
        <li class="uk-width-auto uk-align-right">
            <div class="uk-grid-small uk-width-auto" uk-grid>
                <div class="cart__steps-icon">
                    <span class="icon" uk-icon="icon: check"></span>
                    <span>3</span>
                </div>
                <div class="uk-grid-small uk-width-expand uk-flex uk-flex-middle" uk-grid>
                    <div class="uk-width-expand"><span class="uk-visible@m">Заказ оформлен</span></div>
                </div>
            </div>
        </li>
    </ul>
</div>


<form name="checkout" method="post" class="uk-form checkout woocommerce-checkout"
    action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

    <div uk-grid>
        <div class="uk-width-2-3@m">
            <?php if ( $checkout->get_checkout_fields() ) : ?>

            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

            <div class="col2-set" id="customer_details">
                <div class="col-1">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div>

                <div class="col-2">
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                </div>
            </div>

            <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

            <?php endif; ?>
        </div>
        <div class="uk-width-1-3@m">
            <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

            <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </div>
    </div>







</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>