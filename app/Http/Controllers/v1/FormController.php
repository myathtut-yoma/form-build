<?php

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Helpers\ResponseTrait;
use App\Http\Requests\CreateFormRequest;
use App\Http\Requests\SubmitFormRequest;
use App\Http\Resources\FormResource;
use App\Models\Content;
use App\Models\Form;
use Illuminate\Http\Response;

class FormController extends Controller
{
    use ResponseTrait;

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

    public function getAllForm()
    {

        return FormResource::collection(Form::with('user')->get())->additional(['message' => 'Get All Forms', 'code' => Response::HTTP_OK]);
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
