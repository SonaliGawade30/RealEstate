<?php

namespace App\Repositories;

use App\Models\PartyRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartyRegistrationRepository
{

    public function storeParty($input)
    {
        DB::beginTransaction();
        $input['upload_document'] = isset($input['upload_document']) ? $input['upload_document']->store('party_doc') : '';
        PartyRegistration::create( Arr::only( $input, PartyRegistration::getFillables() ) );
        DB::commit();
    }

    public function editParty($PartyRegistration)
    {
        $fullPath = 'storage/' . $PartyRegistration['upload_document'] ?? '';
        $imagePath = asset($fullPath);

        if ($PartyRegistration)
        {
            $response = [
                'result' => 1,
                'PartyRegistration' => $PartyRegistration,
                'imagePath' => $imagePath
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function updateParty($input,$PartyRegistration)
    {
        DB::beginTransaction();         
        if(isset($input['edit_upload_document']))
        {
            if (Storage::disk('public')->exists($PartyRegistration['upload_document'])) {
                Storage::disk('public')->delete($PartyRegistration['upload_document']);
            }
            $input['upload_document'] = $input['edit_upload_document']->store('party_doc');
        }
        $input['party_name'] = $input['edit_party_name'];
        $input['buisness_name'] = $input['edit_buisness_name'];
        $input['address'] = $input['edit_address'];
        $input['mobile_no'] = $input['edit_mobile_no'];
        $input['email'] = $input['edit_email'];
        $input['pancard_no'] = $input['edit_pancard_no'];
        $input['aadhaar_no'] = $input['edit_aadhaar_no'];
        $input['gst_no'] = $input['edit_gst_no'];

        $PartyRegistration->update( Arr::only( $input, PartyRegistration::getFillables() ) );
        DB::commit();

    }



}

?>