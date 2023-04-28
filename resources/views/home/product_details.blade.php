@include('components.css')

<div class="hero_area">
         <!-- header section strats -->
       @include('home.header')
        

       <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Our <span>products</span>
              </h2>
           </div>
           <div class="row d-flex justify-content-center">
            
            <div class="col-sm-6 col-md-4 col-lg-4">
              {{-- <div class="box"> --}}
                 <div class="option_container">
                    <div class="options">
                       <a href="" class="option1">
                       Men's Shirt
                       </a>
                       <a href="" class="option2">
                       Buy Now
                       </a>
                    </div>
                 </div>
                 <div class="img">
                    <img src="{{asset('product_img/'.$product->image.'')}}" alt="" style="max-width: 400px;">
                 </div>
                 <div class="detail-box">
                    <h5>
                      {{$product->title}}
                    </h5>
                    <h6>
                       price: {{$product->price}}
                    </h6>
                 </div>
              {{-- </div> --}}
              <h6>product category: {{$product->category}}</h6>
              <h6>product description: {{$product->description}}</h6>
              <h6>product quantity: {{$product->quantity}}</h6>
           </div>

          
            {{-- make pagainaton --}}
            
           </div>
           {{-- {!!$products->withQueryString()->links('pagination::bootstrap-4')!!} --}}
           {{-- <div class="btn-box">
              <a href="">
              View All products
              </a>
           </div> --}}
        </div>
     </section>




     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
   @include('components.js')