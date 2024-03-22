const { createApp, ref, computed } = Vue;

let app = createApp({
    data: function() {
        return {
            products: [],
        }
    },
    mounted: async function(){
        this.get_all_products();
    },
    methods: {
        get_all_products: async function(){
            let response = await axios.get("api/products");
            this.products = response.data.data;
            console.log(this.products);
        },
    },
}).mount('#vue-app-store');