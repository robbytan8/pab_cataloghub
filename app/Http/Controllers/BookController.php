<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @author Robby Tan
 */
class BookController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $books = Book::with('category')->get();
    return view('book.index', compact('books'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::all();
    return view('book.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'isbn' => 'required|string|max:13|unique:book,isbn',
      'title' => 'required|string|max:100',
      'author' => 'required|string|max:100',
      'description' => 'nullable|string|max:400',
      'publish_year' => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
      'category_id' => 'required|integer|exists:category,id',
    ]);
    Book::create($validatedData);
    return redirect()->route('book.index')->with('success', 'Book created successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Book $book)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Book $book)
  {
    $categories = Category::all();
    return view('book.edit', compact('book', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Book $book)
  {
    $validatedData = $request->validate([
      'title' => 'required|string|max:100',
      'author' => 'required|string|max:100',
      'description' => 'nullable|string|max:400',
      'publish_year' => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
      'category_id' => 'required|integer|exists:category,id',
    ]);
    $book->update($validatedData);
    return redirect()->route('book.index')->with('success', 'Book updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Book $book)
  {
    $book->delete();
    return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
  }
}
