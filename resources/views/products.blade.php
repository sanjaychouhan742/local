@extends('layouts.app')
@include('editproducts')  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Manage Product</div>
  
                <div class="card-body">
                      
                    <a href="{{ route('create_step_one') }}" class="btn btn-primary pull-right">Create Product</a>
  
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->amount}}</td>
                                <td>{{$product->status ? 'Active' : 'DeActive'}}</td>
<td>

<a onclick="editfunction('{{$product->id}}','{{$product->name}}','{{$product->description}}','{{$product->stock}}','{{$product->amount}}','{{$product->status}}')" href="#">edit</a>
 <a onclick="deleteProduct('{{$product->id}}')" href="#">delete</a>
</td>
 </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    function editfunction(id,name,description,stock,amount,status){
 $('#product_id').val(id);
 $('#name').val(name);
 $('#description').val(description);
 $('#stock').val(stock);
 $('#amount').val(amount);
 $('#status').val(status);
if(status == 0) {
$("#radio_false").prop("checked", true);
} 
else{
   $("#radio_true").prop("checked", true); 
}

 $('#modaledit').modal('toggle');
}


function deleteProduct(id){

swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover Product item details!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({

            url : "{{ url('/deleteProduct')}}",

            type: "POST",

            data : 
            {
            "id":id,
            "_token":"{{csrf_token()}}",

          },

            

            success: function(data){
              swal("Poof! Your product has been deleted!", {
      icon: "success",
    });
               location.reload(true);
               
            },

            });
    
  } else {
    swal("Your product is safe!");
  }
});
}



$(function() {
 
  $("form[name='dataval']").validate({
   
    rules: {
      
      name: "required",
      amount:{
        required: true,
        min: 100
      },
      description: {
        required: true,
       
        minlength: 10
      },
      stock: {
        required: true,
        min: 10
      }
    },

    messages: {
      name: "Please enter product name",
      amount: {
        required:"Please enter product amount",
        min:"Please enter min amount RS 100"

    },
      description: {
        required: "Please fill description box",
        minlength: "Your password must be at least 10 characters long"
      },
      stock:{
       required: "Please enter product Stock",
       min:"Please enter greater than 10 product "
      }, 
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});





</script>
@endsection

