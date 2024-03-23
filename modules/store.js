const { createApp, ref, computed } = Vue;

let app = createApp({
    data: function() {
        return {
            products: [],
            categories: [],
        }
    },
    mounted: async function(){
        this.get_all_products();
        this.get_all_categories();
    },
    methods: {
        get_all_products: async function(category){
            let response;
            if (!category){
                response = await axios.get("api/products");
            }else{
                response = await axios.get("api/products", { params: { "category": category } });
            }
            console.log(response.data);
            this.products = response.data.data;
        },
        get_all_categories: async function(){
            let response = await axios.get("api/product/categories");
            this.categories = response.data.data;
        },
        add_to_cart: async function(product_id){
            let current_cart = localStorage.getItem("cart");
            let cart = current_cart ? JSON.parse(atob(current_cart)) : {};
            cart[product_id] = cart[product_id] ? parseInt(cart[product_id]) + 1 : 1;
            localStorage.setItem("cart", btoa(JSON.stringify(cart)));
            
            document.getElementById(product_id).classList.add('d-inline');
            document.getElementById(product_id).classList.remove('d-none');
            setTimeout(function(){
                document.getElementById(product_id).classList.add('d-none');
                document.getElementById(product_id).classList.remove('d-inline');
            }, 1500);
        },
    },
}).mount('#vue-app-store');