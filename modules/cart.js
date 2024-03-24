const { createApp, ref, computed } = Vue;

let app = createApp({
    data: function() {
        return {
            cart: [],
            total: 0,
            tax: 0.1
        }
    },
    mounted: async function(){
        this.retrieve_cart()
    },
    methods: {
        retrieve_cart: async function(){
            let unparsed_cart = localStorage.getItem("cart");
            let parsed_cart = unparsed_cart ? JSON.parse(atob(unparsed_cart)) : {};
            this.total = 0;
            for(product_id in parsed_cart){
                this.total += parsed_cart[product_id]["price"] * parsed_cart[product_id]["amount"];
            }
            this.cart = parsed_cart;
        },
        add_to_cart: async function(product_id, amount, e){
            if(e){
                amount = e.target.value;
            }
            let unparsed_cart = localStorage.getItem("cart");
            let parsed_cart = unparsed_cart ? JSON.parse(atob(unparsed_cart)) : {};
            parsed_cart[product_id]["amount"] = amount;
            localStorage.setItem("cart", btoa(JSON.stringify(parsed_cart)));

            this.retrieve_cart();
        },
        remove_from_cart: async function(product_id){
            let unparsed_cart = localStorage.getItem("cart");
            let parsed_cart = unparsed_cart ? JSON.parse(atob(unparsed_cart)) : {};
            delete parsed_cart[product_id];
            localStorage.setItem("cart", btoa(JSON.stringify(parsed_cart)));

            this.retrieve_cart();
        },
    },
}).mount('#vue-app-cart');