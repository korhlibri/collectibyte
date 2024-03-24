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
            let unprased_cart = localStorage.getItem("cart");
            let parsed_cart = unprased_cart ? JSON.parse(atob(unprased_cart)) : {};
            let temp_constructor;
            if(parsed_cart[product_id]){
                temp_constructor = {
                    ...parsed_cart[product_id]
                }
                temp_constructor["amount"] = parseInt(temp_constructor["amount"], 10)+ 1;
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
            parsed_cart[product_id] = temp_constructor;
            // console.log(JSON.stringify(parsed_cart));
            localStorage.setItem("cart", btoa(JSON.stringify(parsed_cart)));
            
            document.getElementById(product_id).classList.add('d-inline');
            document.getElementById(product_id).classList.remove('d-none');
            setTimeout(function(){
                document.getElementById(product_id).classList.add('d-none');
                document.getElementById(product_id).classList.remove('d-inline');
            }, 1500);
        },
    },
}).mount('#vue-app-store');