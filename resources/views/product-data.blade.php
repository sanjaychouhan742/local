@extends('layouts/app')
@section('content')

<div class="container">
    <h1>Laravel 5.8 Datatables Tutorial <br/> HDTuto.com</h1>
    <table class="table table-bordered datatable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Stock</th>
                <th>Amount</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script type="text/javascript">
	 $(function () {
    
    var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('product_datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'stock', name: 'stock'},
            {data: 'amount', name: 'amount'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection