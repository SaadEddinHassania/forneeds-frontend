<?php

namespace App\Http\Requests;

use App\Models\Users\Citizen;
use Illuminate\Foundation\Http\FormRequest;

class BenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(  )
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
        if($this->route('id')){
            $citizen = Citizen::find($this->route('id'));
            $user = $citizen->user->id;

        }
        if(!$this->input('citizen.contactable')){

            $input = (object) $this->all();
            $input->citizen['contactable'] = false;
            $this->replace((array) $input);
        }
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'user.name' => 'required|max:255',
                    'sector_id' => 'required',
                    'area_id' => 'required',
                    'marital_status_id' => 'required',
                    'age_id' => 'required',
                    'working_state_id' => 'required',
                    'refugee_state_id' => 'required',
                    'disability_id' => 'required',
                    'academic_level_id' => 'required',
                    'user.email'      => 'required|email|unique:users,email',
                    'user.password'   => 'required|confirmed',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|max:255',
                    'citizen.sector_id' => 'required',
                    'citizen.area_id' => 'required',
                    'citizen.marital_status_id' => 'required',
                    'citizen.age_id' => 'required',
                    'citizen.working_state_id' => 'required',
                    'citizen.refugee_state_id' => 'required',
                    'citizen.disability_id' => 'required',
                    'citizen.academic_level_id' => 'required',
                    'email'      => 'required|email|unique:users,email,'.$user,
                ];
            }
            default:break;
        }
    }
}
