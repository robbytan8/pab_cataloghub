<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @author Robby Tan
 */
class UpdateBookRequest extends FormRequest
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
      'title' => 'required|string|max:100|unique:book,title,' . $this->route('book')->isbn,
      'author' => 'required|string|max:100',
      'publish_year' => 'required|integer|min:1000|max:' . date('Y'),
      'description' => 'nullable|string|max:400',
      'category_id' => 'required|exists:category,id',
    ];
  }
}
