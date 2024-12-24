<x-admin.layout>
    <x-slot name="title">Application For Rental Properties</x-slot>
    <x-slot name="heading">Application For Rental Properties</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="mb-3 row">
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
                                    <label class="col-form-label" for="allotment_no"> Allotment No <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="allotment_no">
                                            <option value="">--Select Unit No--</option>
                                    </select>
                                    <span class="text-danger error-text allotment_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="caste"> Catse  <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="caste">
                                            <option value="">--Select Caste--</option>
                                            @foreach ($castes as $caste)
                                                <option value="{{ $caste->id }}">{{ $caste->name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text caste_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="party_id"> Party Name <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="party_id">
                                            <option value="">--Select Party Name--</option>
                                            @foreach ($partys as $party)
                                                <option value="{{ $party->id }}">{{ $party->party_name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text party_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhaar_no"> Aadhaar No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="aadhaar_no" value="" type="text" placeholder="Aadhaar No" disabled></input>
                                    <span class="text-danger error-text aadhaar_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pancard_no"> Pancard No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="pancard_no" value="" type="text" placeholder="Pancard No" disabled></input>
                                    <span class="text-danger error-text pancard_no_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no"> Mobile No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="mobile_no" value="" type="text" placeholder="Mobile No" disabled></input>
                                    <span class="text-danger error-text mobile_no_err"></span>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label" for="party_address"> Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="party_address" value="" type="text"  placeholder="Address" disabled></textarea>
                                    <span class="text-danger error-text party_address_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="shared"> Shared  <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="shared">
                                        <option value="">--Select--</option>
                                        <option value="handicapped">Handicapped</option>
                                        <option value="citizen">Citizen</option>
                                        <option value="ex-serviceman">Ex-serviceman</option>
                                    </select>
                                    <span class="text-danger error-text shared_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="nature_of_buisness"> Nature of buisness <span class="text-danger">*</span></label>
                                    <input class="form-control" name="nature_of_buisness" value="" type="text" placeholder="Nature of buisness"></input>
                                    <span class="text-danger error-text nature_of_buisness_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="type_of_allotment"> Type of allotment <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="type_of_allotment">
                                        <option value="">--Select--</option>
                                        <option value="others">Others</option>
                                        <option value="ota">Ota</option>
                                        <option value="complex">Complex</option>
                                        <option value="hall">Hall</option>
                                    </select>
                                    <span class="text-danger error-text type_of_allotment_err"></span>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contract_duration"> Contract Duration <span class="text-danger">*</span></label>
                                    <input class="form-control" name="contract_duration" value="" type="text" placeholder="Contract Duration"></input>
                                    <span class="text-danger error-text contract_duration_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_date"> From Date <span class="text-danger">*</span></label>
                                    <input class="form-control" name="from_date" value="" type="date" ></input>
                                    <span class="text-danger error-text from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_date"> To Date<span class="text-danger">*</span></label>
                                    <input class="form-control" name="to_date" value="" type="date" ></input>
                                    <span class="text-danger error-text to_date_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rent_per_month"> Rent per Month <span class="text-danger">*</span></label>
                                    <input class="form-control" name="rent_per_month" value="" type="text" placeholder="Rent per Month"></input>
                                    <span class="text-danger error-text rent_per_month_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rent_increase"> Rent Increase <span class="text-danger">*</span></label>
                                    <input class="form-control" name="rent_increase" value="" type="text" placeholder="Rent Increase" ></input>
                                    <span class="text-danger error-text rent_increase_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rent_increase_type"> Type of allotment <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="rent_increase_type">
                                        <option value="">--Select--</option>
                                        <option value="sure">Sure</option>
                                        <option value="percentage">Percentage</option>
                                    </select>
                                    <span class="text-danger error-text rent_increase_type_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="increament_increase"> Increament Increase <span class="text-danger">*</span></label>
                                    <input class="form-control" name="increament_increase" value="" type="text" placeholder="Increament Increase"></input>
                                    <span class="text-danger error-text increament_increase_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rule_id"> Payment Terms <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="zone_id">
                                            <option value="">--Select--</option>
                                            @foreach ($rules as $rule)
                                                <option value="{{ $rule->id }}">{{ $rule->name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text rule_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="biling_type_id"> Billing Type <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="biling_type_id">
                                            <option value="">--Select--</option>
                                            @foreach ($biling_types as $biling_type)
                                                <option value="{{ $biling_type->id }}">{{ $biling_type->type }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text biling_type_id_err"></span>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="deposite"> Deposite <span class="text-danger">*</span></label>
                                    <input class="form-control" name="deposite" value="" type="text" placeholder="Deposite"></input>
                                    <span class="text-danger error-text deposite_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agrement_file_upload"> Agrement File Upload	 <span class="text-danger">*</span></label>
                                    <input class="form-control" name="agrement_file_upload" value="" type="file" ></input>
                                    <span class="text-danger error-text agrement_file_upload_err"></span>
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
        <div class="row" id="editContainer" style="display:none;">
            <div class="col">
                <form class="form-horizontal form-bordered" method="post" id="editForm" enctype="multipart/form-data">
                    @csrf
                    <section class="card">
                        <header class="card-header">
                            <h4 class="card-title">Edit Application For Rent</h4>
                        </header>

                        <div class="card-body py-2">

                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
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
                                    <label class="col-form-label" for="allotment_no"> Allotment No <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="allotment_no">
                                            <option value="">--Select Unit No--</option>
                                    </select>
                                    <span class="text-danger error-text allotment_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="caste"> Catse  <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="caste">
                                            <option value="">--Select Caste--</option>
                                            @foreach ($castes as $caste)
                                                <option value="{{ $caste->id }}">{{ $caste->name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text caste_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="party_reg_id"> Party Name <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="party_reg_id">
                                            <option value="">--Select Party Name--</option>
                                            @foreach ($partys as $party)
                                                <option value="{{ $party->id }}">{{ $party->party_name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text party_reg_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhaar_no"> Aadhaar No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="aadhaar_no" value="" type="text" placeholder="Aadhaar No" disabled></input>
                                    <span class="text-danger error-text aadhaar_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pancard_no"> Pancard No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="pancard_no" value="" type="text" placeholder="Pancard No" disabled></input>
                                    <span class="text-danger error-text pancard_no_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no"> Mobile No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="mobile_no" value="" type="text" placeholder="Mobile No" disabled></input>
                                    <span class="text-danger error-text mobile_no_err"></span>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label" for="party_address"> Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="party_address" value="" type="text"  placeholder="Address" disabled></textarea>
                                    <span class="text-danger error-text party_address_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="shared"> Shared  <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="shared">
                                        <option value="">--Select--</option>
                                        <option value="handicapped">Handicapped</option>
                                        <option value="citizen">Citizen</option>
                                        <option value="ex-serviceman">Ex-serviceman</option>
                                    </select>
                                    <span class="text-danger error-text shared_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="nature_of_buisness"> Nature of buisness <span class="text-danger">*</span></label>
                                    <input class="form-control" name="nature_of_buisness" value="" type="text" placeholder="Nature of buisness"></input>
                                    <span class="text-danger error-text nature_of_buisness_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="type_of_allotment"> Type of allotment <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="type_of_allotment">
                                        <option value="">--Select--</option>
                                        <option value="others">Others</option>
                                        <option value="ota">Ota</option>
                                        <option value="complex">Complex</option>
                                        <option value="hall">Hall</option>
                                    </select>
                                    <span class="text-danger error-text type_of_allotment_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contract_duration"> Contract Duration <span class="text-danger">*</span></label>
                                    <input class="form-control" name="contract_duration" value="" type="text" placeholder="Contract Duration"></input>
                                    <span class="text-danger error-text contract_duration_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_date"> From Date <span class="text-danger">*</span></label>
                                    <input class="form-control" name="from_date" value="" type="date" ></input>
                                    <span class="text-danger error-text from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_date"> To Date<span class="text-danger">*</span></label>
                                    <input class="form-control" name="to_date" value="" type="date" ></input>
                                    <span class="text-danger error-text to_date_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rent_per_month"> Rent per Month <span class="text-danger">*</span></label>
                                    <input class="form-control" name="rent_per_month" value="" type="text" placeholder="Rent per Month"></input>
                                    <span class="text-danger error-text rent_per_month_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rent_increase"> Rent Increase <span class="text-danger">*</span></label>
                                    <input class="form-control" name="rent_increase" value="" type="text" placeholder="Rent Increase" ></input>
                                    <span class="text-danger error-text rent_increase_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rent_increase_type"> Type of allotment <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="rent_increase_type">
                                        <option value="">--Select--</option>
                                        <option value="sure">Sure</option>
                                        <option value="percentage">Percentage</option>
                                    </select>
                                    <span class="text-danger error-text rent_increase_type_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="increament_increase"> Increament Increase <span class="text-danger">*</span></label>
                                    <input class="form-control" name="increament_increase" value="" type="text" placeholder="Increament Increase"></input>
                                    <span class="text-danger error-text increament_increase_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rule_id"> Payment Terms <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="zone_id">
                                            <option value="">--Select--</option>
                                            @foreach ($rules as $rule)
                                                <option value="{{ $rule->id }}">{{ $rule->name }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text rule_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="biling_type_id"> Billing Type <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="biling_type_id">
                                            <option value="">--Select--</option>
                                            @foreach ($biling_types as $biling_type)
                                                <option value="{{ $biling_type->id }}">{{ $biling_type->type }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text biling_type_id_err"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="deposite"> Deposite <span class="text-danger">*</span></label>
                                    <input class="form-control" name="deposite" value="" type="text" placeholder="Deposite"></input>
                                    <span class="text-danger error-text deposite_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agrement_file_upload"> Agrement File Upload	 <span class="text-danger">*</span></label>
                                    <input class="form-control" name="agrement_file_upload" value="" type="file" ></input>
                                    <span class="text-danger error-text agrement_file_upload_err"></span>
                                </div>
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


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Zone Name</th>
                                        <th>Allotment No</th>
                                        <th>Party Name</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Rent Per Month</th>
                                        <th>Rent Increase</th>
                                        <th>Deposite</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $application->zone->name }} </strong></td>
                                            <td><strong> {{ $application->allotment_no }} </strong></td>
                                            <td><strong> {{ $application->party->party_name }} </strong></td>
                                            <td><strong> {{ $application->from_datetime }} </strong></td>
                                            <td><strong> {{ $application->to_datetime }} </strong></td>
                                            <td><strong> {{ $application->rent_per_month }} </strong></td>
                                            <td><strong> {{ $application->rent_increase }} </strong></td>
                                            <td><strong> {{ $application->deposite }} </strong></td>
                                            <td>
                                                <button class="edit-element btn btn-primary px-2 py-1" title="Edit application" data-id="{{ $application->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-dark rem-element px-2 py-1" title="Delete application" data-id="{{ $application->id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
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
            url: '{{ route('application-for-rental-properties.store') }}',
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
                            window.location.href = '{{ route('application-for-rental-properties.index') }}';
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
        var model_id = $(this).attr("data-id");
        var url = "{{ route('application-for-rental-properties.edit', ":model_id") }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                console.log(data.application_for_rent.deposit);
                $("#addContainer").slideUp();
                $("#btnCancel").show();
                $("#addToTable").hide();
                $("#editContainer").slideDown();

                if (!data.error)
                {
                    $("#editForm input[name='edit_model_id']").val(data.application_for_rent.id);
                    $("#editForm select[name='zone_id']").html(data.zoneHtml);
                    $("#editForm select[name='property_reg_id']").html(data.propertyHtml);
                    $("#editForm select[name='unit_no']").html(data.unitHtml);
                    $("#editForm select[name='party_reg_id']").html(data.partyHtml);
                    $("#editForm input[name='reason_of_use']").val(data.application_for_rent.reason_of_use);
                    $("#editForm input[name='from_datetime']").val(data.application_for_rent.from_datetime);
                    $("#editForm input[name='to_datetime']").val(data.application_for_rent.to_datetime);
                     //table data
                    $("#edit_document").html(data.fileHtml);
                    $("#editForm textarea[name='remark']").html(data.application_for_rent.remark);
                    $("#editForm input[name='deposit']").val(data.application_for_rent.deposit);
                    $("#editForm input[name='rent']").val(data.application_for_rent.rent);
                    $("#editForm input[name='discount']").val(data.application_for_rent.discount);
                    $("#editForm input[name='net_payable']").val(data.application_for_rent.net_payable);
                    $("#editForm input[name='cgst']").val(data.application_for_rent.cgst);
                    $("#editForm input[name='sgst']").val(data.application_for_rent.sgst);
                    $("#editForm input[name='actual_amount']").val(data.application_for_rent.actual_amount);
                    //property details
                    $("#editForm input[name='aadhaar_no']").val(data.propertyDetails.aadhaar_no);
                    $("#editForm input[name='pancard_no']").val(data.propertyDetails.pancard_no);
                    $("#editForm input[name='address']").val(data.propertyDetails.address);
                    $("#editForm input[name='mobile_no']").val(data.propertyDetails.mobile_no);
                    $("#editForm textarea[name='party_address']").html(data.propertyDetails.address);
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


<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('application-for-rental-properties.update', ":model_id") }}";
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
                                window.location.href = '{{ route('application-for-rental-properties.index') }}';
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
            title: "Are you sure to delete this application rental properties?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('application-for-rental-properties.destroy', ":model_id") }}";

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



<!-- Get Party Details -->
<script>
    $("select[name='party_id']").change( function(e) {
        e.preventDefault();

        var model_id = $(this).val();
        var url = "{{ route('application-for-rents.party-detail', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR)
            {
                if (!data.error)
                {
                    $("input[name='aadhaar_no']").val(data.party.aadhaar_no);
                    $("input[name='pancard_no']").val(data.party.pancard_no);
                    $("input[name='mobile_no']").val(data.party.mobile_no);
                    $("textarea[name='party_address']").val(data.party.address);
                } else {
                    swal("Error!", data.error, "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Some thing went wrong", "error");
            },
        });
    });
</script>



