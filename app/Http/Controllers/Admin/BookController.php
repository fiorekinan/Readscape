<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(5);
        return view('admin.books.index', compact('books'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi Data
        $this->validateBook($request);

        // Menyimpan si Cover
        $coverImage = $request->file('cover');
        $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
        $coverImage->move(public_path('cover_images'), $coverImageName);

        // Proses Menyimpan Data
        Book::create([
            'title'       => $request->title,
            'author'      => $request->author,
            'year'        => $request->year,
            'category_id' => $request->category_id,
            'publisher'   => $request->publisher,
            'stock'       => $request->stock,
            'cover'       => 'cover_images/' . $coverImageName
        ]);

        return redirect()->route('book')->with('message', "Berhasil Menambahkan Buku");
    }

    // Detail Buku
    public function detail($id)
    {
        $book = Book::find($id);
        // return $book->id;
        return view('admin.books.detail', compact('book'));
    }

    // Edit
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('categories', 'book'));
    }

    // Update
    public function update(Request $request, $id)
    {

        // Validasi Data
        $this->validateBook($request);

        // Ambil Data yang akan di Update
        $book = Book::findOrFail($id);

        // Jika ada cover baru, Upload dan Hapus yang lama
        if ($request->hasFile('cover')) {
            // Hapus Cover Lama
            if ($book->cover && file_exists(public_path($book->cover))) {
                unlink(public_path($book->cover));
            }

            // Upload cover yang baru
            $coverImage = $request->file('cover');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('cover_images'), $coverImageName);

            // Set Path Baru
            $book->cover = 'cover_images/' . $coverImageName;
        }
        // Proses Update Data
        $book->update([
            'title'       => $request->title,
            'author'      => $request->author,
            'year'        => $request->year,
            'category_id' => $request->category_id,
            'publisher'   => $request->publisher,
            'stock'       => $request->stock,
        ]);

        return redirect()->route('book.detail', $book->id)->with('message', "Berhasil Melakukan Perubahan");
    }

    //hapus
    public function destroy($id) {
        $book = Book::findOrFail($id);

        //menghapus cover dahulu
        if($book->cover && file_exists(public_path($book->cover))) {
            unlink(public_path($book->cover));
        }

        //menghapus data buku
        $book->delete();
        return redirect()->route('book')->with('message', 'Buku berhasil dihapus');
    }

    public function validateBook(Request $request)
    {
        // Syarat Validasi
        $rules = [
            'title'       => 'required|string|max:225',
            'author'      => 'required|string|max:225',
            'year'        => 'required|numeric',
            'category_id' => 'required|numeric',
            'publisher'   => 'required|string|max:225',
            'stock'       => 'required|numeric',
        ];
        if ($request->isMethod('post')) {
            // Create Data
            $rules['cover'] = 'required|image|mimes:jpeg.png,jpg,webp|max:2048';
        } else {
            // Saat Update
            $rules['cover'] = 'nullable|image|mimes:jpeg.png,jpg,webp,avif|max:2048';
        }

        $request->validate($rules);
    }
}
