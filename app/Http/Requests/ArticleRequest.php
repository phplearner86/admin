<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                'title' => 'required|unique:articles,title',
                'body' => 'required',
                'category_id' => 'required|exists:categories,id',
                'published_at' => 'date|after_or_equal:today',
                    ];
                break;
            
            case 'PUT':
            case 'PATCH':
                return [
                'title' => 'required|unique:articles,title, ' .$this->article->id,
                'body' => 'required',
                'category_id' => 'required|exists:categories,id',
                'published_at' => 'date|after_or_equal:today',
                    ];
                break;
        }
    }
}
