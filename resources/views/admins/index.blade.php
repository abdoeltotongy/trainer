@extends('layouts.app')
@section('title')
    Users
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
                                        <h4 class="card-title card-title-dash">All Users</h4>
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
                                                    Name
                                                </th>
                                                <th class="table-info">
                                                    Email
                                                </th>

                                                <th class="table-info">
                                                    Rules
                                                </th>

                                                <th class="table-primary">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="table-success">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="table-info">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td class="table-info">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="table-info">
                                                        {{ $user->role }}
                                                    </td>

                                                    @if ($user->role == 'SuperAdmin')
                                                        <td class="table-primary"> Can Not Access
                                                        </td>
                                                    @else
                                                        <td class="table-primary">
                                                            <a type="button" href="{{ url("user/delete/{$user->id}") }}"
                                                                class="btn btn-danger btn-rounded p-2" title="Delate">
                                                                <i class="mdi mdi-delete"></i>
                                                            </a>
                                                            <a type="button" class="btn btn-sm btn-dark edit-btn"
                                                                data-id="{{ $user->id }}"
                                                                data-name="{{ $user->name }}"
                                                                data-email="{{ $user->email }}"
                                                                data-role="{{ $user->role }}"
                                                                data-password="{{ $user->password }}" data-bs-toggle="modal"
                                                                data-bs-target="#edit-modal"
                                                                href="{{ url("user/edit/{$user->id}") }}" title="Edit">
                                                                <i class="mdi mdi-lead-pencil"></i>
                                                            </a>

                                                        </td>
                                                    @endif
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
    </section>
    <!-- add account -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('users.store') }}" id="add-form">
                        @csrf
                        <div class="form-group">
                            <label for="user">User Name</label>
                            <input type="text" class="form-control" id="user" name="name"
                                placeholder="user...   " required />
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="E-mail...   " required />
                        </div>
                        <div class="form-group">
                            <label for="Password"> Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password...   " required />
                        </div>
                        <div class="form-group">
                            <label for="Role"> Role </label>
                            <select name="role" class="form-control">

                                <option value="Admin">
                                    Admin
                                </option>
                                <option value="SuperAdmin">
                                    Super Admin
                                </option>
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="add-form">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Account -->
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('user.edit') }}" id="edit-form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name </label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>E-mail </label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password </label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Role"> Role </label>
                                <select name="role" class="form-control">
                                    <option value="SuperAdmin">
                                        Super Admin
                                    </option>
                                    <option value="Admin">
                                        Admin
                                    </option>
                                </select>
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
@endsection

@section('scripts')
    <script>
        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let email = $(this).attr('data-email');
            let role = $(this).attr('data-role');
            let password = $(this).attr('data-password');


            $("#edit-form input[name|='id']").val(id)
            $("#edit-form input[name|='name']").val(name)
            $("#edit-form input[name|='email']").val(email)
            $("#edit-form input[name|='role']").val(role)
            $("#edit-form input[name|='password']").val(password)


        })
    </script>
@endsection
