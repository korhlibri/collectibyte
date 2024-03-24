<section id="vue-app-cart" class="mt-5 mb-5">
    <div class="container text-light">
        <div class="col-12">
            <div class="row table-responsive">
                <table class="table table-bordered table-dark mt-5">
                    <thead>
                        <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h5>Product1</h5>
                            </td>
                            <td>
                                <h5>$46.00</h5>
                            </td>
                            <td style="max-width: 100px;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-primary">-</i></button>
                                    <input class="form-control" type="number" name="form-quantity" value="1">
                                    <button class="btn btn-primary">+</i></button>
                                </div>
                            </td>
                            <td>
                                <h5>$46.00</h5>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-trash-fill"></i></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center ms-5 me-5 mt-3 mb-5">
                <div class="col-md-6 col-12">
                    <h3>Subtotal: $0.0</h3>
                    <h3>Tax: $0.0</h3>
                    <h3>Total: $0.0</h3>
                </div>
                <div class="col-md-6 col-12">
                    <a href="checkout"><button class="btn btn-primary"><h3>Continue to Checkout</h3></button></a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo $ref;?>modules/cart.js"></script>