@extends('layouts.app')

@section('content')
    <h1>Order Hub</h1>
    <p>
        <a href="{{route('shops.create')}}">Add shop</a><br>
    </p>
    <p>
        Filter:
        <a href="{{route('shops.index')}}">All</a>&nbsp;
        @foreach(\App\Enums\ShopStatus::cases() as $case)
            <a href="{{route('shops.index', ['status'=>$case->value])}}">{{$case->label()}}</a>&nbsp;
        @endforeach
    </p>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Url</th>
            <th>Status</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($shops as $shop)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$shop->name}}</td>
                <td><a href="{{$shop->url}}" target="_blank" rel="noopener noreferrer">{{$shop->url}}</a></td>
                <td>{{$shop->status->label()}}</td>
                <td><a href="{{route('shops.edit', $shop)}}">Edit</a></td>
                <td>
                    <form method="POST" action="{{ route('shops.destroy', $shop) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this shop?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No shops found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
