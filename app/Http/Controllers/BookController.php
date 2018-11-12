<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return View
     */
    public function index():View
    {
        if(\Illuminate\Support\Facades\Auth::check()) {
            $books = Book::paginate(10);
            return view('book', ['books' => $books]);
        } else {
            return view('book');
        }
    }

    function pageAdd():View
    {
        if(\Illuminate\Support\Facades\Auth::check()) {
            return view("book_add");
        }
    }

    function add(Request $request)
    {
        $validation = $request->validate([
            'author' => 'required|min:3|max:60',
            'title' => 'required|max:100',
            'pages' => 'required|numeric|min:1|max:10000',
            'describe' => 'required|max:1000',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = new Book();
        $book->author = $request->input('author');
        $book->title = $request->input('title');
        $book->pages = $request->input('pages');
        $book->describe = $request->input('describe');

        $file = $validation["image"];
        $extension = $file->getClientOriginalExtension();
        $filename  = 'image-' . time() . '.' . $extension;
        $path = $file->storeAs('images', $filename);

        $book->image_mimetype = $request->file('image')->getClientMimeType();
        $book->image = (string) (Storage::get($path));

        $book->save();

        // clear storage
        Storage::delete($path);

        echo response()->json(
            [
                "image_mimetype" => $request->file('image')->getClientMimeType(),
                "image_path" => $request->file('image')->getPath(),
                "image_storage_path" => $path
            ]
        );
    }

    function testSaveImage( Request $request)
    {
        echo '<pre>';
        var_dump($request);
        //echo response()->json(Book::where("id", 1)->get(["image"]));
        //var_dump(get_class_methods(get_class((Book::query()->where("id", 1))->get())));
    }

    /**
     * @return void - print message
     */
    function addManyBooks():void
    {
        try {
            if(!is_null(Book::find(1))) {
                echo "items present";
            } else {
                for($i=1; $i<=20; $i++) {
                    $book = new Book();
                    $book->author = "Matvey";
                    $book->title = "Matvey's great story. Volume " . $i;
                    $book->pages = $i;
                    $book->describe = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
                    $book->image = "null";
                    $book->save();
                }
                echo "list of books added";
            }

        } catch (\Exception $e) {
            echo "<pre>";
            var_dump($e);
            return;
        }
    }
}
