<!DOCTYPE html>
<html>
   <head>
  
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{asset('css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>


@include('layout.header')

@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div> 
@endif
  
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-6">
      <img src="{{ asset('images/' . $products->Product_picture) }}" class="img-fluid" alt="Product Image">
    </div>
    <div class="col-lg-6">
      <h2>{{ $products->Product_name }}</h2>
     
      <p><strong>Price:</strong> ${{ $products->Product_price }}</p>
      <p><strong>Availability:</strong> In stock</p>
     <!-- Form for adding product to cart -->
<form action="{{route('add.Cart') }}" method="POST" >
  @csrf
  <input type="hidden" name="product_id" value="{{ $products->id }}">
  <input type="hidden" name="price" value="{{ $products->Product_price}}">
  <input type="number" name="quantity" value="1" min="1">
  <button class="btn btn-info" type="submit" >Add to Cart</button>
</form>

    </div>
  </div>
</div>



@include('layout.footer')

          <!-- jQery -->
          <script src="{{asset('js/jquery-3.4.1.min.js') }}"></script>
          <!-- popper js -->
          <script src="{{asset('js/popper.min.js')}}"></script>
          <!-- bootstrap js -->
          <script src="{{asset('js/bootstrap.js')}}"></script>
          <!-- custom js -->
          <script src="{{asset('js/custom.js') }}"></script>
       </body>
    </html>

