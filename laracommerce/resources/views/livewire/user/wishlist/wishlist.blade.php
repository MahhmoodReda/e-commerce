<div>
    <div class="cart-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wishlist">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="40%">Product Name</th>
                                    <th width="15%">Unit Price</th>
                                    <th width="15%"></th>
                                    <th width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($wishlists as $wishlist)
                                    <tr>
                                        <td width="45%">
                                            <div class="display-flex align-center">
                                                <div class="img-product">
                                                    <img src="{{ asset('storage/' . $wishlist->product->ProductImage[0]->image) }}"
                                                        alt="" class="mCS_img_loaded">
                                                </div>
                                                <div class="name-product">
                                                    <a class="js-name-detail" href="{{ route('user.productDetails',$wishlist->product_id) }}" class style="text-decoration:none; color:inherit;">{{ $wishlist->product->name }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="15%" class="price">${{ $wishlist->product->selling_price }}</td>
                                        <td width="15%" >
                                            <a href="" wire:click.prevent='deleteFromWishList({{ $wishlist->id }})' class="btn btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </td>
                                        <td width="15%"><a href="" wire:click.prevent='addToCart({{ $wishlist->product_id }})' class="round-black-btn small-btn js-addcart-detail">Add to
                                                Cart</a>
                                        </td>
                                    </tr>
                                @empty
                                <div style="height: 100px">
                                    <tr>
                                        <td width="45%">
                                            <div class="display-flex align-center">
                                                <div class="name-product">
                                                    <span style="text-decoration:none; color:inherit;"><h2>No Products Fpund</h2></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
