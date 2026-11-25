@extends('layouts.app')

@section('content')
    <h1>Order Hub</h1>
    <p>
        <a href="/shops">All</a><br>
        @foreach(\App\Enums\ShopStatus::cases() as $case)
            <a href="/shops?status={{$case->value}}">{{$case->label()}}</a><br>
        @endforeach
    </p>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Url</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @forelse($shops as $shop)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$shop->name}}</td>
                <td><a href="{{$shop->url}}" target="_blank" rel="noopener noreferrer">{{$shop->url}}</a></td>
                <td>{{$shop->status->label()}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No shops found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
