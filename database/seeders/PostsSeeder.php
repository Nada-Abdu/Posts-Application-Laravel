<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post1 =   Post::create([
            'title' => 'Laravel',
            'image' => 'laravel.png',
            'description' =>
            'Laravel is a free and open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.',
            'user_id' => 2
        ]);

        $post2 =   Post::create([
            'title' => 'HTML',
            'image' => 'html.jpg',
            'description' =>
            'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the content and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.',
            'user_id' => 2
        ]);

        $post3 =   Post::create([
            'title' => 'CSS',
            'image' => 'css.png',
            'description' =>
            'Cascading Style Sheets is a style sheet language used for specifying the presentation and styling of a document written in a markup language such as HTML or XML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.',
            'user_id' => 3
        ]);

        $post4 =   Post::create([
            'title' => 'JavaScript',
            'image' => 'javascript.png',
            'description' =>
            'JavaScript, often abbreviated as JS, is a programming language and core technology of the World Wide Web, alongside HTML and CSS. As of 2023, 98.7% of websites use JavaScript on the client side for webpage behavior, often incorporating third-party libraries',
            'user_id' => 3
        ]);
    }
}
