<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div> 
    @endif
   
    <div class="container mt-5 p-2 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Continue Shopping</span></div>
                    <hr>
                    <h6 class="mb-0">Shopping cart</h6>
                    <div class="d-flex justify-content-between"><span>You have 4 items in your cart</span>
                        <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort by:</span>
                            <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i></div>
                        </div>
                    </div>
                    <div>
                        @php
                        $totalPrice = 0; // Initialize total price variable
                        @endphp
                    </div>
                  
                       @foreach ($cartitems as $item )
                       
                    <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                        <div class="d-flex flex-row"><img class="rounded" src="{{ asset('images')}}/{{$item->product_picture}}" width="40">
                            <div class="ml-2"><span class="font-weight-bold d-block">{{ $item->product_name}}</span><span class="spec"></span></div>
                        </div>
                        <div class="d-flex flex-row align-items-center"><span class="d-block">
                            <form action="{{route('cart.update')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{$item->id}}">
                            <input type="number"  class="form-control" min="1" value="{{$item->quantity}}" name="quantity">
                            <button type="submit" name="update" class="btn btn-outline-warning">Update</button>

                             </form>
                          
                        </span><span class="d-block ml-5 font-weight-bold">{{$item->price*$item->quantity}}</span><i class="fa fa-trash-o ml-3 text-black-50"><a href="{{route('product.delete',$item->id)}}">×</a></i></div>

                    </div>

                    @php
                    // Calculate subtotal for each item and add to the total price
                    $subtotal = $item->price * $item->quantity;
                    $totalPrice += $subtotal;
                    @endphp
                    @endforeach
                                <!-- Display the total price -->
            <div class="mt-3 font-weight-bold">
                Total Price: ${{ $totalPrice }}
            </div>
                  

                  
                 
                 
                </div>
            </div>
            <div class="col-md-4">
                <div class="payment-info">
                    <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div><span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span> </label>

<label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png"/></span> </label>

<label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span> </label>


<label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png"/></span> </label>
                    <div><label class="credit-card-label">Name on card</label><input type="text" class="form-control credit-inputs" placeholder="Name"></div>
                    <div><label class="credit-card-label">Card number</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                    <div class="row">
                        <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text" class="form-control credit-inputs" placeholder="12/24"></div>
                        <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="342"></div>
                    </div>
                    <hr class="line">
                    <div class="d-flex justify-content-between information"><span>Subtotal</span><span>{{ $totalPrice }}</span></div>
                    <div class="d-flex justify-content-between information"><span>Shipping</span><span>$20.00</span></div>
                    <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span>$3020.00</span></div><button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button"><span>$3020.00</span><span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span></button></div>
            </div>
        </div>
    </div>


    {{-- @foreach ($cartitems as $item )
    <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
        <div class="d-flex flex-row"><img class="rounded" src="https://i.imgur.com/QRwjbm5.jpg" width="40">
            <div class="ml-2"><span class="font-weight-bold d-block">{{ $item->product_name}}</span><span class="spec">256GB, Navy Blue</span></div>
        </div>
        <div class="d-flex flex-row align-items-center"><span class="d-block">{{ $item->quantity}}</span><span class="d-block ml-5 font-weight-bold">${{ $item->product_price}}</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
    </div>
  
        
    </div>
</div>
</div> --}}

</body>
</html>










