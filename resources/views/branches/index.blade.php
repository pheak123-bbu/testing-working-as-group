@extends('layouts.app')
@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Branches Details</h4>
                            </div><!--end col-->
                            <div class="col-auto">
                                <form class="row g-2">
                                    <div class="col-auto">
                                        <button type="button" class="btn bg-primary-subtle text-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModalLarge">
                                                <a href="{{ route('branches.create') }}"><i class="fas fa-plus me-1"></i>Add Branch</a>
                                        </button>
                                    </div><!--end col-->
                                </form>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($branches as $branch)
                                        <tr>
                                            <td>{{ $branch->id }}</td>
                                            <td>
                                                <h6>{{ $branch->name }}</h6>
                                            </td>
                                            <td><a href="#" class="fs-12 text-primary">{{ $branch->email }}</a>
                                            </td>
                                            <td>
                                                <p class="text-body text-decoration-none">
                                                    {{ $branch->address ?? 'Not Provided' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-body text-decoration-none">
                                                    {{ $branch->phone ?? 'Not Provided' }}
                                                </p>
                                            </td>

                                            <td class="text-end">
                                                <a href="{{ route('branches.edit', $branch->id) }}"><i
                                                        class="las la-pen text-secondary fs-18"></i></a>
                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete({{ $branch->id }})"><i
                                                        class="las la-trash-alt text-secondary fs-18"></i></a>
                                                <form id="delete-form-{{ $branch->id }}"
                                                    action="{{ route('branches.destroy', $branch->id) }}" method="POST"
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
