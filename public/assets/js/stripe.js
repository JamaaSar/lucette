// Create a Stripe client.

/// Create a Stripe client.
var stripe = Stripe("pk_live_n0LaokRssntZBh1yxpd4gHHY002YRs4SvH");



// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: "#32325d",
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: "antialiased",
    fontSize: "16px",
    "::placeholder": {
      color: "#aab7c4",
    },
  },
  invalid: {
    color: "#fa755a",
    iconColor: "#fa755a",
  },
};

// Create an instance of the card Element.
var card = elements.create("card", { style: style });

// Add an instance of the card Element into the `card-element` <div>.
card.mount("#card-element");
console.log(card);

//var card_name = document.getElementById('card_name').value;

// Handle real-time validation errors from the card Element.
card.addEventListener("change", function (event) {
  var displayError = document.getElementById("card-errors");
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = "";
  }
});
var cardButton = document.getElementById("card-button");
var loader = document.getElementById("loader");
var p = document.getElementById("p");
var clientSecret = cardButton.dataset.secret;

// Handle form submission.
var form = document.getElementById("payment-form");

form.addEventListener("submit", function (event) {

  event.preventDefault();
  event.stopPropagation();

    loader.style.display = "block";
    p.style.display = 'none';
    stripe
      .createPaymentMethod({
        type: "card",
        card: card,
        billing_details: {
          name: "Lucette",
        },
      })
      .then(function (result) {
        // Handle result.error or result.paymentMethod
                stripeTokenHandler(result.paymentMethod);

      });


  stripe
    .confirmCardPayment(clientSecret, {
      payment_method: {
        card: card,
        billing_details: {
          name: "Lucette",
        },
      },
    })
    .then(function (result) {
      if (result.error) {
        // Show error to your customer (e.g., insufficient funds)
        console.log(result.error.message);
      } else {
        // The payment has been processed!
        if (result.paymentIntent.status === "succeeded") {
          stripeTokenHandlerL(result.paymentIntent.payment_method);

          // Show a success message to your customer
          // There's a risk of the customer closing the window before callback
          // execution. Set up a webhook or plugin to listen for the
          // payment_intent.succeeded event that handles any business critical  setupIntent.payment_method)
          // post-payment actions.
        }
      }
    });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById("payment-form");
  var hiddenInput = document.createElement("input");
  hiddenInput.setAttribute("type", "hidden");
  hiddenInput.setAttribute("name", "stripeToken");
  hiddenInput.setAttribute("value", token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
function stripeTokenHandlerL(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById("payment-form");
  var hiddenInput = document.createElement("input");
  hiddenInput.setAttribute("type", "hidden");
  hiddenInput.setAttribute("name", "methode");
  hiddenInput.setAttribute("value", token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
