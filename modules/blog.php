<section id="vue-app-blog" class="mt-5 mb-5">
    <div class="container text-light">
        <div class="row ms-auto me-auto">
            <div class="col-md-4 col-12 ms-auto me-auto mb-3">
                <h3 class="mb-4" @click="get_all_articles()">Categories</h3>
                <ul class="list-group">
                    <li class="list-group-item bg-light border-dark text-light" v-for="category in categories" @click="get_all_articles(category.category)">
                        <h4>{{ category.category }}</h4>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-12 ms-auto me-auto">
                <div class="row" v-for="article in articles">
                    <div class="col-12 mb-3">
                        <div class="card border-dark">
                            <div class="card-header bg-lighter">
                                {{ article.category }}
                            </div>
                            <div class="card-body bg-light">
                                <h2 class="card-title">{{ article.title }}</h2>
                                <p class="card-text">{{ article.description }}</p>
                                <a href="#" class="btn btn-primary">Full Article</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card border-dark">
                            <div class="card-header bg-lighter">
                                Category
                            </div>
                            <div class="card-body bg-light">
                                <h2 class="card-title">My Article</h2>
                                <p class="card-text">Hello there!</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<script src="<?php echo $ref;?>modules/blog.js"></script>