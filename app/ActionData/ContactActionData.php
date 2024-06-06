<?php
declare(strict_types=1);

namespace App\ActionData;

use Akbarali\ActionData\ActionDataBase;
use Illuminate\Http\UploadedFile;

class ContactActionData extends ActionDataBase
{
    public string $name;
    public string $email;
    public string $telephone;
    public string $subject;
    public string $message;
    public ?UploadedFile $file = null;

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'telephone' => 'required',
            'subject' => 'required|string',
            'message' => 'required|string|min:10|max:1000',
            'file' => 'nullable|file|mimes:txt,doc,docx,pdf,xls,jpeg,png,jpg,gif,svg|max:10240',
        ];
    }

}
