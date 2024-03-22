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
    },
}).mount('#vue-app-store');