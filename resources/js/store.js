import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex)
const state = {
    cart: {
      items: [],
    },
    braintreeCustomerId: null,
  };

  const getters = {
    cartItems: (state) =>
      state.cart.items.length > 0 ? state.cart.items : JSON.parse(localStorage.getItem('cart')) || [],
    cartTotal: (state) =>
      (state.cart.items.length > 0 ? state.cart.items : JSON.parse(localStorage.getItem('cart')) || []).reduce(
        (total, item) => total + item.quantity * item.price,
        0
      ),
    cartQuantity: (state) =>
      (state.cart.items.length > 0 ? state.cart.items : JSON.parse(localStorage.getItem('cart')) || []).reduce(
        (total, item) => total + item.quantity,
        0
      ),
  };

  const actions = {
    addToCart({ state, commit }, payload) {
        const item = state.cart.items.find((item) => item.id === payload.id);
        const restaurant_id = payload.user_id;
        if (state.cart.items.length > 0) {
            const cart_restaurant_id = state.cart.items[0].restaurant_id;
            if (cart_restaurant_id != restaurant_id) {
                alert('Mi dispiace, non puoi aggiungere al carrello i piatti da più ristoranti');
                return;
            }
        }

        if (!item) {
            commit("ADD_ITEM", payload);
        } else {
            commit("INCREMENT_ITEM_QUANTITY", item);
        }

    },

    removeFromCart({ commit }, payload) {
      commit("REMOVE_ITEM", payload);
    },

    incrementItemQuantity({ commit }, payload) {
      commit("INCREMENT_ITEM_QUANTITY", payload);
    },

    decrementItemQuantity({ commit }, payload) {
      commit("DECREMENT_ITEM_QUANTITY", payload);
    },

    clearCart({ commit }) {
        localStorage.removeItem('cart');
        commit("CLEAR_CART");
    },
    async createOrder({ state, commit }, payload) {
        try {
          const response = await axios.post("/api/orders", payload);
          localStorage.removeItem('cart');
          commit("CLEAR_CART");
          return response.data;
        } catch (error) {
          console.error(error);
          throw error;
        }
      },
      beforeUnload({ state }) {
        window.addEventListener('beforeunload', () => {
          localStorage.setItem('cart', JSON.stringify(state.cart.items));
        });
      },
      async generateBraintreeToken({ commit }) {
        try {
          const response = await axios.get('/api/braintree/token');
          return response.data;
        } catch (error) {
          console.error(error);
          throw error;
        }
      },
      async processPayment({ state }, payload) {
        try {
          const response = await axios.post('/api/braintree/payment', {
            nonce: payload.nonce,
            amount: payload.amount,
            customerId: state.braintreeCustomerId,
          });
          return response.data.success;
        } catch (error) {
          console.error(error);
          throw error;
        }
      },
  };

  const mutations = {
    ADD_ITEM(state, payload) {
      state.cart.items.push({
        id: payload.id,
        name: payload.name,
        price: payload.price,
        restaurant_id: payload.user_id,
        quantity: 1,
      });
    },

    REMOVE_ITEM(state, payload) {
        localStorage.removeItem('cart');
        state.cart.items = state.cart.items.filter((item) => item !== payload);
      },

    INCREMENT_ITEM_QUANTITY(state, payload) {
      payload.quantity++;
    },

    DECREMENT_ITEM_QUANTITY(state, payload) {
      if (payload.quantity > 1) {
        payload.quantity--;
      }
    },

    CLEAR_CART(state) {
        localStorage.removeItem('cart');
        state.cart.items = [];
    },
    SET_BRAINTREE_CUSTOMER_ID(state, payload) {
        state.braintreeCustomerId = payload;
    },
  };

  export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations
});
