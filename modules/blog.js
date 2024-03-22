const { createApp, ref, computed } = Vue;

let app = createApp({
    data: function() {
        return {
            articles: [],
            categories: [],
        }
    },
    mounted: async function(){
        this.get_all_articles();
        this.get_all_categories();
    },
    methods: {
        get_all_articles: async function(category){
            let response;
            if (!category){
                response = await axios.get("api/articles");
            }else{
                response = await axios.get("api/articles", { params: { "category": category } });
            }
            this.articles = response.data.data;
        },
        get_all_categories: async function(){
            let response = await axios.get("api/article/categories");
            this.categories = response.data.data;
        },
    },
}).mount('#vue-app-blog');