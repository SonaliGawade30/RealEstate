<x-admin.layout>
    <x-slot name="title">Application For Rent</x-slot>
    <x-slot name="heading">Application For Rent</x-slot>
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
                                    <label class="col-form-label" for="property_reg_id"> Property No <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="property_reg_id">
                                            <option value="">--Select Property No--</option>
                                            @foreach ($propertys as $property)
                                                <option value="{{ $property->id }}">{{ $property->property_no }}</option>
                                            @endforeach
                                    </select>
                                    <span class="text-danger error-text property_reg_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="unit_no"> Unit No <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="unit_no">
                                            <option value="">--Select Unit No--</option>
                                    </select>
                                    <span class="text-danger error-text unit_no_err"></span>
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
                                    <label class="col-form-label" for="reason_of_use"> Reason of use  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="reason_of_use" value="" type="text" placeholder="Reason of use"></input>
                                    <span class="text-danger error-text reason_of_use_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_datetime"> From Date/Time <span class="text-danger">*</span></label>
                                    <input class="form-control" name="from_datetime" value="" type="datetime-local" placeholder="From Date"></input>
                                    <span class="text-danger error-text from_datetime_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_datetime"> To Date/Time <span class="text-danger">*</span></label>
                                    <input class="form-control" name="to_datetime" value="" type="datetime-local" placeholder="To Date"></input>
                                    <span class="text-danger error-text to_datetime_err"></span>
                                </div>
                            </div>

                            <!-- <div class="row" style="">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="remark"> Remark <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="remark" name="remark"></textarea>
                                        <span class="text-danger error-text remark_err"></span>
                                    </div>
                                </div>
                            </div> -->

                            <!--------------------------------Table Start----------------------------->
                            <div class="table-responsive">
                                    <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                        <tbody>
                                            <tr>
                                                <td> 
                                                   <label class="col-form-label" for="remark"> Remark <span class="text-danger">*</span></label>
                                                   <textarea class="form-control" rows="5" cols="20" id="remark" name="remark"></textarea>
                                                   <span class="text-danger error-text remark_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold;">
                                                   <span class="text-danger">*</span> Deposit : 
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0" type="number" id="deposit" name="deposit" placeholder="$0.00">
                                                    <span class="text-danger error-text deposit_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Rent :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="rent" name="rent" placeholder="$0.00">
                                                    <span class="text-danger error-text rent_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Discount % :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right discount" type="number" id="discount" name="discount" placeholder="$0.00">
                                                    <span class="text-danger error-text discount_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Net Payable :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="net_payable" name="net_payable" placeholder="$0.00" readonly>
                                                    <span class="text-danger error-text net_payable_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Cgst :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="cgst" name="cgst" placeholder="$0.00">
                                                    <span class="text-danger error-text cgst_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                  <span class="text-danger">*</span> Sgst :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="sgst" name="sgst" placeholder="$0.00">
                                                    <span class="text-danger error-text sgst_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Actual Amount :
                                                </td>
                                                <td style="padding-right: 50px; font-size: 16px;width: 230px">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="actual_amount" name="actual_amount" placeholder="$0.00" readonly>
                                                    <span class="text-danger error-text actual_amount_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Contract Document :
                                                </td>
                                                <td style="padding-right: 50px; font-size: 16px;width: 230px">
                                                    <input class="form-control text-right" type="file" id="file" name="file">
                                                    <span class="text-danger error-text file_err"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>                               
                            </div>
                            <!--------------------------------Table End------------------------------->

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
                                    </select>
                                    <span class="text-danger error-text zone_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_reg_id"> Property No <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="property_reg_id">
                                            <option value="">--Select Property No--</option>
                                    </select>
                                    <span class="text-danger error-text property_reg_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="unit_no"> Unit No <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="unit_no">
                                            <option value="">--Select Unit No--</option>
                                    </select>
                                    <span class="text-danger error-text unit_no_err"></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="party_reg_id"> Party Name <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single col-sm-12" name="party_reg_id">
                                            <option value="">--Select Party Name--</option>
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
                                    <label class="col-form-label" for="reason_of_use"> Reason of use  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="reason_of_use" value="" type="text" placeholder="Reason of use"></input>
                                    <span class="text-danger error-text reason_of_use_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_datetime"> From Date/Time <span class="text-danger">*</span></label>
                                    <input class="form-control" name="from_datetime" value="" type="datetime-local" placeholder="From Date"></input>
                                    <span class="text-danger error-text from_datetime_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_datetime"> To Date/Time <span class="text-danger">*</span></label>
                                    <input class="form-control" name="to_datetime" value="" type="datetime-local" placeholder="To Date"></input>
                                    <span class="text-danger error-text to_datetime_err"></span>
                                </div>
                            </div>

                            <!--------------------------------Table Start-------------------------------->
                            <div class="table-responsive">
                                    <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                        <tbody>
                                            <tr>
                                                <td> 
                                                   <label class="col-form-label" for="remark"> Remark <span class="text-danger">*</span></label>
                                                   <textarea class="form-control" rows="5" cols="20" id="remark" name="remark"></textarea>
                                                   <span class="text-danger error-text remark_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold;">
                                                   <span class="text-danger">*</span> Deposit : 
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0" type="number" id="deposit" name="deposit" placeholder="$0.00">
                                                    <span class="text-danger error-text deposit_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Rent :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="rent" name="rent" placeholder="$0.00">
                                                    <span class="text-danger error-text rent_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Discount % :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right discount" type="number" id="discount" name="discount" placeholder="$0.00">
                                                    <span class="text-danger error-text discount_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Net Payable :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="net_payable" name="net_payable" placeholder="$0.00" readonly>
                                                    <span class="text-danger error-text net_payable_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Cgst :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="cgst" name="cgst" placeholder="$0.00">
                                                    <span class="text-danger error-text cgst_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                  <span class="text-danger">*</span> Sgst :
                                                </td>
                                                <td style="padding-right: 50px;">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="sgst" name="sgst" placeholder="$0.00">
                                                    <span class="text-danger error-text sgst_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Actual Amount :
                                                </td>
                                                <td style="padding-right: 50px; font-size: 16px;width: 230px">
                                                    <input class="form-control bg-light border-0 text-right" type="number" id="actual_amount" name="actual_amount" placeholder="$0.00" readonly>
                                                    <span class="text-danger error-text actual_amount_err"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                   <span class="text-danger">*</span> Contract Document :
                                                </td>
                                                <td style="padding-right: 50px; font-size: 16px;width: 230px">
                                                    <input class="form-control text-right" type="file" id="file" name="file">
                                                    <span class="text-danger error-text file_err"></span>
                                                    <div class="col-md-3 mt-3" id="edit_document"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>                               
                            </div>
                            <!--------------------------------Table End-------------------------------->


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
                                        <th>Property No</th>
                                        <th>Party Name</th>
                                        <th>Reason of use</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $application->zone->name }} </strong></td>
                                            <td><strong> {{ $application->property->property_no }} </strong></td>
                                            <td><strong> {{ $application->party->party_name }} </strong></td>
                                            <td><strong> {{ $application->reason_of_use }} </strong></td>
                                            <td><strong> {{ $application->from_datetime }} </strong></td>
                                            <td><strong> {{ $application->to_datetime }} </strong></td>
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
            url: '{{ route('application-for-rents.store') }}',
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
                            window.location.href = '{{ route('application-for-rents.index') }}';
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
        var url = "{{ route('application-for-rents.edit', ":model_id") }}";

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
            var url = "{{ route('application-for-rents.update', ":model_id") }}";
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
                                window.location.href = '{{ route('application-for-rents.index') }}';
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
            title: "Are you sure to delete this application?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('application-for-rents.destroy', ":model_id") }}";

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


<!-- Get units -->
<script>
    $("select[name='property_reg_id']").change( function(e) {
        e.preventDefault();

        var model_id = $(this).val();
        var url = "{{ route('application-for-rents.units', ':model_id') }}";

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
                    $("select[name='unit_no']").html(data.unitsHtml);
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



<!-- Get Party Details -->
<script>
    $("select[name='party_reg_id']").change( function(e) {
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

<!-- Table Calculation -->
<script>
    $(document).ready(function () {
        // Event listener for Rent and Discount fields
        $("#rent, #discount").on("input", function () {
            calculateNetPayable();
        });

        // Event listener for Deposit, Net Payable, CGST, and SGST fields
        $("#deposit, #net_payable, #cgst, #sgst").on("input", function () {
            calculateActualAmount();
        });

        // Function to calculate Net Payable
        function calculateNetPayable() {
            var rent = parseFloat($("#rent").val()) || 0;
            var discount = parseFloat($("#discount").val()) || 0;

            // Validate discount not greater than rent
            if (discount > rent) {
                $("#discount").val(rent.toFixed(2));
                discount = rent;
            }

            var netPayable = rent - discount;
            $("#net_payable").val(netPayable.toFixed(2));
            calculateActualAmount(); // Recalculate total amount when Net Payable changes
        }

        // Function to calculate Actual Amount
        function calculateActualAmount() {
            var deposite = parseFloat($("#deposit").val()) || 0;
            var netPayable = parseFloat($("#net_payable").val()) || 0;
            var cgst = parseFloat($("#cgst").val()) || 0;
            var sgst = parseFloat($("#sgst").val()) || 0;

            var actualAmount = deposite + netPayable + cgst + sgst;
            $("#actual_amount").val(actualAmount.toFixed(2));
        }
    });
</script>


