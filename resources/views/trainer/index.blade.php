@extends('layouts.app')
@section('title', 'Trainer')
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
                                        <a class="btn btn-primary text-white mb-0 me-0" href="{{ route('trainer.create') }}">
                                            Add new </a>
                                    </div>
                                </div>
                                <div class="table-responsive mt-1">
                                    <table class="table select-table table-data" id="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>E-mail </th>
                                                <th>Intern Number </th>
                                                <th>National ID </th>
                                                <th>Division </th>
                                                <th>Phone </th>
                                                <th>Plant Name</th>
                                                <th>QR Code </th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trainers as $trainer)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $trainer->name }}</td>
                                                    <td>{{ $trainer->email }}</td>
                                                    <td>{{ $trainer->division }}</td>
                                                    <td>{{ $trainer->intern_number }}</td>
                                                    <td>{{ $trainer->national_id }}</td>
                                                    <td>{{ $trainer->phone }}</td>
                                                    <td>{{ $trainer->plant->name }}</td>
                                                    <td>{{ $trainer->QR_code }}</td>

                                                    <td>
                                                        <a href="{{ route('trainer.show', $trainer->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            Show
                                                        </a>
                                                        <a href="{{ route('trainer.edit', $trainer->id) }}"
                                                            class="btn btn-success btn-sm">
                                                            Edit
                                                        </a>
                                                        <button class="btn btn-danger  btn-sm" type="submit"
                                                            onclick="removeItem('{{ route('trainer.destroy', $trainer->id) }}')">
                                                            Delete
                                                        </button>
                                                        <form id="deleteItem" action="" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{ $trainers->links('inc.paginator') }} --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function removeItem(url, e) {
            Swal.fire({
                title: 'Do you want to Delete this Item?',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                confirmButtonColor: '#dc3545'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#deleteItem').attr("action", url);
                    $('#deleteItem').submit();
                    Swal.fire('Delete!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        };
    </script>
@endsection
