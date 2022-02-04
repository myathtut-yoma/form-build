<?php

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Helpers\ResponseTrait;
use App\Http\Requests\CreateFormRequest;
use App\Http\Requests\SubmitFormRequest;
use App\Models\Content;
use App\Models\Form;

class FormController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
    }

    public function createForm(CreateFormRequest $request)
    {
        $data = $request->all();

        $form = Form::create([
            'user_id' => auth()->id(),
            'content' => $data['content'],
            'form_name' => $data['form_name'],
            'attributes' => $data['attributes'],
        ]);

        return $this->dataResponse($form);

    }

    public function getForm($formId)
    {
        $form = Form::findOrFail($formId);

        return $this->dataResponse($form);

    }

    public function formSubmit(SubmitFormRequest $request)
    {
        $data = $request->all();

        $form = Content::create([
            'user_id' => auth()->id(),
            'form_id' => $data['form_id'],
            'content_attributes' => $data['attributes'],
        ]);

        return $this->dataResponse($form);

    }

}
