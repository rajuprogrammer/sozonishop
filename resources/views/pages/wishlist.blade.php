@extends('layouts.app')
@section('content')

<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="home.html">Home</a></li>
            <li class='active'>Wishlist</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content">
   <div class="container">
      <div class="my-wishlist-page">
         <div class="row">
            <div class="col-md-12 my-wishlist">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th colspan="4" class="heading-title">My Wishlist</th>
                        </tr>
                     </thead>
                     <tbody>

@foreach($cart as $row)

                        <tr>
                           <td class="col-md-2"><img src="{{ asset($row->image_one) }}" alt=""></td>
                           <td class="col-md-7">
                              <div class="product-name"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></div>
                             <!--  <div class="rating">
                                 <i class="fa fa-star rate"></i>
                                 <i class="fa fa-star rate"></i>
                                 <i class="fa fa-star rate"></i>
                                 <i class="fa fa-star rate"></i>
                                 <i class="fa fa-star non-rate"></i>
                                 <span class="review">( 06 Reviews )</span>
                              </div> -->
                              @if($row->discount_price==NULL)
                              <div class="price">
                                 ৳ {{ $row->selling_price }}
                                 
                              </div>
                              @else
                               <div class="price">
                                ৳ {{ $row->discount_price }}
                                 <span>৳ {{ $row->selling_price }}</span>
                              </div>

                              @endif
                           </td>
                           <form action="{{ url('cart/product/add/'.$row->id) }}" method="post">
                            @csrf

                            <input type="hidden" value="1" name="qty">

                           <td class="col-md-2">

                            <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>

                            <!--   <a href="#" class="btn-upper btn btn-primary" id="{{ $row->id }}" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id);">Add to cart</a> -->


                           </td>
                         </form>
                           <td class="col-md-1 close-btn">
                              <a href="{{ url('remove/wishlist/'.$row->id) }}" class=""><i class="fa fa-times"></i></a>
                           </td>
                        </tr>
@endforeach

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- /.row -->


      </div>
       <br>
         <br>

   </div>
   <!-- /.container -->
</div>
<!-- /.body-content -->




<!--product cart add modal-->

<!-- Modal -->
<div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
         <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
      </div>
      <div class="modal-body">
       <div class="row">
          <div class="col-md-4">
              <div class="card" style="width: 16rem;">
              <img src="" class="card-img-top" id="pimage" style="height: 240px;">
              <div class="card-body">
               
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
              <ul class="list-group">
                <li class="list-group-item"> <h5 class="card-title" id="pname"></h5></span></li>
             <li class="list-group-item">Product code: <span id="pcode"> </span></li>
              <li class="list-group-item">Category:  <span id="pcat"> </span></li>
              <li class="list-group-item">SubCategory:  <span id="psubcat"> </span></li>
              <li class="list-group-item">Brand: <span id="pbrand"> </span></li>
              <li class="list-group-item">Stock: <span class="badge " style="background: green; color:white;">Available</span></li>
            </ul>
          </div>
          <div class="col-md-4 ">
              <form action="{{ route('insert.into.cart') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" id="product_id">
                <div class="form-group" id="colordiv">
                  <label for="">Color</label>
                  <select name="color" class="form-control" style="color:red">
                  </select>
                </div>
                 <div class="form-group" id="sizediv" >
                  <label for="exampleInputEmail1">Size</label>
                  <select name="size" class="form-control" id="size" style="color:red">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Quantity</label>
                  <input type="number" class="form-control" value="1" name="qty" style="color:red" min="1">
                </div>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
              </form>
           </div>
         </div>
      </div>  
    </div>
  </div>
</div>

<!--modal end-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script>
  function productview(id){
     $.ajax({
      url: "{{  url('/cart/product/view/') }}/"+id,
      type:"GET",
      dataType:"json",
      success:function(data){
        $('#pname').text(data.product.product_name);
        $('#pimage').attr('src',data.product.image_one);
        $('#pcat').text(data.product.category_name);
        $('#psubcat').text(data.product.subcategory_name);
        $('#pbrand').text(data.product.brand_name);
        $('#pcode').text(data.product.product_code);
        $('#product_id').val(data.product.id);
        var d =$('select[name="size"]').empty();
        $.each(data.size, function(key, value){
         $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
         if(data.size==""){
            $('#sizediv').hide();
         }else{
          $('#sizediv').show();
         }
      });

      var d =$('select[name="color"]').empty();
      $.each(data.color, function(key, value){
        $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
        if(data.color==""){
            $('#colordiv').hide();
         }else{
          $('#colordiv').show();
         }
        
      });
    }

     });  
  }
</script>

@endsection