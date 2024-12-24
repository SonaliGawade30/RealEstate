<?php

namespace App\Repositories;

use App\Models\{ApplicationForRent,Zone,PropertyRegistration,PartyRegistration,PropertyUnit,ApplicationForRentDocument};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ApplicationForRentRepository
{

    public function storeApplicationForRent($input)
    {
        DB::beginTransaction();
        $input['path'] = isset($input['file']) ? $input['file']->store('application_document') : '';
        $applicationforRent = ApplicationForRent::create( Arr::only( $input, ApplicationForRent::getFillables() ) );
        $applicationforRent->document()->create( Arr::only( $input, ApplicationForRentDocument::getFillables() ) );
        DB::commit();
    }

    public function editApplicationForRent($application_for_rent)
    {
        $application_for_rent->load('document','zone','property','party');
        $zones = Zone::latest()->get();
        $propertys = PropertyRegistration::latest()->get();
        $units = PropertyUnit::wherePropertyRegId($application_for_rent->property_reg_id)->latest()->get();
        $partys = PartyRegistration::latest()->get();
        $propertyDetails = PartyRegistration::whereId($application_for_rent->party_reg_id)->latest()->first();

        if ($application_for_rent)
        {
            $zoneHtml = '<span>
                <option value="">--Select Zone --</option>';
                foreach($zones as $zone):
                    $is_select = $zone->id == $application_for_rent->zone_id ? "selected" : "";
                    $zoneHtml .= '<option value="'.$zone->id.'" '.$is_select.'>'.$zone->name.'</option>';
                endforeach;
            $zoneHtml .= '</span>';

            $propertyHtml = '<span>
                <option value="">--Select Property --</option>';
                foreach($propertys as $property):
                    $is_select = $property->id == $application_for_rent->property_reg_id ? "selected" : "";
                    $propertyHtml .= '<option value="'.$property->id.'" '.$is_select.'>'.$property->property_no.'</option>';
                endforeach;
            $propertyHtml .= '</span>';

            $unitHtml = '<span>
                <option value="">--Select Unit --</option>';
                foreach($units as $unit):
                    $is_select = $unit->id == $application_for_rent->unit_no ? "selected" : "";
                    $unitHtml .= '<option value="'.$unit->id.'" '.$is_select.'>'.$unit->unit_no.'</option>';
                endforeach;
            $unitHtml .= '</span>';

            $partyHtml = '<span>
                <option value="">--Select Party --</option>';
                foreach($partys as $party):
                    $is_select = $party->id == $application_for_rent->party_reg_id ? "selected" : "";
                    $partyHtml .= '<option value="'.$party->id.'" '.$is_select.'>'.$party->party_name.'</option>';
                endforeach;
            $partyHtml .= '</span>';

            // Make file html
            $fileHtml = '';
            if( $application_for_rent->document->path == '' )
            {
                $fileHtml.= '<label class="col-form-label card rounded" for="file">No document uploaded </label>';
            }
            else
            {
                $fileNameParts = explode('.', $application_for_rent->document->path);
                $ext = end($fileNameParts);

                if($ext == 'pdf')
                    $fileHtml.= ' <a class="btn btn-sm btn-primary"  style="white-space: nowrap;" target="_blank" href="'.asset($application_for_rent->document->path).'"> Open File</a>';
                else
                    $fileHtml.= '<a href="'.asset($application_for_rent->document->path).'" target="_blank"> <img class="img-fluid" src="'.asset($application_for_rent->document->path).'" style="border-radius: 8px; max-height: 200px; max-width: 150px" /> </a>';
            }

            $response = [
                'result' => 1,
                'application_for_rent' => $application_for_rent,
                'zoneHtml' => $zoneHtml,
                'propertyHtml' => $propertyHtml,
                'unitHtml' => $unitHtml,
                'partyHtml' => $partyHtml,
                'propertyDetails' => $propertyDetails,
                'fileHtml' => $fileHtml,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;

    }

    public function updateApplicationForRent($input, $application_for_rent)
    {
        $application_for_rent->load('document');

        if(isset($input['file']))
        {
            if (File::exists($application_for_rent->document->path)) {
                File::delete($application_for_rent->document->path);
            }
            $input['path'] = $input['file']->store('application_document');
            $application_for_rent->document()->update( Arr::only( $input, ApplicationForRentDocument::getFillables() ) );
        }

        DB::beginTransaction();
        $application_for_rent->update( Arr::only( $input, ApplicationForRent::getFillables() ) );
        DB::commit();
    }



}

?>