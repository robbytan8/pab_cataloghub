<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @author Robby Tan
 */
class StoreBookRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'isbn' => 'required|string|max:13|unique:book,isbn',
      'title' => 'required|string|max:100|unique:book,title',
      'author' => 'required|string|max:100',
      'publish_year' => 'required|integer|min:1000|max:' . date('Y'),
      'description' => 'nullable|string|max:400',
      'category_id' => 'required|exists:category,id',
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      'isbn.required' => 'ISBN is required.',
      'isbn.string' => 'ISBN must be a string.',
      'isbn.max' => 'ISBN must not exceed 13 characters.',
      'isbn.unique' => 'ISBN must be unique.',
      'title.required' => 'Title is required.',
      'title.string' => 'Title must be a string.',
      'title.max' => 'Title must not exceed 100 characters.',
      'title.unique' => 'Title must be unique.',
      'author.required' => 'Author is required.',
      'author.string' => 'Author must be a string.',
      'author.max' => 'Author must not exceed 100 characters.',
      'publish_year.required' => 'Publish year is required.',
      'publish_year.integer' => 'Publish year must be an integer.',
      'publish_year.min' => 'Publish year must be a valid year.',
      'publish_year.max' => 'Publish year must not be in the future.',
      'category_id.required' => 'Category is required.',
      'category_id.exists' => 'Selected category is invalid.',
    ];
  }
}
