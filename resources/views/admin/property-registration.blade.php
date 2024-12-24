<x-admin.layout>
    <x-slot name="title"> Property Registration</x-slot>
    <x-slot name="heading"> Property Registration</x-slot>


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="mb-2 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="party_name">Name of the Party <span class="text-danger">*</span></label>
                                    <input class="form-control" name="party_name" type="text" placeholder="Enter Party Name">
                                    <span class="text-danger error-text party_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="buisness_name">Buisness Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="buisness_name" type="text" placeholder="Enter Buisness Name">
                                    <span class="text-danger error-text buisness_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="address"> Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" type="text" placeholder="Address"></textarea>
                                    <span class="text-danger error-text address_err"></span>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="mobile_no" type="text" placeholder="Enter Mobile No">
                                    <span class="text-danger error-text mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email">Email  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" type="text" placeholder="Enter Email">
                                    <span class="text-danger error-text email_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pancard_no"> Panncard No <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="pancard_no" type="text" oninput="autoCapitalize(this)" placeholder="e.g ACPEY9876S">
                                    <span class="text-danger error-text pancard_no_err"></span>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhaar_no"> Aadhaar No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="aadhaar_no" type="text" placeholder="Enter Aadhaar No">
                                    <span class="text-danger error-text aadhaar_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="gst_no"> GST No  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="gst_no" type="text" placeholder="Enter GST No">
                                    <span class="text-danger error-text gst_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="upload_document"> Upload Document <span class="text-danger">*</span></label>
                                    <input class="form-control" name="upload_document" type="file" accept="application/pdf, image/png, image/jpeg,  image/jpg" placeholder="Choose File">
                                    <span class="text-danger error-text upload_document_err"></span>
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



        {{-- Edit Form --}}
        <div class="row" id="editContainer" style="display:none;" >
            <div class="col">
                <form class="form-horizontal form-bordered" method="post" id="editForm" enctype="multipart/form-data">
                    @csrf
                    <section class="card">
                        <header class="card-header">
                            <h4 class="card-title">Edit Party Registration</h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="zone"> Zone <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="zone_id">
                                            <option value="">--Select Zone--</option>
                                    </select>
                                    <span class="text-danger error-text zone_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_type_id">Property Type <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="property_type_id">
                                            <option value="">--Select Property Type--</option>
                                    </select>
                                    <span class="text-danger error-text property_type_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_no"> Property No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="property_no" value="" type="text" placeholder="Property No" readonly></input>
                                    <span class="text-danger error-text property_no_err"></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
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
                            <div class="mb-3 row">
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
                            <div class="mb-3 row">
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
                                                <th style="visibility:hidden">Auto Id</th>
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
                                {{--  <tr>
                                            <td><input type="hidden" name="auto_id[]" class="form-control" multiple=""></td>    
                                            <td><input type="text" name="unit_no[]" class="form-control" multiple=""></td>    
                                            <td><input type="number" name="area_filed[]" class="form-control" multiple=""></td>    
                                            <td><input type="text" name="floor[]" class="form-control" multiple=""></td>    
                                            <td>   
                                                <select class="js-example-basic-single form-control" name="type_of_use_id[]" id="type_of_use_id" >
                                                    <option value="">--Select Type Of Use--</option>
                                                </select>  
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-control" name="estate[]" id="estate" >
                                                    <option value="">--Select Estate--</option>
                                                </select>  
                                            </td>    
                                            <td nowrap>
                                                <input type="radio" name="lease_rent[]" value="lease" class="" multiple=""> Lease
                                                <input type="radio" name="lease_rent[]" value="rent" class="" multiple="">  Rent 
                                                <input type="radio" name="lease_rent[]" value="self_owner" class="" multiple=""> Self Owner
                                            </td>    
                                            <td><input type="file" name="document[]" class="form-control" multiple=""></td>    
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr> --}}
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->
                            

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="source_id"> Source <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="source_id">
                                            <option value="">--Select Source--</option>
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

                            <div class="mb-3 row">
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


                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_photo_upload"> Property Photo Upload </label>
                                    <input class="form-control " name="property_photo_upload" type="file" accept="application/pdf, image/png, image/jpeg,  image/jpg" placeholder="Choose File">
                                    <span class="text-danger error-text property_photo_upload_err"></span>
                                    {{-- <span class="text-danger error-text" style="font-size:11px">Choose if want to replace existing file</span> --}}
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="dp_plan_upload"> Dp Plan Upload </label>
                                    <input class="form-control " name="dp_plan_upload" type="file" accept="application/pdf, image/png, image/jpeg,  image/jpg" placeholder="Choose File">
                                    <span class="text-danger error-text dp_plan_upload_err"></span>
                                    {{-- <span class="text-danger error-text" style="font-size:11px">Choose if want to replace existing file</span> --}}
                                </div>
                            </div>

                            <div class="mt-3 row">
                                <div class="col-md-4 mt-3" id="property_photo_upload"></div>
                                <div class="col-md-4 mt-3" id="dp_plan_upload"></div>
                            </div>




                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>


        
        <!-- Container-fluid starts-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                {{-- <div class="">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Property No </th>
                                        <th>Zone</th> 
                                        <th>Property Name</th> 
                                        <th>Address</th>
                                        <th>Date of Aquisition</th>
                                        <th>Source</th>
                                        <th>Unit Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($property_registration as $registration)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $registration->property_no }} </strong></td>
                                            <td><strong> {{ $registration->zone->name }} </strong></td>
                                            <td><strong> {{ $registration->property_name }} </strong></td>
                                            <td><strong> {{ Str::of($registration->property_address)->words(3,'...') }} </strong></td> 
                                            <td><strong> {{ date('d-m-Y',strtotime($registration->date_of_acquisition)) }} </strong></td>
                                            <td><strong> {{ $registration->source->name }} </strong></td>
                                            <td><strong> {{ $registration->unit_type == 'one_unit' ? 'One Unit' : 'Multiple Units'; }} </strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit registration" data-id="{{ $registration->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete registration" data-id="{{ $registration->id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends -->



</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('party-registration.store') }}',
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
                            window.location.href = '{{ route('party-registration.index') }}';
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
            var form = document.getElementById('addForm');
            var data = new FormData(form);
            for (var [key, value] of data) {
                $('.' + key + '_err').text('');
                $('#' + key).removeClass('is-invalid');
                $('#' + key).addClass('is-valid');
            }
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


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        $(".edit-element").show();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('property-registration.edit', ":model_id") }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                $("#addContainer").slideUp();
                $("#btnCancel").show();
                $("#addToTable").hide();
                $("#editContainer").slideDown();

                if (!data.error)
                {
                    $("#editForm input[name='edit_model_id']").val(data.PropertyRegistration.id);
                    $("#editForm select[name='zone_id']").html(data.zonesHtml);
                    $("#editForm select[name='property_type_id']").html(data.propertytypesHtml);
                    $("#editForm input[name='property_no']").val(data.PropertyRegistration.property_no);
                    $("#editForm input[name='old_property_no']").val(data.PropertyRegistration.old_property_no);
                    $("#editForm input[name='property_name']").val(data.PropertyRegistration.property_name);
                    $("#editForm textarea[name='property_address']").val(data.PropertyRegistration.property_address);
                    $("#editForm input[name='mauja']").val(data.PropertyRegistration.mauja);
                    $("#editForm input[name='sheet_no']").val(data.PropertyRegistration.sheet_no);
                    $("#editForm input[name='plot_no']").val(data.PropertyRegistration.plot_no);
                    $("#editForm input[name='area']").val(data.PropertyRegistration.area);
                    $("#editForm input[name='ready_reckoner_rate']").val(data.PropertyRegistration.ready_reckoner_rate);
                    $("#editForm input[name='valuation']").val(data.PropertyRegistration.valuation);
                    $("#editForm select[name='source_id']").html(data.sourcesHtml);
                    $("#editForm input[name='date_of_acquisition']").val(data.PropertyRegistration.date_of_acquisition);
                    $("#editForm textarea[name='remark']").val(data.PropertyRegistration.remark);
                    $("#editForm input[name='latitude']").val(data.PropertyRegistration.latitude);
                    $("#editForm input[name='longitude']").val(data.PropertyRegistration.longitude);
                    data.PropertyRegistration.development_status == 'developed' ? $("#editForm input[name='development_status'][value='developed']").prop("checked", true) :
                     $("#editForm input[name='development_status'][value='undeveloped']").prop("checked", true) ;
                    data.PropertyRegistration.unit_type == 'one_unit' ? $("#editForm input[name='unit_type'][value='one_unit']").prop("checked", true) :
                     $("#editForm input[name='unit_type'][value='multiple_units']").prop("checked", true) ;
                     
                     $("#property_photo_upload").html(data.fileHtml);
                     $("#dp_plan_upload").html(data.fileHtml1);
                    
                    //-----  Add More Form Edit -----
                     var typeOfUseOptions = JSON.parse(data.typeofuseJson);
                     var EstateOptions = JSON.parse(data.estateJson);

                        $('.addMoreForm').on('click',function(){
                            addMoreForm();
                        });

                        var rowId = 1; 
                        function addMoreForm() {
                            var tr = '<tr id="row_' + rowId + '">' +
                                '<td><input type="hidden" name="auto_id[]" class="form-control" multiple=""></td>' +
                                '<td><input type="text" name="unit_no[]" class="form-control" multiple=""></td>' +
                                '<td><input type="number" name="area_filed[]" class="form-control" multiple=""></td>' +
                                '<td><input type="text" name="floor[]" class="form-control" multiple=""></td>' +
                                '<td><select class="js-example-basic-single form-control" name="type_of_use_id[]" id="type_of_use_id_' + rowId + '">' +
                                '<option value="">--Select Type Of Use--</option>';
                                 typeOfUseOptions.forEach(function(option) {
                                    tr += '<option value="' + option.id + '">' + option.type_of_use + '</option>';
                                 });
                                 tr += '</select></td>' +
                                '<td><select class="js-example-basic-single form-control" name="estate_id[]" id="estate_id_' + rowId + '">' +
                                '<option value="">--Select Estate--</option>';
                                EstateOptions.forEach(function(option) {
                                    tr += '<option value="' + option.id + '">' + option.estate_name + '</option>';
                                 });
                                 tr += '</select></td>' +
                                '<td nowrap><input type="radio" name="lease_rent[' + rowId + ']" value="lease" class="" multiple=""> <b>Lease</b> <input type="radio" name="lease_rent[' + rowId + ']" value="rent" class="" multiple=""><b> Rent</b> <input type="radio" name="lease_rent[' + rowId + ']" value="self_owner" class="" multiple=""> <b> Self Owner</b> </td>' +
                                '<td><input type="file" name="document[]" class="form-control" multiple=""></td>' +
                                '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
                                '<tr>';

                            $('#addMore').append(tr); 
                            $('#type_of_use_id_' + rowId + ', #estate_id_' + rowId).select2();   // Reinitialize Select2 for the new row
                            rowId++;
                        }

                        $(document).on('click', '.removeAddMore', function () {
                                $(this).parent().parent().remove();    
                        });
                    //-----  Add More Form Edit -----
                    
                    //Add more previous selected
                    var tableBody = $('#addMore');
                    tableBody.empty();
                    tableBody.append(data.tableRows);
                    tableBody.find('.js-example-basic-single').select2();

                    
                    //radio button 
                    var selectedUnitType = $('input[name="unit_type"]:checked').val();
                    toggleButtons(selectedUnitType);
                }
                else
                {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
</script>



{{-- Function to show/hide based on radio button value --}}
<script>
    function toggleButtons(unitType) {
        if (unitType === 'one_unit') {
            $('.addMoreForm').hide(); // Hide additional form in one_unit mode
            $('#addMore tr:not(:first-child)').hide(); // Hide additional rows in one_unit mode
            // $('#addMore input, #addMore select, #addMore file, #addMore a').val('').trigger('change');
            // $('#addMore input[type="radio"]').prop('checked', false).trigger('change');
        }else {
            $('.addMoreForm').show(); // Show additional form in multiple_units mode
            $('#addMore tr:not(:first-child)').show(); // Show additional rows in multiple_units mode
        }
        $('.addMoreForm, .removeAddMore').toggle(unitType === 'multiple_units');
    }

    var initialUnitType = $('input[name="unit_type"]:checked').val();
    toggleButtons(initialUnitType);

    $('input[name="unit_type"]').change(function () {
        var selectedUnitType = $(this).val();
        toggleButtons(selectedUnitType);
    });
</script>

<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('property-registration.update', ":model_id") }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    $("#editSubmit").prop('disabled', false);
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
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

            function resetErrors() {
                var form = document.getElementById('editForm');
                var data = new FormData(form);
                for (var [key, value] of data) {
                    var field = key.replace('[]', '');
                    $('.' + field + '_err').text('');
                    $('#' + field).removeClass('is-invalid');
                    $('#' + field).addClass('is-valid');
                }
            }

            function printErrMsg(msg) {
                $.each(msg, function(key, value) {
                    var field = key.replace('[]', '');
                    $('.' + field + '_err').text(value);
                    $('#' + field).addClass('is-invalid');
                });
            }


        });
    });
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this property?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('property-registration.destroy', ":model_id") }}";

                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (!data.error && !data.error2) {
                            swal("Success!", data.success, "success")
                                .then((action) => {
                                    window.location.reload();
                                });
                        } else {
                            if (data.error) {
                                swal("Error!", data.error, "error");
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
        });
    });
</script>


<!-- Delete Add More Row -->
<script>
    $("#addMore").on("click", ".deleteAddMore", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this row?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('property-registration.delete-row', ":model_id") }}";

                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (!data.error && !data.error2) {
                            swal("Success!", data.success, "success")
                                .then((action) => {
                                    window.location.reload();
                                });
                        } else {
                            if (data.error) {
                                swal("Error!", data.error, "error");
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
        });
    });
</script>
