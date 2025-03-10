@extends('layouts.public')

@section('css')
@endsection

@section('js')
@endsection

@section('main')
  <div class="page-content">
    <div class="cart">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <table class="table table-cart table-mobile">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td class="product-col">
                    <div class="product">
                      <figure class="product-media">
                        <a href="#">
                          <img src="{{ asset('assets/images/products/table/product-1.jpg') }}" alt="Product image">
                        </a>
                      </figure>

                      <h3 class="product-title">
                        <a href="#">Beige knitted elastic runner shoes</a>
                      </h3>
                    </div>
                  </td>
                  <td class="price-col">$84.00</td>
                  <td class="quantity-col">
                    <div class="cart-product-quantity">
                      <input type="number" class="form-control" value="1" min="1" max="10"
                        step="1" data-decimals="0" required>
                    </div>
                  </td>
                  <td class="total-col">$84.00</td>
                  <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                </tr>
                <tr>
                  <td class="product-col">
                    <div class="product">
                      <figure class="product-media">
                        <a href="#">
                          <img src="{{ asset('assets/images/products/table/product-2.jpg') }}" alt="Product image">
                        </a>
                      </figure>

                      <h3 class="product-title">
                        <a href="#">Blue utility pinafore denim dress</a>
                      </h3>
                    </div>
                  </td>
                  <td class="price-col">$76.00</td>
                  <td class="quantity-col">
                    <div class="cart-product-quantity">
                      <input type="number" class="form-control" value="1" min="1" max="10"
                        step="1" data-decimals="0" required>
                    </div>
                  </td>
                  <td class="total-col">$76.00</td>
                  <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                </tr>
              </tbody>
            </table>

            <div class="cart-bottom">
              <div class="cart-discount">
                <form action="#">
                  <div class="input-group">
                    <input type="text" class="form-control" required placeholder="coupon code">
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary-2" type="submit"><i
                          class="icon-long-arrow-right"></i></button>
                    </div>
                  </div>
                </form>
              </div>

              <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
            </div>
          </div>
          <aside class="col-lg-3">
            <div class="summary summary-cart">
              <h3 class="summary-title">Cart Total</h3>

              <table class="table table-summary">
                <tbody>
                  <tr class="summary-subtotal">
                    <td>Subtotal:</td>
                    <td>$160.00</td>
                  </tr>
                  <tr class="summary-shipping">
                    <td>Shipping:</td>
                    <td>&nbsp;</td>
                  </tr>

                  <tr class="summary-shipping-row">
                    <td>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                        <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                      </div>
                    </td>
                    <td>$0.00</td>
                  </tr>

                  <tr class="summary-shipping-row">
                    <td>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                        <label class="custom-control-label" for="standart-shipping">Standart:</label>
                      </div>
                    </td>
                    <td>$10.00</td>
                  </tr>

                  <tr class="summary-shipping-row">
                    <td>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                        <label class="custom-control-label" for="express-shipping">Express:</label>
                      </div>
                    </td>
                    <td>$20.00</td>
                  </tr>

                  <tr class="summary-shipping-estimate">
                    <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                    <td>&nbsp;</td>
                  </tr>

                  <tr class="summary-total">
                    <td>Total:</td>
                    <td>$160.00</td>
                  </tr>
                </tbody>
              </table>

              <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
            </div>

            <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i
                class="icon-refresh"></i></a>
          </aside>
        </div>
      </div>
    </div>
  </div>
@endsection
