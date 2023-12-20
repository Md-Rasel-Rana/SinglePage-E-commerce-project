<?php
namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DemoController extends Controller
{
     public function index(){

      $products=product::all();

        return view('Home',compact('products'));
     }
     public function singlepageview($id){

      $products=product::find($id);
   
        return view('singlepage',compact('products'));
     }

     public function addToCart(Request $request){
    
      $cartItem = new Cart();

      $cartItem->product_id = $request->input('product_id');
      $cartItem->price = $request->input('price');
      $cartItem->quantity = $request->input('quantity');
      $cartItem->save();
  
      return redirect()->back()->with('success', 'Product added to cart successfully!');
  
        
     }

     public function cartToshow(){
     
      $cartitems=DB::table('products')
      ->join('carts','products.id','=','carts.product_id')
      ->select('products.product_name','products.product_picture','products.product_price','carts.*')
      ->get();
   
        return view('cartview',compact('cartitems'));
     }


    public function productDelete(Request $request, $id){
          $productitem=Cart::find($id);
          $productitem->delete();
          return redirect()->back()->with('success','product successfully Delete');
    }
    public function productUpdate(Request $request){
      $cartItem = Cart::findOrFail($request->id);

      // Update the quantity
      $cartItem->update(['quantity' => $request->quantity]);

      return redirect()->back()->with('success', 'Cart quantity updated successfully');
    }













     
    
 }










