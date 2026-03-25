@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Book Management</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="{{ route('home') }}">
              <i class="icon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="{{ route('book.index') }}">Book Page</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">Book Update Form</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-body">
          <form action="{{ route('book.update', $book->isbn) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="isbn">ISBN</label>
              <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" maxlength="13" readonly value="{{ old('isbn', $book->isbn) }}">
              @error('isbn')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" maxlength="100" required autofocus value="{{ old('title', $book->title) }}">
              @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="author">Author</label>
              <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" maxlength="100" required value="{{ old('author', $book->author) }}">
              @error('author')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="publish_year">Publish Year</label>
              <input type="number" class="form-control @error('publish_year') is-invalid @enderror" id="publish_year" name="publish_year" maxlength="4" required value="{{ old('publish_year', $book->publish_year) }}">
              @error('publish_year')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" maxlength="400">{{ old('description', $book->description) }}</textarea>
              @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="category_id">Category</label>
              <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
              @error('category_id')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
