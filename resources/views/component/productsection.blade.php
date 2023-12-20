<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach ($products as $product)
            
       
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="#" class="option1">
                        Add To Cart
                      </a>
                      <a href="{{route('singlepageview',$product->id)}}" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="{{ asset('images') }}/{{ $product->Product_picture }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                    {{ $product->Product_name }}
                   </h5>
                   <h6>
                     {{ $product->Product_price }}$
                   </h6>
                </div>
             </div>
          </div>
          @endforeach

       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
 <!-- end product section -->