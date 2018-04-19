@extends('layouts.admin')

@section('content')
    <div id="paypal-button"></div>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Button.render({
            env: 'sandbox', // Or 'sandbox',

            commit: true, // Show a 'Pay Now' button

            style: {
                color: 'gold',
                size: 'small'
            },

            payment: function(data, actions) {
                /*
                 * Set up the payment here
                 */
            },

            onAuthorize: function(data, actions) {
                /*
                 * Execute the payment here
                 */
                console.log(data);
            },

            onCancel: function(data, actions) {
                /*
                 * Buyer cancelled the payment
                 */
            },

            onError: function(err) {
                /*
                 * An error occurred during the transaction
                 */
            }
        }, '#paypal-button');
    </script>

    <table>
        <tr>
            <td>Bass Guitar Strings</td>
            <td>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="6RNT8A4HBBJRE">
                    <input type="image"
                           src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif"
                           border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif"
                         width="1" height="1">
                </form>
            </td>
        </tr>
    </table>
@endsection