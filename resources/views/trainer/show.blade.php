@extends('layouts.app')
@section('title', 'Show Trainer')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column">
                <div class="row flex-grow" style="justify-content: center;">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">

                            <div class="card-body">
                                <h4 class="card-title">Show Info Trainer</h4>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input type="text" class="form-control" value="{{ $trainer->name }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" value="{{ $trainer->email }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="intern_number">Intern Number</label>
                                            <input type="number" class="form-control" value="{{ $trainer->intern_number }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="national_id">National ID</label>
                                            <input type="number" class="form-control" value="{{ $trainer->national_id }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="number" class="form-control" value="{{ $trainer->phone }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="QR-code">QR Code</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $trainer->QR_code }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="plant"> Plants</label>

                                            <input type="text" class="form-control" value="{{ $trainer->plant->name }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Division"> Division</label>

                                            <input type="text" class="form-control" value="{{ $trainer->division }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('trainer.index') }}" class="btn btn-success ">Return Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('scripts')
    <script></script>
@endsection
