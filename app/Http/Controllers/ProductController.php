<?php


namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        Product::create($request->all());


        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
    public function show($id)
    {
        $product = Product::find(Crypt::decrypt($id));
        return view('products.show',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find(Crypt::decrypt($id));
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required'
        ]);
        $product = Product::where('id',Crypt::decrypt($id))
        ->update([
          'name'=>$request->input('name'),
          'detail'=>$request->input('detail')
        ]);
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    public function destroy($id)
    {
        Product::find(Crypt::decrypt($id))->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
