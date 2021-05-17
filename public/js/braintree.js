const plans = document.getElementsByName('sponsor');
const paymentForm = document.querySelector('#dropin-container');
const submitButtonContainer = document.querySelector('.container-button-pay');
const submitButton = document.querySelector('#submit-payment-button');
const form = document.querySelector('#make-payment');
const nonceInput = document.querySelector('#nonce');

plans.forEach(plan => {
    plan.addEventListener('click', function () {
        if (paymentForm) {
            paymentForm.style.display = 'block';
            submitButtonContainer.style.display = 'flex';
        }
    });
});

if (submitButton) {
    braintree.dropin.create({
        authorization: "sandbox_x6mvdvj5_r7czy6mhvckbb4v2",
        container: paymentForm,
        locale: 'it_IT',
        card: {
            overrides: {
                styles: {
                    input: {
                        color: 'blue',
                        'font-size': '18px'
                    },
                    '.number': {
                        'font-family': 'monospace'
                    },
                    '.invalid': {
                        color: 'red'
                    }
                }
            }
        }
    }, function (createErr, dropinInstance) {
        if (createErr) {
            return;
        }

        submitButton.addEventListener('click', function () {
            event.preventDefault();

            dropinInstance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
                if (requestPaymentMethodErr) {
                    return;
                }

                nonceInput.value = payload.nonce;

                submitButton.addEventListener('click', function () {
                    form.submit();
                });
            });
        });
    });
}