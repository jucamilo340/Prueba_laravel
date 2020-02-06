<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Product;

class ProductController extends Controller
{
    //list all produts
    public function getAll(){
        $products=Product::all();
        return json_encode($products);
    }
    //create a product
    public function add(Request $request){
        
        $name=$request->input('name');
        $category_id=$request->input('category_id');
        $description=$request->input('description');
        $price=$request->input('price');
        $weight=$request->input('weight');
        $image_1=$request->input('image_1');
        $image_2=$request->input('image_2');
        $image_3=$request->input('image_3');

        $product=new Product();
        $product->name=$name;
        $product->category_id=$category_id;
        $product->description=$description;
        $product->price=$price;
        $product->weight=$weight;
        $product->image_1=null;
        $product->image_2=null;
        $product->image_3=null;

        //up image
        // if($image_1){
        //     $image_1_name=time().$image_1->getClientOriginalName();
        //     Storage::disk('products')->put($image_1_name,File::get($image_1));
        //     $product->image_1=$image_1_name;

        // }
        $product->save();  
        
        return $product;

    }
    //find a product with an id
    public function get($id){
        $product=Product::find($id);
        return $product;
    }
    public function delete($id){
        $product=$this->get($id);
        $product->delete();
        return $product;
      }

}
