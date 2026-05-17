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
            Book Page
          </li>
        </ul>
      </div>
      <div class="card">
        <div class="card-header">
          @if(auth()->user()->role_id === \App\Enums\UserRole::ADMIN->value)
          <a href="{{ route('book.create') }}" class="btn btn-primary mb-3">Add New Book</a>
          @endif
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Author</th>
              <th>Category</th>
              @if(auth()->user()->role_id === \App\Enums\UserRole::ADMIN->value)
              <th>Actions</th>
              @endif
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
              <tr>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name ?? 'N/A' }}</td>
                @if(auth()->user()->role_id === \App\Enums\UserRole::ADMIN->value)
                <td>
                  <a href="{{ route('book.edit', $book->isbn) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form id="delete-form-{{ $book->isbn }}" action="{{ route('book.destroy', $book->isbn) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{ $book->isbn }}">
                      Delete
                    </button>
                  </form>
                </td>
                @endif
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('JS')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
      $('.btn-delete').click(function () {
        let id = $(this).data('id');

        Swal.fire({
          title: 'Are you sure want to delete?',
          text: "The change is permanent!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            $('#delete-form-' + id).submit();
          }
        });
      });
    });
  </script>
@endsection
