<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodect = new \App\Product([

        	'imagePath'   => 'https://tomilon.files.wordpress.com/2015/05/laravel-book-cover.jpg',
        	'title'       => 'Laravel 5.4',
        	'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
        	'price'       => 10
        ]);

        $prodect->save();

        $prodect = new \App\Product([

        	'imagePath'   => 'http://www.narosa.com/images/978-81-7319-919-6.gif',
        	'title'       => 'Programming with C++',
        	'description' => 'Master in C++.Learn more and improve your skill for ACM coding.',
        	'price'       =>15
        ]);

        $prodect->save();

        $prodect = new \App\Product([

        	'imagePath'   => 'https://www.packtpub.com/sites/default/files/9781785884221.png',
        	'title'       => 'Android Development',
        	'description' => 'Learn how to do more with SDK with advanced android application.',
        	'price'       => 20
        ]);

        $prodect->save();

        $prodect = new \App\Product([

        	'imagePath'   => 'http://www.skkatariaandsons.com/Best%20Sellers/978-93-5014-096-3.jpg',
        	'title'       => 'Master in Java',
        	'description' => 'To be the competitive in real world java is perfect for everyone',
        	'price'       => 10
        ]);

        $prodect->save();

        $prodect = new \App\Product([

        	'imagePath'   => 'https://sd.keepcalm-o-matic.co.uk/i/keep-calm-and-use-laravel.png',
        	'title'       => 'Laravel 5.4 New Features',
        	'description' => 'New features in laravel that makes your coding more effective and professional',
        	'price'       => 25
        ]);

        $prodect->save();
    }
}
