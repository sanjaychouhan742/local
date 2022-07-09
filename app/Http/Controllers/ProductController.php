<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use DataTables;
class ProductController extends Controller
{
   
function products(){

$products = product::all();
return view('products',compact('products'));
}
function create_step_one(Request $req){

$product = $req->session()->get('product');
return view('create-step-one',compact('product'));

}
function create_step_one_post(Request $req){
  $req->validate([
            'name' => 'required|unique:products',
            'amount' => 'required|numeric',
            'description' => 'required',
        ]);

if (empty($req->session()->get('product'))) {
	$product = new product();
	$product->fill([
 'name' => $req->input('name'),
 'amount' => $req->input('amount'),
  'description' => $req->input('description'),
]);
	$req->session()->put('product',$product);
}
else{

	$product = $req->session()->get('product');
	$product->fill([
 'name' => $req->input('name'),
 'amount' => $req->input('amount'),
  'description' => $req->input('description'),
]);
$req->session()->put('product',$product);
}
return redirect()->route('create_step_two');
}

  function create_step_two(Request $req)
    {
        $product = $req->session()->get('product');
  
        return view('create-step-two',compact('product'));
    }
   
 function create_step_two_post(Request $req){

  $req->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);


        $product = $req->session()->get('product');
        
        $product->fill([
 'stock' => $req->input('stock'),
 'status' => $req->input('status'),
 
]);
        $req->session()->put('product', $product);
  
        return redirect()->route('create_step_three');
 }

  function create_step_three(Request $req)
     {
        $product = $req->session()->get('product');
  
        return view('create-step-three',compact('product'));
    }
   
    function create_step_three_post(Request $req){


            $product = $req->session()->get('product');
        $product->save();
  
        $req->session()->forget('product');
  
        return redirect()->route('products');

}

 function modalupdate(Request $req){
  $req->validate([
  'name' => 'required',
  'amount' =>'required|numeric',
  'description' =>'required',
  'stock' => 'required',
  'status' => 'required',
]);

$product = product::where('id',$req->input('product_id'))->update([
'name' => $req->input('name'),
'amount'=>$req->input('amount'),
'description'=>$req->input('description'),
'stock'=>$req->input('stock'),
'status'=>$req->input('status'),


]);
return redirect()->route('products');
 }

 function deleteProduct(Request $req){

$product = product::where('id',$req->input('id'))->delete();

 }

 function product_datatable(Request $req){
      if ($req->ajax()) {
            $data = product::latest()->get();
            return Datatables::of($data)
                    ->editColumn('status', function($data){
          return $data['status']==1 ? 'Active' : 'Deactive';

                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
   return view('product-data');
 }

}
