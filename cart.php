<?php include('layouts/header.php'); ?>



<!--Cart-->
<section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr>
    </div>

    <table class="mt-5 pt-5">
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    <tr>
        <td>
            <div class="product-info">
                <img src="assets/imgs/cover1.jpg"/>
                <div>
                    <p>White Shoes</p>
                    <small><span>Php:</span>199.00</small>
                    <br>
                    <a class="remove-btn" href="#">Remove</a>
                </div>
            </div>
        </td>

        <td>
            <input type="number" value="1">
            <a class="edit-btn" href="#">Edit</a>
        </td>

        <td>
            <span>Php</span>
            <span class="product-price">199.00</span>
        </td>
    </tr>
        <tr>
        <td>
            <div class="product-info">
                <img src="assets/imgs/cover1.jpg"/>
                <div>
                    <p>White Shoes</p>
                    <small><span>Php:</span>199.00</small>
                    <br>
                    <a class="remove-btn" href="#">Remove</a>
                </div>
            </div>
        </td>

        <td>
            <input type="number" value="1">
            <a class="edit-btn" href="#">Edit</a>
        </td>

        <td>
            <span>Php</span>
            <span class="product-price">199.00</span>
        </td>
    </tr>
        <tr>
        <td>
            <div class="product-info">
                <img src="assets/imgs/cover1.jpg"/>
                <div>
                    <p>White Shoes</p>
                    <small><span>Php:</span>199.00</small>
                    <br>
                    <a class="remove-btn" href="#">Remove</a>
                </div>
            </div>
        </td>

        <td>
            <input type="number" value="1">
            <a class="edit-btn" href="#">Edit</a>
        </td>

        <td>
            <span>Php</span>
            <span class="product-price">199.00</span>
        </td>
    </tr>
    </table>

    <div class="cart-total">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>Php 199.00</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>Php 199.00</td>
            </tr>
        </table>
    </div>

    <div class="checkout-container">
        <button class="btn checkout-btn">Checkout</button>
    </div>
</section>







 <?php include('layouts/footer.php');?>