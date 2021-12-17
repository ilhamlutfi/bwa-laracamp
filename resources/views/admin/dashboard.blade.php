@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-5">
                    <div class="card-header">
                        My Camps
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register</th>
                                    <th>Paid Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkouts as $checkout)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $checkout->User->name }}</td>
                                        <td>{{ $checkout->Camp->title }}</td>
                                        <td>${{ $checkout->Camp->price }}k</td>
                                        <td>{{ $checkout->created_at->format('M d Y') }}</td>
                                        <td>
                                            @if ($checkout->payment_status == 'paid')
                                                <span class="badge bg-success">{{ $checkout->payment_status }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ $checkout->payment_status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection