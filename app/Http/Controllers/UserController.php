<?php

namespace App\Http\Controllers;

use App\Mail\EmailConfirmation;
use App\Mail\EmailContact;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderCart;
use App\Models\OrderShop;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use stdClass;

class UserController extends Controller
{
    public function indexView()
    {
        $orders = Order::where('status_id', '1')->get();

        return view('index', compact('orders'));
    }

    public function UserView()
    {
        $user = User::where('id', Auth::id())->get();

        return view('users.user', compact('user'));
    }

    public function UserPost(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);
        $user = User::where('id', Auth::id())->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('Cabinet')->withErrors(['msg' => 'Успешно']);
    }

    //
    public function registrationView()
    {
        if (Auth::user()) {
            return redirect()->route('Cabinet');
        } else {
            return view("users.reg");
        }
    }

    public function authorizeView()
    {
        if (Auth::user()) {
            return redirect()->route('Cabinet');
        } else {
            return view("users.auth");
        }
    }

    public function Cabinet()
    {
        if (Auth::user()) {
            $user = User::where('id', Auth::id())->get()[0];
            return view("users.cabinet", compact('user'));
        } else {
            return back()->withErrors(['msg' => 'Нет авторизации']);
        }
    }

    public function Orders()
    {
        $user = User::where('id', Auth::id())->get()[0];
        $products = [];
        $cart = Cart::where('user_id', Auth::id())->get();
        foreach ($cart as $item) {
            foreach ($item->products as $product) {
                $elements = Product::where("id", $product['id'])->get();
                array_push($products, $elements);
            }
        }

        return view('users.mycarts', compact('cart', 'products', 'user'));
    }

    public function CartView()
    {
        $products = Product::all();
        $carts = Cart::where('user_id', Auth::id())->get();

        return view('ordersShop.cart', compact('carts', 'products'));
    }


    public function CartDeletePost(Request $request)
    {
        if ($request->order != '1') {
            $request->validate([
                'rowId' => 'required',
            ]);
            \Gloudemans\Shoppingcart\Facades\Cart::remove($request->rowId);

            return redirect()->route('Cart');
        } else {
            if (Auth::user()) {
                return redirect()->route('CartDetail');
            }

            return redirect()->route('Reg')->withErrors(['msg' => 'Вы не в системе']);
        }

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function reg(Request $request)
    {
        $request->validate([
            'email' => "required|email|unique:users",
            'login' => "required|unique:users",
            'phone' => "required|unique:users|regex:/^[-0-9\+]+$/",
            'password' => "required|min:6|confirmed",
        ]);
        if (User::where('email', $request->email)->exists()) {
            return redirect(route('index'))->withErrors(['msg' => 'Такая почта уже занята']);
        }
        $user = User::create($request->all());
        if ($user) {
            if (Auth::attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();
                $data = new stdClass();
                $data->href = route('generateLinkToConfirmMail', ['path' => $user->key, 'id' => $user->id]);
                Mail::to($user->email)->send(new EmailConfirmation($data));
                return redirect()->route('index')
                    ->withErrors(['msg' => 'Подтвердите почту перейдя из письма по ссылке']);
            }

            return redirect(route('index'));
        }

        throw new Exception('Произошла ошибка на стороне сервера');
    }

    /**
     * @throws Exception
     */
    public function confirmMail($id, $path)
    {
        if ($currentUser = User::where('id', $id)->first()) {
            if ($currentUser->email_confirm == 1){
                return redirect(route('index'))->withErrors(['msg' => 'Почта уже была подтверждена']);
            }
            if ($user = User::where('key', $path)->first()) {
                $user->email_confirm = true;
                $user->save();

                return redirect(route('index'))->withErrors(['msg' => 'Почта подтверждена']);
            } else {
                throw new Exception('Произошла ошибка на стороне сервера');
            }
        }
        throw new Exception('Произошла ошибка на стороне сервера');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function auth(Request $request)
    {
        $request->validate([
            'email' => "required|email",
            'password' => "required|min:6",
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return (redirect()->route('Cabinet'));
        }

        return back();

    }

    public function logout()
    {
        Auth::logout();

        return (redirect()->route('index'));
    }

    /**
     * @param Request $request
     * @return string
     */
    public function actionChangePassword(Request $request): string
    {
        $user = User::where('id', Auth::id())->first();
        if (Hash::check($request->currentPassword, $user->password)) {
            $user->password = Hash::make($request->newpassword);
            $user->save();
            $request->session()->regenerate();
            return 'Пароль сменён';
        } else {
            return 'Неверный пароль';
        }
    }

    /**
     * @param Request $request
     * @return string
     */
    public function actionChangeUserInfo(Request $request): string
    {
        $user = User::where('id', Auth::id())->first();
        if ($user->name != $request->name) {
            $user->name = $request->name;
        } elseif ($user->login != $request->login) {
            try {
                $request->validate(['login' => "required|unique:users"]);
            } catch (Exception $ex) {
                return 'Ошибка валидации данных (логин)';
            }
            $user->login = $request->login;
        } elseif ($user->phone != $request->phone) {
            try {
                $request->validate(['phone' => "required|unique:users|regex:/^[-0-9\+]+$/",]);
            } catch (Exception $ex) {
                return 'Ошибка валидации данных (номер телефона)';
            }
            $user->phone = $request->phone;
        } elseif ($user->email != $request->email) {
            try {
                $request->validate(['email' => "required|email|unique:users"]);
            } catch (Exception $ex) {
                return 'Ошибка валидации данных (почта)';
            }
            $user->login = $request->email;
        } else {
            return 'Вы ничего не поменяли';
        }
        $user->save();

        return 'Данные успешно обновлены';
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function indexMailSend(Request $request): RedirectResponse
    {
        $data = new stdClass();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->message = $request->message;
        Mail::to('techfox@techfox.ru')->send(new EmailContact($data));
        return redirect()->route('index')
            ->with('success', 'Ваше сообщение успешно отправлено');
    }
}
