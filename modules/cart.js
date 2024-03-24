const { createApp, ref, computed } = Vue;

let app = createApp({
    data: function() {
        return {
            cart: []
        }
    },
    mounted: async function(){
        this.retrieve_cart()
    },
    methods: {
        retrieve_cart: async function(){
            let current_cart = localStorage.getItem("cart");
            current_cart = current_cart ? JSON.parse(atob(current_cart)) : {};
            
        },
        add_to_cart: async function(product_id, amount){
            let current_cart = localStorage.getItem("cart");
            current_cart = current_cart ? JSON.parse(atob(current_cart)) : {};
            current_cart[product_id] = current_cart[product_id] ? parseInt(current_cart[product_id]) + amount : amount;
            localStorage.setItem("cart", btoa(JSON.stringify(current_cart)));
        },
    },
}).mount('#vue-app-cart');