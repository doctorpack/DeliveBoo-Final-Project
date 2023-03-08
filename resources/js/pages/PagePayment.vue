<template>
  <div class="container my-5">
    <div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <img src="img/deliveboo_full.svg" alt="" class="logo">
        </div>
        <div class="card-body">
          <div class="total">Totale da pagare: {{ cartTotal/100 }} €</div>
          <form @submit.prevent="handleSubmit">
            <div class="form-group">
              <label for="customer_name">Nome</label>
              <input type="text" id="customer_name" v-model="customer_name" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" v-model="email" required>
            </div>
            <div class="form-group">
              <label for="address">Indirizzo di consegna</label>
              <input type="text" id="address" v-model="address" required>
            </div>
            <div id="card-element" :class="{ 'has-errors': cardErrors }">
              <div class="form-group">
                <label for="card-number">Card number</label>
                <div id="card-number" class="form-control"></div>
              </div>
              <div class="form-group">
                <label for="card-expiry">Expiration date</label>
                <div id="card-expiry" class="form-control"></div>
              </div>
              <div class="form-group">
                <label for="card-cvc">CVC</label>
                <div id="card-cvc" class="form-control"></div>
              </div>
              <div class="form-group">
                <label for="card-postal-code">Postal code</label>
                <div id="card-postal-code" class="form-control"></div>
              </div>
              <div class="form-group">
                <span class="card-errors" v-if="cardErrors">{{ cardErrors }}</span>
              </div>
              <span :class="processing ? 'd-flex' : 'd-none'" class="loading-spinner"></span>
            </div>
            <button type="submit" :disabled="processing" class="btn btn-primary">Paga ora</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="background" :class="popupVisibility ? 'd-flex' : 'd-none'">
                <div class="popup">
                    <h5 class="w-100 text-center mb-3">Ordine Completato</h5>
                    <form>
                        <router-link :to="{ name: 'order' }">
                            <button type="submit" class="btn btn-success">Vedi ordine</button>
                        </router-link>
                    </form>
                    <router-link :to="{ name: 'home' }">
                        <button class="btn btn-secondary">Torna alla Home</button>
                    </router-link>
                </div>
            </div>
  </div>
</template>

<script>
export default{
    data() {
        return {
            customer_name: "",
            email: "",
            address: "",
            cart: this.$route.params.cart,
            cartTotal: this.$store.getters.cartTotal,
            popupVisibility: false,
            stripe: null,
            card: null,
            cardErrors: null,
            paymentSucceeded: false,
            paymentError: null,
            processing: false,
        }
    },
    methods: {
        createOrder() {
            const payload = {
                customer_name: this.customer_name,
                email: this.email,
                address: this.address,
                cart: this.cart,
            };
            this.$store.dispatch("createOrder", payload)
                .then(() => {
                    this.customer_name = "";
                    this.email = "";
                    this.address = "";
                    this.popupVisibility = true;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        async handleSubmit() {
            try {
                this.processing = true;

                const { paymentMethod, error } = await this.stripe.createPaymentMethod({
                    type: 'card',
                    card: this.card,
                });

                if (error) {
                    this.paymentError = error.message;
                    this.processing = false;
                    return;
                }

                // Richiedi al server di creare un'istanza di pagamento
                const response = await axios.post('/api/payment', {
                    amount: this.$store.getters.cartTotal,
                    currency: 'EUR',
                    payment_method: paymentMethod.id
                });
                console.log(response)
                const clientSecret = response.data.clientSecret;

                // Conferma l'intento di pagamento
                const { paymentIntent } = await this.stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: this.card,
                        billing_details: {
                            name: this.customer_name,
                            email: this.email
                        }
                    }
                });

                if (paymentIntent.status === 'succeeded') {
                    console.log(paymentIntent)
                    this.paymentSucceeded = true;
                    this.createOrder();
                    this.processing = false;
                } else {
                    this.paymentError = 'Il pagamento non è andato a buon fine. Riprova.';
                    console.log(this.paymentError)
                    this.processing = false;
                }
            } catch (error) {
                console.error(error);
                this.paymentError = 'Errore durante l\'elaborazione del pagamento. Riprova più tardi.';
                this.processing = false;
            }
},
    },
    mounted() {
        this.stripe = window.Stripe('pk_test_51MgU1OI0cwEBFrNvakyDBs96H0O0GHuzQOmRKNHWVQNP3GmqUtqvqMNiny7qG0kvxTSI3Iwyee3gMX0XKXsEm1go00CoGXINkY', {
            locale: 'auto'
        });
        this.card = this.stripe.elements().create('card', {
            style: {
                base: {
                    color: '#32325d',
                    fontFamily: 'Arial, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#a0aec0'
                    },
                },
                invalid: {
                    color: '#ff0000',
                    iconColor: '#ff0000'
                }
            }
        });
        this.card.mount('#card-element');

        this.card.addEventListener('change', (event) => {
            if (event.error) {
                this.cardErrors = event.error.message;
            } else {
                this.cardErrors = null;
            }
        });
    },
}
</script>

<style lang="scss" scoped>
#card-element{
    margin: 1rem auto;
}

#card-element--invalid {
  border-color: #fa755a;
}
.card {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
}

.card-header {
  background-color: #fff;
  padding: 20px;
  display: flex;
  justify-content: flex-end;
}

.logo {
  max-width: 200px;
}

.card-body {
  padding: 40px;

  .total {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 20px;

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 10px;
    }

    input,
    #card-number,
    #card-expiry,
    #card-cvc,
    #card-postal-code {
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 10px;
      width: 100%;
      font-size: 16px;
    }

    #card-element.has-errors {
      border-color: red;
    }

    .card-errors {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }

    .loading-spinner {
      display: block;
      border: 2px solid #ccc;
      border-top-color: #000;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      animation: spin 0.8s infinite linear;
      margin-left: 10px;
      z-index: 9999999;
    }
  }

  button[type="submit"] {
    background-color: #5cb85c;
    border-color: #5cb85c;
    color: #fff;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;

    &:hover {
      background-color: #449d44;
      border-color: #398439;
    }
  }
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}
    .background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba($color: #000000, $alpha: .4);
    display: none;
    justify-content: center;
    align-items: center;

    .popup {
        z-index: 999;
        padding: 5rem;
        background-color: whitesmoke;
        border: 2px solid grey;
        border-radius: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
}

</style>
