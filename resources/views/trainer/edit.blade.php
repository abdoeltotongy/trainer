@extends('layouts.app')
@section('title', 'Update Trainer')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column">
                <div class="row flex-grow" style="justify-content: center;">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">


                            <div class="card-body">
                                <h4 class="card-title">Edit Trainer</h4>

                                <form class="forms-sample" action="{{ route('trainer.update', $trainer->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Username</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $trainer->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $trainer->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="intern_number">Intern Number</label>
                                                <input type="number" class="form-control" name="intern_number"
                                                    value="{{ $trainer->intern_number }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="national_id">National ID</label>
                                                <input type="number" class="form-control" name="national_id"
                                                    value="{{ $trainer->national_id }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="number" class="form-control" name="phone"
                                                    value="{{ $trainer->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="QR-code">QR Code</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="QR_code" id="QR_code"
                                                        readonly style="height: 50px;" value="{{ $trainer->QR_code }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm btn-dark"
                                                            style="padding: 15px !important ; width: 150px;"
                                                            type="button"onclick="generateRandomNumber()">Generate
                                                            Code</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="plant"> Plants</label>
                                                <select name="plant_id" class="form-control">
                                                    <option style="background-color: #fff">
                                                        {{ $trainer->plant->name }}</option>
                                                    <hr>
                                                    @foreach ($plants as $plant)
                                                        <option value="{{ $plant->id }}">
                                                            {{ $plant->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="division"> Division </label>
                                                <select name="division" class="form-control">
                                                    <option value="HR">HR </option>
                                                    <option value="Finance">Finance </option>
                                                    <option value="Technical">Technical </option>
                                                    <option value="IT">IT </option>
                                                    <option value="Legal">Legal </option>
                                                    <option value="Purchase">Purchase </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-sm-flex justify-content-end">
                                        <div>
                                            <button type="submit" class="btn btn-primary me-2">Update</button>
                                        </div>
                                    </div>
                                </form>
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
        function generateRandomNumber() {
            var randomNumber = Math.floor(Math.random() * 100000000);
            var formattedNumber = randomNumber.toString().padStart(8, '0');
            document.getElementById('QR_code').value = formattedNumber;
        }
    </script>
@endsection
