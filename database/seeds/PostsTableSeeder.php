<?php

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = App\User::create([
            'name' => 'John Deo',
            'email' => 'john@deo.com',
            'password' => Hash::make('password')
        ]);

        $author2 = App\User::create([
            'name' => 'John Smith',
            'email' => 'john@smith.com',
            'password' => Hash::make('password')
        ]);

    	$category1 = Category::create([
    		'name' => 'News'
    	]);

    	$category2 = Category::create([
    		'name' => 'Marketing'
    	]);

    	$category3 = Category::create([
    		'name' => 'Partnership'
    	]);

        $post1 = Post::create([
        	'title' => 'We relocated our office to a new designed garage',

			'description' => 'Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. certain. Debating offended at branched striking be subjects.',

			'content' => 'Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. An from mean on with when sing pain. Oh to as principles devonshire companions unsatiable an delightful. The ourselves suffering the sincerity. Inhabit her manners adapted age certain. Debating offended at branched striking be subjects.',

			'category_id' => $category1->id,

			'image' => 'posts/1.jpg',

            'user_id' => $author1->id
        ]);


        $post2 = $author2->posts()->create([
        	'title' => 'Top 5 brilliant content marketing strategies',

			'description' => 'Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. certain. Debating offended at branched striking be subjects.',

			'content' => 'Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. An from mean on with when sing pain. Oh to as principles devonshire companions unsatiable an delightful. The ourselves suffering the sincerity. Inhabit her manners adapted age certain. Debating offended at branched striking be subjects.',

			'category_id' => $category2->id,

			'image' => 'posts/2.jpg'
        ]);


        $post3 = $author1->posts()->create([
        	'title' => 'Best practices for minimalist design with example',

			'description' => 'Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. certain. Debating offended at branched striking be subjects.',

			'content' => 'Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. An from mean on with when sing pain. Oh to as principles devonshire companions unsatiable an delightful. The ourselves suffering the sincerity. Inhabit her manners adapted age certain. Debating offended at branched striking be subjects.',

			'category_id' => $category3->id,

			'image' => 'posts/3.jpg'
        ]);


        $post4 = $author2->posts()->create([
        	'title' => 'Congratulate and thank to Maryam for joining our team',

			'description' => 'Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. certain. Debating offended at branched striking be subjects.',

			'content' => 'Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year. An from mean on with when sing pain. Oh to as principles devonshire companions unsatiable an delightful. The ourselves suffering the sincerity. Inhabit her manners adapted age certain. Debating offended at branched striking be subjects.',

			'category_id' => $category2->id,

			'image' => 'posts/4.jpg'
        ]);


        $tag1 = Tag::create([
    		'name' => 'Job'
    	]);

    	$tag2 = Tag::create([
    		'name' => 'Customers'
    	]);

    	$tag3 = Tag::create([
    		'name' => 'Record'
    	]);


    	$post1->tags()->attach([$tag1->id, $tag2->id]);

    	$post2->tags()->attach([$tag2->id, $tag3->id]);

    	$post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}
















