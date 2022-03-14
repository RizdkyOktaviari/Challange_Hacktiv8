<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class ProductController extends BaseController
{
    public function store(Request $Request){
        $validator = Validator::make($Request->all(), [
            'name' => 'required|string|max:50',
            'price' => 'required|integer',
            'description' => 'required|string|max:200',
            // 'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $success = Product::create([
            'nama' => $Request->name,
            'price' => $Request->price,
            'description' => $Request->description,
        ]);
        return $this->sendResponse($success, 'Product register successfully.');
    }

    public function index()
    {
        $users = Product::all();
        return $this->sendResponse($users, 'Product fetch successfully.');
    }

    public function find($id)
    {
        $users = Product::find($id);
        return $this->sendResponse($users, 'Product fetch successfully.');
    }

    public function update(Request $Request,$id)
    {
        $users = Product::find($id);
        $validator = Validator::make($Request->all(), [
            'name' => 'required|string|max:50',
            'price' => 'required|integer',
            'description' => 'required|string|max:200',
            // 'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        Product::where('id', $id)->update([
            'nama' => $Request->name,
            'price' => $Request->price,
            'description' => $Request->description,
        ]);
        return $this->sendResponse($users, 'Product update successfully.');
    }

    public function delete($id){

        $product = Product::find($id);
        $product->delete();
        return $this->sendResponse($product, 'Product delete successfully.');


    }
}
