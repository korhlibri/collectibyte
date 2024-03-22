const { createApp, ref, computed } = Vue;

let app = createApp({
    data: function() {
        return {
            articles: [],
        }
    },
    mounted: async function(){
        this.get_all_articles();
    },
    methods: {
        get_all_articles: async function(){
            let response = await axios.get("api/articles");
            this.articles = response.data.data;
            // console.log(this.articles);
        },
    },
}).mount('#vue-app-blog');