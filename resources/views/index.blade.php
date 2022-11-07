<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ url('style.css') }}">
<body>
    <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fa fa-rocket"></i> 
        Pay Now 
    </button>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="text-right">
                <i class="fa fa-close close" data-dismiss="modal"></i>
              </div>
              <div class="tabs mt-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist" >
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true">
                      <img src="{{ asset('images/stripe.png') }}" width="80">
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false">
                      <img src="{{ asset('images/paypal-logo.png') }}" width="80">
                    </a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                    <div class="mt-4 mx-4">
                      <div class="text-center">
                        <h5>Credit card</h5>
                      </div>
                      <form 
                            role="form" 
                            action="{{ route('stripe.post') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form"
                            novalidate>
                        @csrf

                      <div class="form mt-3">
                        <div class="inputbox">
                          <input type="text" name="name" class="form-control" required="required">
                          <span>Cardholder Name</span>
                        </div>
                        <div class="inputbox">
                          <input type="text" name="name" min="1" max="999" class="form-control card-number" required="required">
                          <span>Card Number</span>
                          <i class="fa fa-eye"></i>
                        </div>
                        <div class="d-flex flex-row">
                          <div class="inputbox">
                            <input type="text" name="name" min="1" max="999" class="form-control card-expiry-month" required="required">
                            <span>Expiration Month</span>
                          </div>
                          <div class="inputbox">
                            <input type="text" name="name" min="1" max="2024" class="form-control card-expiry-year" required="required">
                            <span>Expiration Year</span>
                          </div>
                          <div class="inputbox">
                            <input type="text" name="name" min="1" max="999" class="form-control card-cvc" required="required">
                            <span>CVV</span>
                          </div>
                        </div>
                        <div class="px-5 pay">
                          {{-- <button class="btn btn-success btn-block">Add card</button> --}}
                          <button class="btn btn-primary btn-lg btn-success" type="submit">Pay ($100)</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                    <div class="px-5 mt-5">
                      <div class="inputbox">
                        <input type="text" name="name" class="form-control" required="required">
                        <span>Paypal Email Address</span>
                      </div>
                      <div class="pay px-5">
                        <button class="btn btn-primary btn-block" >Make Payment</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form  = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>