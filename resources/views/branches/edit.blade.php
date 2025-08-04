@extends('layouts.app')
@section('content')
    <style>
        .form-container {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }

        .form-title {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            font-weight: 600;
            text-align: center;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <div class="form-container">
                    <h2 class="form-title">Update Branch</h2>
                    <form action="{{ route('branches.update', $branches->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Form Fields Column -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Branch Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old ('name', $branches->name)}}" required>
                                    <small class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old ('email', $branches->email)}}" required>
                                    <small class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{old ('address', $branches->address)}}" required>
                                    <small class="text-danger">
                                        @error('address')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{old ('phone', $branches->phone)}}" required>
                                    <small class="text-danger">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{old ('password', $branches->password)}}" required>
                                    <small class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" value="{{old ('password_confirmation', $branches->password)}}" required>
                                    <small class="text-danger">
                                        @error('password_confirmation')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                

                                <div class="col-12 text-end">
                                    <button type="submit" class="btn bg-primary-subtle text-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalLarge">
                                        Update
                                    </button>
                                    <button type="button" class="btn bg-danger-subtle text-danger">
                                        <a href="{{ route('branches.index') }}" style="color: inherit;">Cancel</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
