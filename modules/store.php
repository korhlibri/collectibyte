<section id="vue-app-store" class="mt-5 mb-5">
    <div class="container text-light">
        <div class="row ms-auto me-auto">
            <div class="col-md-4 col-12 ms-auto me-auto mb-3">
                <h3 class="mb-4" @click="get_all_products()">Categories</h3>
                <ul class="list-group">
                    <li class="list-group-item bg-light border-dark text-light" v-for="category in categories" @click="get_all_products(category.category)">
                        <h4>{{ category.category }}</h4>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-12 ms-auto me-auto">
                <div class="row">
                    <div class="col-md-6 col-12 mb-3" v-for="product in products">
                        <div class="card border-dark">
                            <div class="card-header bg-lighter">
                                {{ product.category }}<span class="ms-3">${{ product.price }}</span>
                            </div>
                            <div class="card-body bg-light">
                                <h2 class="card-title">{{ product.title }}</h2>
                                <p class="card-text">{{ product.description }}</p>
                                <a @click="add_to_cart(product.id)" class="btn btn-primary">Add to cart</a>
                                <i :id="product.id" class="align-middle h3 bi bi-check d-none"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-12 mb-3">
                        <div class="card border-dark">
                            <div class="card-header bg-lighter">
                                Category
                            </div>
                            <div class="card-body bg-light">
                                <h2 class="card-title">My Item</h2>
                                <p class="card-text">Hello there!</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <div class="card border-dark">
                            <div class="card-header bg-lighter">
                                Category
                            </div>
                            <div class="card-body bg-light">
                                <h2 class="card-title">My Item</h2>
                                <p class="card-text">Hello there!</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <div class="card border-dark">
                            <div class="card-header bg-lighter">
                                Category
                            </div>
                            <div class="card-body bg-light">
                                <h2 class="card-title">My Item</h2>
                                <p class="card-text">Hello there!</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo $ref;?>modules/store.js"></script>