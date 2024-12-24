<x-admin.layout>
    <x-slot name="title"> Property Registration</x-slot>
    <x-slot name="heading"> Property Registration</x-slot>


        <!-- Add Form -->
        <div class="row" id="addContainer" style="">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="mb-2 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone"> Zone <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="zone_id">
                                            <option value="">--Select Zone--</option>
                                            @foreach ($zones as $zone)
                                                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text zone_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_type_id">Property Type <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="property_type_id">
                                            <option value="">--Select Property Type--</option>
                                            @foreach ($property_types as $property_type)
                                                <option value="{{ $property_type->id }}">{{ $property_type->property_name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text property_type_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no"> Property No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="property_no" value="{{'BNCMC' . Str::upper(Str::random(11)); }}" type="text" placeholder="Property No" readonly></input>
                                    <span class="text-danger error-text property_no_err"></span>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="old_property_no"> Old Property No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="old_property_no" type="text" placeholder="Old Property No"></input>
                                    <span class="text-danger error-text old_property_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_name">  Property Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="property_name" type="text" placeholder="Property Name"></input>
                                    <span class="text-danger error-text property_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_address"> Property Address  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="property_address" type="text" placeholder="Enter Property Address"></textarea>
                                    <span class="text-danger error-text property_address_err"></span>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="mauja"> Mauja <span class="text-danger">*</span></label>
                                    <input class="form-control" name="mauja" type="text" placeholder="Enter Mauja">
                                    <span class="text-danger error-text mauja_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="sheet_no"> Serve No./ Sheet No  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="sheet_no" type="text" placeholder="Enter Sheet No">
                                    <span class="text-danger error-text sheet_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="plot_no"> Plot No. <span class="text-danger">*</span></label>
                                    <input class="form-control" name="plot_no" type="text" placeholder="Enter Plot No">
                                    <span class="text-danger error-text plot_no_err"></span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="area"> Area[sq/m] <span class="text-danger">*</span></label>
                                    <input class="form-control" name="area" type="number" placeholder="Enter Area">
                                    <span class="text-danger error-text area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ready_reckoner_rate"> Ready Reckoner Rate  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="ready_reckoner_rate" type="number" placeholder="Enter Ready Reckoner Rate">
                                    <span class="text-danger error-text ready_reckoner_rate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="valuation"> Valuation <span class="text-danger">*</span></label>
                                    <input class="form-control" name="valuation" type="number" placeholder="Enter Valuation">
                                    <span class="text-danger error-text valuation_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="unit_type"> Unit Type </label><br>
                                    <input type="radio" name="unit_type" value="one_unit" checked="checked"> One Unit 
                                    <input type="radio" name="unit_type" value="multiple_units"> Multiple Unit
                                    <span class="text-danger error-text unit_type_err"></span>
                                </div>
                            </div>
                            
                            <!--------------------------------Add more Start----------------------------->
                            <div class="panel panel-footer">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Unit No </th>
                                                <th>Area </th>
                                                <th>Floor</th>
                                                <th>Type Of use</th>
                                                <th>Estate </th>
                                                <th>Lease/Rent </th>
                                                <th>Document </th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td><input type="text" name="unit_no[]" class="form-control" multiple=""></td>    
                                            <td><input type="number" name="area_filed[]" class="form-control" multiple=""></td>    
                                            <td><input type="text" name="floor[]" class="form-control" multiple=""></td>    
                                            <td>   
                                                <select class="js-example-basic-single form-control" name="type_of_use_id[]" id="type_of_use_id" >
                                                    <option value="">--Select Type Of Use--</option>
                                                      @foreach ($type_of_use as $data)
                                                        <option value="{{ $data->id  }}">{{ $data->type_of_use }}</option>
                                                      @endforeach
                                                </select>  
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="estate_id[]" id="estate_id" >
                                                    <option value="">--Select Estate--</option>
                                                      @foreach ($estates as $data)
                                                        <option value="{{ $data->id  }}">{{ $data->estate_name }}</option>
                                                      @endforeach
                                                </select>  
                                            </td>    
                                            <td nowrap>
                                                <input type="radio" name="lease_rent[]" value="lease" class="" multiple=""> Lease
                                                <input type="radio" name="lease_rent[]" value="rent" class="" multiple="">  Rent 
                                                <input type="radio" name="lease_rent[]" value="self_owner" class="" multiple=""> Self Owner
                                            </td>    
                                            <td><input type="file" name="document[]" class="form-control" multiple=""></td>    
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->
                            
                            <div class="mb-4 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="source_id"> Source <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="source_id">
                                            <option value="">--Select Source--</option>
                                            @foreach ($sources as $source)
                                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text source_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="development_status"> Development Status</label><br>
                                    <input type="radio" name="development_status" value="developed" > Developed 
                                    <input type="radio" name="development_status" value="undeveloped" > Undeveloped
                                    <span class="text-danger error-text development_status_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_acquisition"> Date of Acquisition <span class="text-danger">*</span></label>
                                    <input class="form-control" name="date_of_acquisition" type="date" placeholder="Enter Date of Acquisition">
                                    <span class="text-danger error-text valuation_err"></span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="remark"> Remark <span class="text-danger">*</span></label>
                                     <textarea class="form-control" name="remark" ></textarea>
                                    <span class="text-danger error-text remark_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="latitude"> Latitude </label>
                                    <input class="form-control" name="latitude" type="text" placeholder="Enter Latitude" > 
                                    <span class="text-danger error-text latitude_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="longitude"> Longitude </label>
                                    <input class="form-control" name="longitude" type="text" placeholder="Enter Longitude" > 
                                    <span class="text-danger error-text longitude_err"></span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_photo_upload"> Property Photo Upload </label>
                                    <input class="form-control " name="property_photo_upload" type="file" accept="application/pdf, image/png, image/jpeg,  image/jpg" placeholder="Choose File">
                                    <span class="text-danger error-text property_photo_upload_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="dp_plan_upload"> Dp Plan Upload </label>
                                    <input class="form-control " name="dp_plan_upload" type="file" accept="application/pdf, image/png, image/jpeg,  image/jpg" placeholder="Choose File">
                                    <span class="text-danger error-text dp_plan_upload_err"></span>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('property-registration.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('property-registration.index') }}';
                        });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

        function resetErrors() {
            $('span.error-text').text('');
            $('input, select, textarea').removeClass('is-invalid');
        }

        function printErrMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '_err').text(value);
                $('#' + key).addClass('is-invalid');
                $('#' + key).removeClass('is-valid');
            });
        }

    });
</script>

{{-- Add More Form --}}
<script>
  $('.addMoreForm').on('click',function(){
    addMoreForm();
  });

  var rowId = 1; 
  function addMoreForm() {
    var tr = '<tr id="row_' + rowId + '">' +
        '<td><input type="text" name="unit_no[]" class="form-control" multiple=""></td>' +
        '<td><input type="number" name="area_filed[]" class="form-control" multiple=""></td>' +
        '<td><input type="text" name="floor[]" class="form-control" multiple=""></td>' +
        '<td><select class="js-example-basic-single form-control" name="type_of_use_id[]"  id="type_of_use_id_' + rowId + '" ><option value="">--Select Type Of Use--</option>@foreach ($type_of_use as $data)<option value="{{ $data->id }}">{{ $data->type_of_use }}</option>@endforeach</select></td>' +
        '<td><select class="js-example-basic-single form-control" name="estate_id[]" id="estate_id_' + rowId + '"><option value="">--Select Estate--</option>@foreach ($estates as $data)<option value="{{ $data->id  }}">{{ $data->estate_name }}</option>@endforeach</select></td>' +
        '<td><input type="radio" name="lease_rent[' + rowId + ']" value="lease" class="" multiple=""> Lease <input type="radio" name="lease_rent[' + rowId + ']" value="rent" class="" multiple=""> Rent <input type="radio" name="lease_rent[' + rowId + ']" value="self_owner" class="" multiple=""> Self Owner </td>' +
        '<td><input type="file" name="document[]" class="form-control" multiple=""></td>' +
        '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
        '<tr>';

    $('#addMore').append(tr); 
    $('#type_of_use_id_' + rowId + ', #estate_id_' + rowId).select2();   // Reinitialize Select2 for the new row
    rowId++;
}

  $(document).on('click', '.removeAddMore', function () {
    if ($(this).parents('table').find('.removeAddMore').length > 1) {
        $(this).parent().parent().remove();
    } else {
        alert("Cannot remove the last element.");
    }        
  });
</script>


{{-- Function to show/hide based on radio button value --}}
<script>
    function toggleButtons(unitType) {
        $('.addMoreForm, .removeAddMore').toggle(unitType === 'multiple_units');
        $('#addMore tr:not(:first-child)').remove(); // Remove additional rows in one_unit mode
        if (unitType === 'one_unit') {
           $('#addMore input,select,file').val('').trigger('change');
           $('#addMore input[type="radio"]').prop('checked', false).trigger('change');
        }
    }

    var initialUnitType = $('input[name="unit_type"]:checked').val();
    toggleButtons(initialUnitType);

    $('input[name="unit_type"]').change(function () {
        var selectedUnitType = $(this).val();
        toggleButtons(selectedUnitType);
    });
</script>


