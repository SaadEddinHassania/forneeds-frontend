<?php

namespace App\Http\Requests;

use App\Models\Users\ServiceProvider;
use Illuminate\Foundation\Http\FormRequest;

class OrgRequest extends FormRequest
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
        if ($this->route('id')) {
            $sp = ServiceProvider::find($this->route('id'));
            $user = $sp->user->id;

        }
        if(!$this->input('is_accepted')){

            $input = (object) $this->all();
            $input->sp['is_accepted'] = false;
            $this->replace((array) $input);
        }

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'user.name' => 'required|max:255',
                    'sector_id' => 'required',
                    'company_id' => 'required',
                    'area_id' => 'required',
                    'mission_statement' => 'required|max:500',
                    'phone_number' => 'required_without_all:mobile_number|max:255',
                    'mobile_number' => 'required_without_all:phone_number|max:255',
                    'fax' => 'max:255',
                    'website' => 'max:255',
                    'contact_person' => 'required|max:255',
                    'contact_person_title' => 'required|max:255',
                    'user.email' => 'required|email|unique:users,email',
                    'user.password' => 'required|confirmed',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|max:255',
                    'sp.sector_id' => 'required',
                    'sp.company_id' => 'required',
                    'sp.area_id' => 'required',
                    'sp.mission_statement' => 'required|max:500',
                    'sp.phone_number' => 'required_without_all:mobile_number|max:255',
                    'sp.mobile_number' => 'required_without_all:phone_number|max:255',
                    'sp.fax' => 'max:255',
                    'sp.website' => 'max:255',
                    'sp.contact_person' => 'required|max:255',
                    'sp.contact_person_title' => 'required|max:255',
                    'email' => 'required|email|unique:users,email,' . $user,
                ];
            }
            default:
                break;
        }
    }
}
