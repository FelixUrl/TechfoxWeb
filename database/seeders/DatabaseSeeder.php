<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(250)->create();
         \App\Models\Occupation::factory(333)->create();

        DB::table('type_technics')->insert([
            'name' => 'Мелкая техника',
        ]);
        DB::table('type_technics')->insert([
            'name' => 'Крупная техника',
        ]);
        DB::table('type_technics')->insert([
            'name' => 'Смартфон',
        ]);
        DB::table('type_technics')->insert([
            'name' => 'Компьютер и ноутбук',
        ]);
        DB::table('type_technics')->insert([
            'name' => 'Гаджет',
        ]);
        DB::table('type_technics')->insert([
            'name' => 'Аудиотехника',
        ]);
        DB::table('type_technics')->insert([
            'name' => 'Умные часы',
        ]);

        DB::table('payments')->insert([
            'name' => 'Наличные',
        ]);
        DB::table('payments')->insert([
            'name' => 'Картой онлайн',
        ]);
        DB::table('payments')->insert([
            'name' => 'Картой при получении',
        ]);
        DB::table('categories')->insert([
            'name' => 'Услуги',
        ]);
        DB::table('categories')->insert([
            'name' => 'Товары',
        ]);
        DB::table('categories')->insert([
            'name' => 'Запчасти',
        ]);
        DB::table('categories_products')->insert([
            'name' => 'Запчасти',
        ]);
        DB::table('categories_products')->insert([
            'name' => 'Товары',
        ]);
        DB::table('categories_products')->insert([
            'name' => 'Камеры',
        ]);

        DB::table('statuses')->insert([
            'name' => 'Рассмотрена',
        ]);
        DB::table('statuses')->insert([
            'name' => 'В рассмотрении',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Новая',
        ]);

        DB::table('users')->insert([
            'name' => 'wsr',
            'login' => 'wsr',
            'email' => 'wsr@wsr.ru',
            'phone' => '89995854777',
            'password' => Hash::make('wsrwsr'),
            'isAdmin' => true,
            'key' => md5(time() . mt_rand(0, 4192) . uniqid()),
        ]);


        DB::table('statuses_products')->insert([
            'name' => 'Создана',
        ]);
        DB::table('statuses_products')->insert([
            'name' => 'Обрабатывается',
        ]);
        DB::table('statuses_products')->insert([
            'name' => 'Отправлен',
        ]);
        DB::table('statuses_products')->insert([
            'name' => 'Ожидает выдачи',
        ]);
        DB::table('statuses_products')->insert([
            'name' => 'Выдан',
        ]);
        DB::table('statuses_products')->insert([
            'name' => 'Отменён',
        ]);


        DB::table('marks')->insert([
            'name' => 'Apple',
        ]);
        DB::table('marks')->insert([
            'name' => 'Xiaomi',
        ]);
        DB::table('marks')->insert([
            'name' => 'Canon',
        ]);
        DB::table('marks')->insert([
            'name' => 'Samsung',
        ]);
        DB::table('marks')->insert([
            'name' => 'HTC',
        ]);
        DB::table('marks')->insert([
            'name' => 'Huawei',
        ]);
        DB::table('marks')->insert([
            'name' => 'Meizu',
        ]);
        DB::table('marks')->insert([
            'name' => 'Nikon',
        ]);
        DB::table('marks')->insert([
            'name' => 'Philips',
        ]);
        DB::table('marks')->insert([
            'name' => 'Realme',
        ]);
        DB::table('marks')->insert([
            'name' => 'Honor',
        ]);
        DB::table('marks')->insert([
            'name' => 'Google',
        ]);
        DB::table('marks')->insert([
            'name' => 'OnePlus',
        ]);
        DB::table('marks')->insert([
            'name' => 'VIVO',
        ]);
        DB::table('marks')->insert([
            'name' => 'OPPO',
        ]);
        DB::table('marks')->insert([
            'name' => 'JBL',
        ]);
        DB::table('marks')->insert([
            'name' => 'Sony',
        ]);
        DB::table('marks')->insert([
            'name' => 'Microsoft',
        ]);

        DB::table('orders')->insert([
            'name' => 'Диагностика айфона',
            'phone' => '89995854777',
            'description' => 'Проверить почему не включается телефон с последующим ремонтом',
            'type_technic_id' => 3,
            'mark_id' => 1,
            'category_id' => 1,
            'status_id' => 3,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);
        DB::table('products')->insert([
            'name' => 'Защитное стекло на iPhone',
            'description' => 'Крепкое защитное стекло на iPhone 13 9D',
            'photo' => 'original.jpg',
            'weight' => 50,
            'category_id' => 3,
            'type_technic_id' => 3,
            'mark_id' => 1,
            'price' => 1700,
        ]);


        DB::table('orders')->insert([
            'name' => 'не работает телефон',
            'phone' => 89995857777,
            'type_technic_id' => 1,
            'mark_id' => 1,
            'category_id' => 1,
            'status_id' => 2,
            'user_id' => 1
        ]);
        \App\Models\Product::factory(100)->create();
        \App\Models\Order::factory(100)->create();
    }
}
