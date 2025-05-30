@extends('layouts.admin-layout')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light-subtle p-3 rounded-2">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">
                    <svg width="14" height="14" class="me-2 mb-1" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.15722 19.7714V16.7047C8.1572 15.9246 8.79312 15.2908 9.58101 15.2856H12.4671C13.2587 15.2856 13.9005 15.9209 13.9005 16.7047V16.7047V19.7809C13.9003 20.4432 14.4343 20.9845 15.103 21H17.0271C18.9451 21 20.5 19.4607 20.5 17.5618V17.5618V8.83784C20.4898 8.09083 20.1355 7.38935 19.538 6.93303L12.9577 1.6853C11.8049 0.771566 10.1662 0.771566 9.01342 1.6853L2.46203 6.94256C1.86226 7.39702 1.50739 8.09967 1.5 8.84736V17.5618C1.5 19.4607 3.05488 21 4.97291 21H6.89696C7.58235 21 8.13797 20.4499 8.13797 19.7714V19.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>

    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row ">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="mb-0">{{ $title }}</h4>
                        </div>

                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <select id="statusFilter" class="form-select form-select-sm" style="width: 150px;">
                                <option value="">Sort By Status</option>
                                <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="custom-table-effect table-responsive custom-table-search ">
                            <div class="table-responsive custom-table-search">
                                <table id="datatable" class="table table-striped " data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Book</th>
                                            <th>Amount</th>
                                            <th>Quantity</th>
                                            <th>Trx Ref</th>
                                            <th>Date Added</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-row align-items-center gap-2">
                                                    <img alt="Img" src="{{ $transaction->user->profile && $transaction->user->profile->profile_picture ? asset('profile/' . $transaction->user->profile->profile_picture) : 'https://placehold.co/124x124/000000/FFF?text=' . substr($transaction->user->name, 0, 1) }}" width="50" class="rounded-circle">
                                                    <p class="fw-medium text-sm mb-0">{{ $transaction->user->name }}</p>
                                                </div>
                                            </td>

                                            <td>
                                                {{ $transaction->book->title }}
                                            </td>
                                            <td>₦{{ number_format($transaction->amount) }}</td>
                                            <td>{{ $transaction->quantity }}</td>
                                            <td>{{ $transaction->transaction_ref }}</td>
                                            <td>{{ $transaction->created_at->format('jS F, Y') }}</td>
                                            <td>
                                                @if($transaction->status == 'success')
                                                    <a class="badge bg-success">
                                                        Success
                                                    </a>
                                                @else
                                                    <a class="badge bg-warning">
                                                        Pending
                                                    </a>
                                                @endif
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

    <script>
        document.getElementById('statusFilter').addEventListener('change', function() {
            const status = this.value;
            const url = new URL(window.location.href);

            if (status) {
                url.searchParams.set('status', status);
            } else {
                url.searchParams.delete('status');
            }

            window.location.href = url.toString();
        });
    </script>
@endsection
