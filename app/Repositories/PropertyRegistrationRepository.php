<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\{PropertyRegistration,Zone,PropertyType,TypeOfUse,Source,PropertyUnit,Estate};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PropertyRegistrationRepository
{

    public function storeProperty(Request $request,$input)
    {
        DB::beginTransaction();
        $input['property_photo_upload'] = isset($input['property_photo_upload']) ? $input['property_photo_upload']->store('properties_doc') : '';
        $input['dp_plan_upload'] = isset($input['dp_plan_upload']) ? $input['dp_plan_upload']->store('properties_doc') : '';
        $data =  PropertyRegistration::create( Arr::only( $input, PropertyRegistration::getFillables() ) );
   
            foreach($input['unit_no'] as $key => $unit_no){
                $createData = new PropertyUnit([
                    'unit_no' => $input['unit_no'][$key],
                    'area' => $input['area_filed'][$key],
                    'floor' => $input['floor'][$key],
                    'type_of_use_id' => $input['type_of_use_id'][$key],
                    'estate_id' => $input['estate_id'][$key],
                    'lease_rent' =>isset($input['lease_rent'][$key]) ? $input['lease_rent'][$key] : 'rent',
                ]);
                if ($request->hasFile('document') && $request->file('document')[$key]->isValid()) {
                    $document = $request->file('document')[$key];
                    $documentPath = $document->store('properties_doc/documents'); 
                    $createData->document = $documentPath;
                }
                $data->propertyUnit()->save($createData);
            }
        DB::commit();
    }

    public function editProperty($PropertyRegistration)
    {
        $PropertyRegistration->load('propertyUnit');
        $propertyUnits = $PropertyRegistration->propertyUnit;

        $zones = Zone::latest()->get();
        $property_types = PropertyType::latest()->get();
        $type_of_use = TypeOfUse::latest()->get();
        $sources = Source::latest()->get();
        $estates = Estate::latest()->get();
        
        if ($PropertyRegistration)
        {
            $zonesHtml = '<span>
                <option value="">--Select Zone--</option>';
                foreach($zones as $zone):
                    $is_select = $zone->id == $PropertyRegistration->zone_id ? "selected" : "";
                    $zonesHtml .= '<option value="'.$zone->id.'" '.$is_select.'>'.$zone->name.'</option>';
                endforeach;
            $zonesHtml .= '</span>';

            $propertytypesHtml = '<span>
                <option value="">--Select Zone--</option>';
                foreach($property_types as $property_type):
                    $is_select = $property_type->id == $PropertyRegistration->property_type_id ? "selected" : "";
                    $propertytypesHtml .= '<option value="'.$property_type->id.'" '.$is_select.'>'.$property_type->property_name.'</option>';
                endforeach;
            $propertytypesHtml .= '</span>';

            $sourcesHtml = '<span>
                <option value="">--Select Zone--</option>';
                foreach($sources as $source):
                    $is_select = $source->id == $PropertyRegistration->source_id ? "selected" : "";
                    $sourcesHtml .= '<option value="'.$source->id.'" '.$is_select.'>'.$source->name.'</option>';
                endforeach;
            $sourcesHtml .= '</span>';

            $typeofuseHtml = '<span>
            <option value="">--Select Zone--</option>';
            foreach($type_of_use as $data):
                $is_select = $data->id == $PropertyRegistration->type_of_use_id ? "selected" : "";
                $typeofuseHtml .= '<option value="'.$data->id.'" '.$is_select.'>'.$data->type_of_use.'</option>';
            endforeach;
            $typeofuseHtml .= '</span>';
            
           
            // Make file html
            $fileHtml = '';
            if($PropertyRegistration->property_photo_upload == '' )
            {
                $fileHtml.= '<label class="" for="file">No document uploaded </label>';
            }
            else
            {
                $fileNameParts = explode('.', $PropertyRegistration->property_photo_upload);
                $ext = end($fileNameParts);

                if($ext == 'pdf')
                    $fileHtml.= ' <a class="btn btn-primary" target="_blank" href="'.asset('storage/'.$PropertyRegistration->property_photo_upload).'">Open File</a>';
                else
                    $fileHtml.= '<a href="'.asset('storage/'.$PropertyRegistration->property_photo_upload).'" target="_blank"> <img class="img-fluid" src="'.asset('storage/'.$PropertyRegistration->property_photo_upload).'" style="border-radius: 8px; max-height: 200px; max-width: 150px" /> </a>';
            }

            // Make file html1
            $fileHtml1 = '';
            if($PropertyRegistration->dp_plan_upload == '' )
            {
                $fileHtml1.= '<label class="" for="file">No document uploaded </label>';
            }
            else
            {
                $fileNameParts = explode('.', $PropertyRegistration->dp_plan_upload);
                $ext = end($fileNameParts);

                if($ext == 'pdf')
                    $fileHtml1.= ' <a class="btn btn-primary" target="_blank" href="'.asset('storage/'.$PropertyRegistration->dp_plan_upload).'">Open File</a>';
                else
                    $fileHtml1.= '<a href="'.asset('storage/'.$PropertyRegistration->dp_plan_upload).'" target="_blank"> <img class="img-fluid" src="'.asset('storage/'.$PropertyRegistration->dp_plan_upload).'" style="border-radius: 8px; max-height: 200px; max-width: 150px" /> </a>';
            }




            $tableRows = '';
            foreach ($propertyUnits as $index=> $rowData):
                $tableRows .= '<tr>';
                $tableRows .= '<td><input type="hidden" name="auto_id[]" value="' . $rowData->id . '" class="form-control" ></td>';
                $tableRows .= '<td><input type="text" name="unit_no[]" value="' . $rowData->unit_no . '" class="form-control" ></td>';
                $tableRows .= '<td><input type="text" name="area_filed[]" value="' . $rowData->area . '" class="form-control" ></td>';
                $tableRows .= '<td><input type="text" name="floor[]" value="' . $rowData->floor . '" class="form-control" ></td>';
                $tableRows .= '<td>';
                $tableRows .= '<select name="type_of_use_id[]" class="js-example-basic-single form-control">';
                $tableRows .='<option value="">--Select Type of Use--</option>';
                    foreach($type_of_use as $data):
                        $is_select = $data->id == $rowData->type_of_use_id ? "selected" : "";
                        $tableRows .= '<option value="'.$data->id.'" '.$is_select.'>'.$data->type_of_use.'</option>';
                    endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';
                $tableRows .= '<td>';
                $tableRows .= '<select name="estate_id[]" class="js-example-basic-single form-control">';
                $tableRows .='<option value="">--Select Estate--</option>';
                    foreach($estates as $estate):
                        $is_select = $estate->id == $rowData->estate_id ? "selected" : "";
                        $tableRows .= '<option value="'.$estate->id.'" '.$is_select.'>'.$estate->estate_name.'</option>';
                    endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';
                $tableRows .= '<td nowrap>';
                $options = ['lease', 'rent', 'self_owner'];                
                    foreach ($options as $option):
                        $checked = ($option == $rowData->lease_rent) ? 'checked' : '';
                        $formattedOption = ucwords(str_replace('_', ' ', $option));
                        $tableRows .= '<label><input style="margin:4px;" type="radio" name="lease_rent[' . $index . ']" value="' . $option . '" ' . $checked . '> ' . ucfirst($formattedOption) . '</label>';
                    endforeach;
                $tableRows .= '</td>';  
                $tableRows .= '<td nowrap><input type="file" name="document[]" class="form-control" style="margin-bottom:5px;">' . (!empty($rowData->document) ? '<a href="'.asset('storage/'.$rowData->document).'" target="_blank" class="btn btn-sm btn-primary"> View File </a>' : '<label>No document</label>') . '</td>';
                $tableRows .= '<td style=""><a href="javascip:" data-id="'.$rowData->id.'" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows .= '</tr>';
            endforeach;

            $typeofuseJson = json_encode($type_of_use);
            $estateOptions = json_encode($estates);

            $response = [
                'result' => 1,
                'PropertyRegistration' => $PropertyRegistration,
                // 'property_unit' => $PropertyRegistration->propertyUnit,
                'zonesHtml' => $zonesHtml,
                'propertytypesHtml' => $propertytypesHtml,
                'sourcesHtml' => $sourcesHtml,
                'typeofuseHtml' => $typeofuseHtml,
                'fileHtml'=> $fileHtml,
                'fileHtml1'=> $fileHtml1,
                'tableRows' =>$tableRows,
                'typeofuseJson' =>$typeofuseJson,
                'estateJson' =>$estateOptions,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;

    }

  


    public function updateProperty(Request $request,$input,$PropertyRegistration)
    {
        DB::beginTransaction();    

        if(isset($input['property_photo_upload']))
        {
            $filePath = public_path('storage/' . $PropertyRegistration['property_photo_upload']);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $input['property_photo_upload'] = $input['property_photo_upload']->store('properties_doc');
        }
        if(isset($input['dp_plan_upload']))
        {
            $filePath = public_path('storage/' . $PropertyRegistration['dp_plan_upload']);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $input['dp_plan_upload'] = $input['dp_plan_upload']->store('properties_doc');
        }
        $PropertyRegistration->update( Arr::only( $input, PropertyRegistration::getFillables() ) );

        // -- start---
                if(isset($input['auto_id'])){
                    foreach ($input['auto_id'] as  $key => $auto_id) {
                        if($auto_id!=''){
                            $updateData=[
                                         'unit_no'=> $input['unit_no'][$key],
                                         'area' => $input['area_filed'][$key],
                                         'floor' => $input['floor'][$key],
                                         'type_of_use_id' => $input['type_of_use_id'][$key],
                                         'estate_id' => $input['estate_id'][$key],
                                         'lease_rent' =>isset($input['lease_rent'][$key]) ? $input['lease_rent'][$key] : 'rent',
                                        ];
                            $updateFileds = PropertyUnit::where('id',$auto_id)->first();
                            $updateFileds->update($updateData);
                                //document
                                if (isset($input['document'][$key])) {
                                    $document = $input['document'][$key];
                                    if ($document->isValid()) {
                                        $filePath = public_path('storage/' . $updateFileds->document);
                                        if (File::exists($filePath)) {
                                            File::delete($filePath);
                                        }                
                                        $documentPath = $document->store('properties_doc/documents');
                                        $updateFileds->document = $documentPath;
                                        $updateFileds->save();
                                    }
                                }
                        } else{
                            $createData = new PropertyUnit([
                                'unit_no' => $input['unit_no'][$key],
                                'area' => $input['area_filed'][$key],
                                'floor' => $input['floor'][$key],
                                'type_of_use_id' => $input['type_of_use_id'][$key],
                                'estate_id' => $input['estate_id'][$key],
                                'lease_rent' =>isset($input['lease_rent'][$key]) ? $input['lease_rent'][$key] : 'rent',
                            ]);
                            if ($request->hasFile('document') && $request->file('document')[$key]->isValid()) {
                                $document = $request->file('document')[$key];
                                $documentPath = $document->store('properties_doc/documents'); 
                                $createData->document = $documentPath;
                            }
                            $PropertyRegistration->propertyUnit()->save($createData);
                        }
                    }///end foreach
                }
        // -- end---



        DB::commit();

    }



}

?>