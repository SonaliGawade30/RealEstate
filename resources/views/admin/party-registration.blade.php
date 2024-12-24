<x-admin.layout>
    <x-slot name="title"> Party Registration</x-slot>
    <x-slot name="heading"> Party Registration</x-slot>


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
                                    <label class="col-form-label" for="edit_party_name">Name of the Party <span class="text-danger">*</span></label>
                                    <input class="form-control" name="edit_party_name" type="text" placeholder="Enter Party Name">
                                    <span class="text-danger error-text edit_party_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_buisness_name">Buisness Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="edit_buisness_name" type="text" placeholder="Enter Buisness Name">
                                    <span class="text-danger error-text edit_buisness_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_address"> Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="edit_address" type="text" placeholder="Address"></textarea>
                                    <span class="text-danger error-text edit_address_err"></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_mobile_no">Mobile No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="edit_mobile_no" type="text" placeholder="Enter Mobile No">
                                    <span class="text-danger error-text edit_mobile_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_email">Email  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="edit_email" type="text" placeholder="Enter Email">
                                    <span class="text-danger error-text edit_email_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_pancard_no"> Panncard No <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="edit_pancard_no" type="text" oninput="autoCapitalize(this)" placeholder="e.g ACPEY9876S">
                                    <span class="text-danger error-text edit_pancard_no_err"></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_aadhaar_no"> Aadhaar No <span class="text-danger">*</span></label>
                                    <input class="form-control" name="edit_aadhaar_no" type="text" placeholder="Enter Aadhaar No">
                                    <span class="text-danger error-text edit_aadhaar_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_gst_no"> GST No  <span class="text-danger">*</span></label>
                                    <input class="form-control" name="edit_gst_no" type="text" placeholder="Enter GST No">
                                    <span class="text-danger error-text edit_gst_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_upload_document"> Upload Document <span class="text-danger">*</span></label>
                                    <input class="form-control mb-3" name="edit_upload_document" type="file" accept="application/pdf, image/png, image/jpeg,  image/jpg" placeholder="Choose File">
                                    <a class="btn btn-sm btn-primary" target="_blank" href="">View Document</a>
                                    <span class="text-danger error-text edit|_upload_document_err"></span>
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


        
        <!-- Container-fluid starts-->
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
                                        <th>Party Name</th>
                                   {{-- <th>Buisness Name</th> --}}
                                        <th>Address</th> 
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Pancard No</th>
                                        <th>Aadhaar No</th>
                                        <th>GST No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($party_registration as $registration)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong> {{ $registration->party_name }} </strong></td>
                                       {{-- <td><strong> {{ $registration->buisness_name }} </strong></td> --}}
                                            <td><strong> {{ Str::of($registration->address)->words(3,'...') }} </strong></td> 
                                            <td><strong> {{ $registration->email }} </strong></td>
                                            <td><strong> {{ $registration->mobile_no }} </strong></td>
                                            <td><strong> {{ $registration->pancard_no }} </strong></td>
                                            <td><strong> {{ $registration->aadhaar_no }} </strong></td>
                                            <td><strong> {{ $registration->gst_no }} </strong></td>
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

{{-- automatically capitalize input --}}
<script>
    function autoCapitalize(input) {
        input.value = input.value.toUpperCase();
    }
</script>

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
        var url = "{{ route('party-registration.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.PartyRegistration.id);
                    $("#editForm input[name='edit_party_name']").val(data.PartyRegistration.party_name);
                    $("#editForm input[name='edit_buisness_name']").val(data.PartyRegistration.buisness_name);
                    $("#editForm textarea[name='edit_address']").val(data.PartyRegistration.address);
                    $("#editForm input[name='edit_mobile_no']").val(data.PartyRegistration.mobile_no);
                    $("#editForm input[name='edit_email']").val(data.PartyRegistration.email);
                    $("#editForm input[name='edit_pancard_no']").val(data.PartyRegistration.pancard_no);
                    $("#editForm input[name='edit_aadhaar_no']").val(data.PartyRegistration.aadhaar_no);
                    $("#editForm input[name='edit_gst_no']").val(data.PartyRegistration.gst_no);
                    $("#editForm a.btn-primary").attr('href', data.imagePath);
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
            var url = "{{ route('party-registration.update', ":model_id") }}";
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
                                window.location.href = '{{ route('party-registration.index') }}';
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
            title: "Are you sure to delete this party?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('party-registration.destroy', ":model_id") }}";

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
