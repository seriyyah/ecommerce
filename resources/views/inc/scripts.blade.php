<!-- jquery latest version -->
<script src="/js/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="/js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="/js/plugins.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<!-- Waypoints.min.js. -->
<script src="/js/waypoints.min.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="/js/main.js"></script>


{{--  stripe js scripts start --}}

<script>
// Create a Stripe client.
var stripe = Stripe('pk_test_iZ8xI4JWkGzbZA8IRcSNAL2S00FJQIjwVQ');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();


//   passing name of card holder as seperate function if you whant you can remove it it is no nesesery but recommended by stripe


    //
    var options = {
        name: document.getElementById('name').value,
        address_line1: document.getElementById('address').value,
        adress_city: document.getElementById('city').value,
        address_state: document.getElementById('province').value,
        address_zip: document.getElementById('postalcode').value
    }
    //


  stripe.createToken(card,options).then(function(result) {  // passing the var options here so if you remove the tap option part dont forget to clean up here as well
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
{{--  stripe js scripts end --}}

{{-- product quantity update in cart start --}}
<script src="{{ asset('js/app.js') }}"></script>
<script>
    (function(){
        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function (element) {
            element.addEventListener('change', function () {
                const id = element.getAttribute('data-id')
                axios.patch(`/cart/${id}`,{
                    quantity:this.value
                })
                .then(function(response){
                    // console.log(response);
                    window.location.href ='{{ route('cart.home') }}'
                })
                .catch(function(error){
                    console.log(error);
                });
             })
         })
    })();
</script>

{{-- product quantity update in cart end --}}
