<?php

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Helpers\ResponseTrait;
use App\Http\Requests\CreateFormRequest;
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

}
