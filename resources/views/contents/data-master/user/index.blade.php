{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-body">
                    <table class="table table-bordered table-checkable" id="table-user">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Styles Section --}}
@push('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush


{{-- Scripts Section --}}
@push('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            let tblUser = $('#table-user').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('data-master.user.list') }}",
                method: "GET",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'posisi',
                        render: (data) => {
                            return `<span class="label label-lg font-weight-bold label-light-warning label-inline">${data}</span>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'create_by',
                        name: 'create_by'
                    },
                    {
                        data: 'create_date',
                        name: 'create_date'
                    },
                    {
                        data: 'username',
                        render: (data) => {
                            const btn =
                                `<a href="#" name="deleteUser" class="btn btn-danger btn-xs btn-block waves-effect waves-light" data-name="${data}">Delete</a>`;
                            return btn;
                        }
                    },
                ]
            });

            $(document).on("click", "a[name='deleteUser']", function() {
                let nama = $(this).attr('data-name');
                return deleteUser(nama);
            });

            const deleteUser = (nama) => {
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((res) => {
                    if (res.isConfirmed) {
                        $.ajax({
                            url: "{{ config('app.api.url') }}delete_user",
                            method: "POST",
                            timeout: 0,
                            headers: {
                                "Authorization": authorization,
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            data: {
                                "username[]": nama,
                                "username[]": nama
                            },
                            success: (res) => {
                                tblUser.ajax.reload();
                                swal.fire(
                                    'Deleted!',
                                    `${res.status.msg}`,
                                    'success'
                                );
                            }
                        });
                    }
                });
            };
        });

    </script>
@endpush
