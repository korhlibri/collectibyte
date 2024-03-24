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
            this.products = response.data.data;
            console.log(this.products);
        },
        get_all_categories: async function(){
            let response = await axios.get("api/product/categories");
            this.categories = response.data.data;
        },
        add_to_cart: async function(product_id){
            let current_cart = localStorage.getItem("cart");
            let cart = current_cart ? JSON.parse(atob(current_cart)) : {};
            let temp_constructor;
            if(cart[product_id]){
                temp_constructor = {
                    ...cart[product_id]
                }
                temp_constructor["amount"] += 1;
            }else{
                this.products.forEach(function (product){
                    if(product["id"] == product_id){
                        temp_constructor = {
                            "title": product["title"],
                            "price": product["price"],
                            "amount": 1
                        }
                    }
                });
            }
            cart[product_id] = temp_constructor;
            console.log(JSON.stringify(cart));
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