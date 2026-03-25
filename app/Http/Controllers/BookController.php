<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;

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
  public function store(StoreBookRequest $request)
  {
    Book::create($request->validated());
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
  public function update(UpdateBookRequest $request, Book $book)
  {
    $book->update($request->validated());
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
