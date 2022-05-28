<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Mark;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\TypeTechnic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function AddView()
    {

        $categories = Category::all();
        $mark = Mark::all();
        $type = TypeTechnic::all();
        return view("services", compact('categories', 'mark', 'type'));

    }

    public function MyRequestView()
    {
        $orders = Order::where('phone', Auth::user()->phone)->get();
        $user = User::where('id', Auth::id())->get()[0];
        return view('users.myorders', compact('orders', 'user'));
    }

    public function AddPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'mark_id' => 'required',
            'type_technic_id' => 'required',
            'phoneform' => 'required|regex:/^[-0-9\+]+$/',
        ]);
        Order::create([
            'name' => $request->name,
            'phone' => $request->phoneform,
            'description' => $request->description,
            'type_technic_id' => $request->type_technic_id,
            'mark_id' => $request->mark_id,
            'category_id' => $request->category_id,
            'status_id' => 3,
        ]);
        return (redirect()->route('service'))->withErrors(['msg' => 'Успешно']);
    }

    public function delete(Order $order)
    {
        if (!Auth::user()->isAdmin) {
            if ($order->user_id != Auth::id() || $order->status_id != 3) {
                return redirect()->route('Cabinet');
            }
        }

        return view('orders.delete', compact('order'));
    }

    public function deletePost(Order $order)
    {
        if (Auth::user()->isAdmin) {
            $order->delete();
        } elseif ($order->user_id != Auth::id() || $order->status_id != 3)
            return redirect()->route('Cabinet')->withErrors(['msg' => 'Не имеешь права']);
        $order->delete();
        return redirect()->route('Cabinet');
    }

    public function update(Order $order)
    {
        if (Auth::user()->isAdmin) {
            $categories = Category::all();
            $status = Status::all();
            $orderCategory = Category::find($order->category_id);
            $orderStatus = Status::find($order->status_id);
            return view('orders.update', compact('order', 'categories', 'orderCategory', 'status', 'orderStatus'));

        } elseif ($order->user_id != Auth::id() || $order->status_id != 3)
            return redirect()->route('Cabinet')->withErrors(['msg' => 'Не имеешь права']);

        $categories = Category::all();
        $status = Status::all();
        $orderCategory = Category::find($order->category_id);
        $orderStatus = Status::find($order->status_id);
        return view('orders.update', compact('order', 'categories', 'orderCategory', 'status', 'orderStatus'));
    }

    public function updatePost(Order $order, Request $request)
    {
        $order->name = $request->input('name');
        $order->description = $request->input('description');
        $order->category_id = $request->input('category_id');
        if ($request->photo_new) {

        }
        $order->photo_new = explode('/', $request->file('photo')->store('public'))[1];
        if (Auth::user()->isAdmin) {
            $order->status_id = $request->input('status_id');
        }
        $order->status_id = 3;
        $order->save();

        return redirect()->route('Cabinet');

    }

}
