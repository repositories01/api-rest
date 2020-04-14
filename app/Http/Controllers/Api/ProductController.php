<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(){
         return response()->json($this->product->paginate(10));
    }

    public function show(Product $id){

        $data = ['data' => $id];
        return response()->json($data);
    }

    public function store(Request $request)
    {

        try{
            $productData = $request->all();
            $this->product->create($productData);

            return response()->json(['msg' => 'produto criado'], 201);

        }catch(\Exception $e){
            if(config('app.debug')){
                    return response()->json(ApiError::errorMessage($e->getMessage(), 1010));

            }
        }
    }


}
