<?php

declare(strict_types=1);

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Models\PostModel;

final class PostSave extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $p = PostEntityModel::props('post');

        return [
            $p->id => 'required',
            $p->user_id => [
                'required',
                Rule::unique(PostModel::table())
                    ->where('user_id', $this->get($p->user_id))
                    ->where('title', $this->get($p->title)),
            ],
            $p->title => [
                'required',
                Rule::unique('posts')
                    ->where('user_id', $this->get($p->user_id))
                    ->where('title', $this->get($p->title)),
                'between:0,255',
            ],
            $p->content => 'required',
            $p->thumbnail_image_path => 'nullable|between:0,255',
            $p->created_at => 'nullable',
            $p->updated_at => 'nullable',
            $p->deleted_at => 'nullable',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
