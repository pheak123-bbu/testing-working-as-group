@extends('layouts.app')
@section('content')
    <style>
        .border-dashed {
            border: 2px dashed #ccc;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        @keyframes modalopen {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -0.5rem;
        }

        .form-col {
            flex: 1;
            padding: 0 0.5rem;
            min-width: 200px;
        }

        .image-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0 auto 1rem;
            border: 2px dashed #bbb;
            cursor: pointer;
            transition: all 0.2s;
        }

        .image-preview:hover {
            background-color: #e9e9e9;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-placeholder {
            color: #777;
            font-size: 14px;
            text-align: center;
        }
    </style>
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Users Details</h4>
                            </div><!--end col-->
                            <div class="col-auto">
                                <button type="button" class="btn bg-primary-subtle text-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalLarge">
                                    <a href="{{ route('user.create') }}"><i class="fas fa-plus me-1"></i>Add User</a>
                                </button>
                            </div><!--end col-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0" id="datatable_1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <h6>{{ $user->name }}</h6>
                                                </td>
                                                <td><a href="#" class="fs-12 text-primary">{{ $user->email }}</a>
                                                </td>
                                                <td>
                                                    <span @class([
                                                        'badge',
                                                        'bg-danger' => $user->role == 'purchaser',
                                                        'bg-primary' => $user->role == 'admin',
                                                        'bg-warning' => $user->role == 'checker',
                                                        'bg-success' => $user->role == 'distributor',
                                                        'bg-info' => $user->role == 'staff',
                                                        'bg-secondary' => !in_array($user->role, [
                                                            'admin',
                                                            'purchaser',
                                                            'distributor',
                                                            'checker',
                                                            'staff',
                                                        ]),
                                                    ])>{{ ucfirst($user->role) }}</span>
                                                </td>
                                                <td>
                                                    <p class="text-body text-decoration-none">
                                                        {{ $user->phone ?? 'Not Provided' }}
                                                    </p>
                                                </td>

                                                <td class="text-end">
                                                    <a href="{{ route('user.edit', $user->id) }}"><i
                                                            class="las la-pen text-secondary fs-18"></i></a>
                                                    <a href="javascript:void(0);"
                                                        onclick="confirmDelete({{ $user->id }})"><i
                                                            class="las la-trash-alt text-secondary fs-18"></i></a>
                                                    <form id="delete-form-{{ $user->id }}"
                                                        action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div><!-- container -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: "#5dc522",
                });
            </script>
        @endif

        @if ($errors->any())
            <script>
                let errorMessages = @json($errors->all());
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Failed',
                    html: errorMessages.map(msg => `<div>${msg}</div>`).join(''),
                    confirmButtonColor: '#dc3545',
                });
            </script>
        @endif

        <script>
            function confirmDelete(userId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This user will be deleted permanently.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#22c54f',
                    cancelButtonColor: '#f12c37',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + userId).submit();
                    }
                });
            }
        </script>
    @endsection
