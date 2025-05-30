@extends('layouts.admin-layout')
@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">User List</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="custom-table-effect table-responsive custom-table-search user-table">
                                <table class=" mb-0 table table-bordered" id="datatable" data-toggle="data-table1">
                                    <thead class="">
                                    <tr class="bg-white">
                                        <th scope="col" class="border-bottom bg-primary text-white">Profile</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Name </th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Contact</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Email</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Country</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Status</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Company</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Join Date</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <img src="{{ $user->profile && $user->profile->profile_picture ? asset('profile/' . $user->profile->profile_picture) : 'https://placehold.co/124x124/000000/FFF?text=' . substr($user->name, 0, 1) }}" class="rounded img-fluid avatar-40" alt="">
                                                </td>

                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->profile->phone ?? 'Not added' }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->profile->address ?? 'Not added' }}</td>
                                                <td>
                                                    @if($user->active == 1)
                                                        <span class="text-success">
                                                            Active
                                                        </span>
                                                    @else
                                                        <span class="text-danger">
                                                            Banned
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>{{ $user->profile->bio ?? 'Not added' }}</td>
                                                <td>{{ $user->created_at->format('jS F, Y') }}</td>
                                                <td>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        @if($user->active == 1)
                                                            <form action="{{ route('admin.user.ban', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')

                                                                <button class="btn btn-primary-subtle px-1 py-1 rounded d-flex">
                                                                    <i class="ph ph-x-circle"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('admin.user.unban', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')

                                                                <button class="btn btn-danger-subtle px-1 py-1 rounded d-flex">
                                                                    <i class="ph ph-x-circle"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                        <a class="btn btn-danger-subtle px-1 py-1 rounded d-flex"
                                                           data-toggle="tooltip" data-placement="top" title="Delete" href="#">
                                                            <i class="ph ph-trash"></i>
                                                        </a>
                                                    </div>
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
@endsection
