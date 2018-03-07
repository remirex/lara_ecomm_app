$(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});


$('.alert').delay(5000).slideUp(300);

// Stripe Javascript

$(function(){
    // Create a Stripe client
    var stripe = Stripe('pk_test_iXBmcR7vauTgSfRnDhAd5ZQL');

// Create an instance of Elements
    var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: 'Roboto, "Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: 'red',
            iconColor: 'red'
        }
    };

// Create an instance of the card Element
    var card = elements.create('card', {style: style, hidePostalCode: true});

// Add an instance of the card Element into the `card-element` <div>
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

// Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        var options = {
            name: document.getElementById('name_on_card').value,
            address_line1: document.getElementById('address').value,
            address_city: document.getElementById('city').value,
            address_state: document.getElementById('province').value,
            address_zip: document.getElementById('postalcode').value
        }

        stripe.createToken(card, options).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    });

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
});


// javascript(axios) for update quantity !!!

$(function(){
    const classname = document.querySelectorAll('.quantity')

    // Nodel list like array
    Array.from(classname).forEach(function(element){
        element.addEventListener('change',function(){
            const id = element.getAttribute('data-id')
            axios.patch('/cart/'+ id , {
                quantity: this.value
            })
                .then(function (response) {
                    //console.log(response);
                    window.location.href = "http://localhost:8000/cart"
                })
                .catch(function (error) {
                    //console.log(error);
                    window.location.href = "http://localhost:8000/cart"
                });
        })
    })
});