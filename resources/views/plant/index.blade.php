@extends('layouts.app')
@section('title')
    plant
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column">
                <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">

                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="card-title card-title-dash">All Trainers</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-success btn-icon-text" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="ti-upload btn-icon-prepend"></i>
                                            Add
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive pt-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="table-success">
                                                    #
                                                </th>
                                                <th class="table-info">
                                                    plants
                                                </th>
                                                <th class="table-primary">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($plants as $plant)
                                                <tr>
                                                    <td class="table-success">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="table-info">
                                                        {{ $plant->name }}

                                                    </td>

                                                    <td class="table-primary">
                                                        <a type="button" href="{{ url("plant/delete/{$plant->id}") }}"
                                                            class="btn btn-danger btn-rounded p-2" title="Delete">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>

                                                        <a type="button" class="btn btn-sm btn-dark edit-btn"
                                                            data-id="{{ $plant->id }}" data-name="{{ $plant->name }}"
                                                            data-bs-toggle="modal" data-bs-target="#edit-modal"
                                                            href="{{ url("plant/edit/{$plant->id}") }}" title="Edit">
                                                            <i class="mdi mdi-lead-pencil"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New plant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('plant') }}" id="add-form">
                    @csrf
                    <div class="form-group">
                        <label for="plant">New plant</label>
                        <input type="text" class="form-control" id="plant" name="name"
                            placeholder="plant...   " required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="add-form">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit plant -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit plant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('plant.edit') }}" id="edit-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name </label>
                            <input type="text" name="name" class="form-control">
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="edit-form" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

{{-- </section> --}}
<!-- js -->

@section('scripts')
    <script>
        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');


            $("#edit-form input[name|='id']").val(id)
            $("#edit-form input[name|='name']").val(name)

        })
    </script>
@endsection
