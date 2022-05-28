<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CategoriesProducts;
use App\Models\Category;
use App\Models\Mark;
use App\Models\Occupation;
use App\Models\Order;
use App\Models\Product;
use App\Models\StatusesProduct;
use App\Models\StatusesProducts;
use App\Models\TypeTechnic;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class AdminController extends Controller
{
    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function Panel()
    {
        if (Auth::user()) {
            $user = User::where('id', Auth::id())->first();
            $occupations = Occupation::all();
            $users = User::all();
            $products = Product::all();
            $orders = Order::all();
            $carts = Cart::all();
            return view("admin.panel", compact('user', 'users', 'orders', 'products', 'occupations', 'carts'));
        } else {
            return back()->withErrors(['msg' => 'Нет авторизации']);
        }
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function createProductView()
    {
        if (Auth::user()) {
            $categories = CategoriesProducts::get();
            $marks = Mark::get();
            $type_technic = TypeTechnic::get();
            $user = User::where('id', Auth::id())->first();
            return view('admin.createProduct', compact('categories', 'user', 'marks', 'type_technic'));
        } else {
            return back()->withErrors(['msg' => 'Нет авторизации']);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function createProductPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'weight' => 'required|regex:/([0-9])/',
            'price' => 'required|regex:/([0-9])/',
            'photo' => 'required|file|mimes:png,jpeg,jpg,bmp,gif|max:20480',
        ]);
        $name_photo = explode('/', $request->file('photo')->store('public'))[1];
        $data = ['photo' => $name_photo];
        $data += $request->only('name', 'description', 'weight', 'price', 'category_id', 'mark_id', 'type_technic_id');
        Product::create($data);

        return redirect()->route('AdminControlProducts');

    }

    /**
     * @return Application|Factory|View
     */
    public function OrderView()
    {
        $products = Product::all();
        $cart = Cart::paginate();
        $status = StatusesProducts::all();
        $user = User::where('id', Auth::id())->first();

        return view('admin.AdminControlOrders', compact('products', 'cart', 'status', 'user'))->with('i', (request()->input('page', 1) - 1) * $cart->perPage());
    }

    public function filterAdminOrderStatus(Request $request)
    {
        $products = Product::all();
        $cart = Cart::where('status_id', $request->status)->get();
        $status = StatusesProducts::all();
        $user = User::where('id', Auth::id())->first();

        return view('admin.adminOrdersRender', compact('products', 'cart', 'status', 'user'))->render();
    }

    public function filterAdminUserStatus(Request $request)
    {
        $users = User::all();
        if ($request->status == 'ban') {
            $users = User::where('ban', true)->get();
        }
        if ($request->status == 'admin'){
            $users = User::where('isAdmin', true)->get();
        }
        return view('admin.adminUsersRender', compact('users'));
    }

    public function filterAdminRequestStatus(Request $request)
    {
        $orders = Order::all();
        if ($request->status == 'wait') {
            $orders = Order::where('status_id', 2)->get();
        }
        if ($request->status == 'finish'){
            $orders = Order::where('status_id', 1)->get();
        }
        if ($request->status == 'new'){
            $orders = Order::where('status_id', 3)->get();
        }
        return view('admin.adminRequestsRender', compact('orders'));
    }
    /**
     * @return Application|Factory|View
     */
    public function RequestView()
    {
        $user = User::where('id', Auth::id())->first();
        $orders = Order::paginate();
        return view('admin.AdminControlRequest', compact('orders', 'user'))->with('i', (request()->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * @param Request $request
     */
    public function OrderViewStatusPost(Request $request)
    {
        $product = Cart::where('id', $request->id)->first();
        $product->status_id = $request->status;
        $product->save();
    }

    /**
     * @return Application|Factory|View
     */
    public function UsersView()
    {
        $users = User::paginate();
        $user = User::where('id', Auth::id())->first();
        return view('admin.AdminControlUser', compact('users', 'user'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * @return Application|Factory|View
     */
    public function ProductsView()
    {
        $products = Product::paginate();;
        $user = User::where('id', Auth::id())->first();
        return view('admin.AdminControlProducts', compact('products', 'user'))->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * @param Product $product
     * @return Application|Factory|View
     */
    public function EditProduct(Product $product)
    {
        $_product = Product::where('id', $product->id)->first();
        $categories = Category::all();
        $user = User::where('id', Auth::id())->first();
        return view('admin.editProduct', compact('_product', 'categories', 'user'));
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return RedirectResponse
     */
    public function EditProductPost(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'weight' => 'required|regex:/([0-9])/',
            'price' => 'required|regex:/([0-9])/',
        ]);
        if ($request->delete == "on") {
            $product->delete();

            return redirect()->route('Panel')->withErrors(['msg' => 'Успешно удалено']);
        } else {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->weight = $request->weight;
            $product->price = $request->price;
            $name_photo = explode('/', $request->file('photo')->store('public'))[1];
            $product->photo = $name_photo;
            $product->save();

            return redirect()->route('Panel')->withErrors(['msg' => 'Изменения внесены']);
        }
    }

    public function actionAjaxBanUser(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $code = '';
        if ($user->ban == 0) {
            $user->ban = true;
            $code = 'бан';
        } elseif ($user->ban == 1) {
            $user->ban = false;
            $code = 'разбан';
        }
        $user->save();
        return 'Данные изменены, пользователь получил ' . $code;
    }
}
