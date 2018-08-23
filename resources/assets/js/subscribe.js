$(document).ready(function() {

    $('#subscribe-form').submit(function(e) {
        var form = $(this);

        form.find('button').prop('disabled', true);

        Stripe.card.createToken(form, function(status, response) {

                //console.log(val(response.id));

                form.append($('<input type="hidden" name="cc_token">').val(response.id));

                form.get(0).submit();
            });
            e.preventDefault();
        });
    });
