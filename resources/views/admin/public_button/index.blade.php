@extends('layouts.admin.app', ['title' => 'Public Button', 'parent' => 'master'])
@section('title', 'Public Button')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card" style="min-height:100vh">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h4>Public Button</h4>
                        <button type="button" class="btn btn-lg rounded btn-outline-primary z-depth-0" onClick="createData();">
                            <i class="fas fa-add mr-2"></i>
                            Create
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr />
                    </div>
                </div>
                <div class="row">
                    @foreach($data as $datas)
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <div class="card rounded-circle bg-primary rounded-circle" style="width: 100px; height: 100px">
                                                <div class="card-body d-flex justify-content-center align-items-center">
                                                    <i class="{{ $datas->icon }}" style="font-size: 50px"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <span class="text-muted">{{ Str::limit($datas->url, 30) }}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <button type="button" class="btn btn-md rounded btn-outline-primary btn-block">
                                                <i class="fas fa-circle mr-1"></i>
                                                Visit
                                            </button>
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-md rounded btn-outline-warning btn-block" onClick="updateData('{{ $datas->id }}')">
                                                <i class="fas fa-pen mr-1"></i>
                                            </button>
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-md rounded btn-outline-danger btn-block" onClick="deleteData('{{ $datas->id }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="modal fade" id="push_button" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body bg-primary d-flex justify-content-center">
                                <h3 style="font-weight: 500">Create Public Button</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" name="icon" class="form-control" id="icon" style="height: 50px;">
                            <quote class="text-muted">Ex: fas fa-icon, fas fa-user, u can find these icon using <a href="https://icons.getbootstrap.com/" target="_blank">this example</a>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" id="url" style="height: 50px;">
                            <quote class="text-muted">Ex: https://instagram.com/lolypoly</quote>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-end">
                        <button type="button" class="btn btn-lg btn-primary rounded z-depth-0" onClick="storeData()">
                            <i class="fas fa-paper-plane mr-1"></i>
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('body-scripts')
<script>
    var submitValue = "";
    var setId = "";

    function createData() {
        $('#push_button').modal('show');
        submitValue = "Create";
    }

    function updateData(id) {
        submitValue = "Update";
        setId = id;
        $.ajax({
            method: 'POST',
            url: '/temporary/public_button/by_id/' + id,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#url').val(response.data.url);
                $('#icon').val(response.data.icon);
                $('#push_button').modal('show');
                console.log(response);
            }
        });
    }

    function deleteData(id) {
        submitValue = "Delete";
        setId = id;
        storeData();
    }

    function storeData() {
        var store = "";
        var url = $('#url').val();
        var icon = $('#icon').val();

        console.log(setId);

        if(submitValue == "Create") {
            store = "create";
        }
        else if(submitValue == "Update") {
            store = "update/" + setId;
        }
        else if(submitValue == "Delete") {
            store = "delete/" + setId;
        }

        const data = {
            icon: icon,
            url: url,
        };

        $.ajax({
            method: 'POST',
            url: '/temporary/public_button/' + store,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            success:function(response) {
                console.log(response);
                if(response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.messages,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    
                    emptyModal();
                }
                else {
                    Swal.fire({
                        title: 'Failed!',
                        text: response.messages,
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    }

    function emptyModal() {
        $('#push_button').modal('hide');
        $('#url').val("");
        $('#icon').val("");
        location.reload();
    }
</script>
@endpush
@endsection