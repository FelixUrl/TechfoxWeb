<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Mark;
use App\Models\TypeTechnic;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Delivery;
use App\Models\DeliveryStatus;
use App\Models\Order;
use App\Models\OrderCart;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function CatalogView(Request $request)
    {
        $sort = $request->sort;
        switch ($sort) {
            case "asc":
                $products = Product::orderBy('price', $request->sort ?? 'asc');
                break;
            case "desc":
                $products = Product::orderByDesc('price');
                break;
            case "ascA":
                $products = Product::orderBy('name', 'asc');
                break;
            case "descA":
                $products = Product::orderBy('name', 'desc');
                break;
            case "default":
                $products = Product::orderBy('id');
                break;
            case "new":
                $products = Product::latest('created_at');
                break;
            default:
                $products = Product::orderBy('id');
        }
        $marks = Mark::all();
        $products = $products->paginate(9);
        return view('catalog.catalog', compact('products', 'marks'));
    }

    public function getCatalog(Request $request)
    {

        $sort = $request->sort;
        switch ($sort) {
            case "asc":
                $products = Product::orderBy('price', $request->sort ?? 'asc');
                break;
            case "desc":
                $products = Product::orderByDesc('price');
                break;
            case "ascA":
                $products = Product::orderBy('name', 'asc');
                break;
            case "descA":
                $products = Product::orderBy('name', 'desc');
                break;
            case "default":
                $products = Product::orderBy('id');
                break;
            case "new":
                $products = Product::latest('created_at');
                break;
            default:
                $products = Product::orderBy('id');
        }
        $products = $products->paginate(9);
        return view('catalog.products', compact('products'))->render();
    }

    public function searchCatalog(Request $request)
    {
        return Product::where("name", "LIKE", "%{$request['term']}%")->get();
    }


    public function ProductDetailsView($id)
    {
        $product = Product::where('id', $id)->get();
        return view('catalog.product', compact('product'));
    }

    public function AddInCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $product = Product::where('id', $request->id)->get()[0];
        $marka = Mark::where('id', $product['mark_id'])->get()[0];

        $data = [
            'id' => $request->id,
            'name' => $product['name'],
            'category_id' => $product['category_id'],
            'qty' => $request->quantity,
            'weight' => $product['weight'],
            'price' => $product['price'],
            'options' => [
                'marka' => $marka['name'],
                'image' => $product['photo'],
                'description' => $product['description'],
            ],
        ];
        Cart::add($data);
        return redirect()->route('Cart');
    }

    public function confirmationView()
    {
        $addresses = Address::all();
        $products = Product::all();
        $carts = Cart::where('user_id', Auth::id())->get();
        $price = 0;
        foreach ($carts as $cart) {
            foreach ($products as $product) {
                if ($product->id == $cart->product_id) {
                    $price += $product->price;
                }
            }
        }
        if (sizeof($carts) > 0) {
            return view('ordersShop.orderConfirmation', compact('addresses', 'products', 'carts', 'price'));
        } else {
            return redirect()->route('Catalog');
        }
    }

    public function CartDetailView()
    {
        return view('ordersShop.orderDetails');
    }

    public function CartDetailPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'creditcardInput' => 'required',
            'ccmonth' => 'required',
            'ccyear' => 'required',
            'cvv' => 'required',
            'sum' => 'required',
        ]);

        $products = [];
        foreach (\Gloudemans\Shoppingcart\Facades\Cart::content() as $product) {
            $data = [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->options->description,
                'count' => $product->qty,
                'photo' => $product->options->image,
                'price' => (double)$product->price,
            ];

            array_push($products, $data);
        }

        $price  = floatval(preg_replace("/[^-0-9\.]/", "", $request->sum));

        \App\Models\Cart::create([
            'products' => $products,
            'user_id' => Auth::id(),
            'status_id' => 1,
            'payment_id' => 2,
            'card' => [
                'number' => "$request->creditcardInput",
                'cvv' => "$request->cvv",
                'Month' => "$request->ccmonth",
                'Year' => "$request->ccyear",
                'CardHolder' => "$request->name",
            ],
            'price' => $price + ($price * 0.02),
        ]);
        \Gloudemans\Shoppingcart\Facades\Cart::destroy();
        return 'Заказ создан';

        /*$products += json_encode([
            'tax' => $request->tax,
            'servicesum' => $request->servicesum,
            'sum' => $request->sum,
        ]);
        */

    }
}
