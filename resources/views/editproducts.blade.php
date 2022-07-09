<div class="modal fade" id="modaledit" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

 <form method="POST" action="{{ url('modalupdate')}}" name="dataval">
  @csrf
  <input type="hidden" name="product_id" id="product_id" value="">
 <div class="form-group">  
<label for="title">Product Name:</label>
<input type="text" class="form-control" id="name"  name="name">
</div>

<div class="form-group">
<label for="description">Product Amount:</label>
<input type="text"   class="form-control" id="amount" name="amount"/>
</div>
   
<div class="form-group">
<label for="description">Product Description:</label>
<textarea type="text"  class="form-control" id="description" name="description"></textarea>
</div>

 <div class="form-group">
<label for="description">Product Status</label><br/>
<label class="radio-inline"><input type="radio" name="status" id="radio_true" value="1"> Active</label>
<label class="radio-inline"><input type="radio" name="status" id="radio_false" value="0"> DeActive</label>
</div>
  
<div class="form-group">
<label for="description">Product Stock</label>
<input type="text"   class="form-control" id="stock" name="stock"/>

</div>




<div class="modal-footer">
        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Update" />
      </div>


 </form>
 </div>
      
      </div>
    </div>
  </div>
</div>

