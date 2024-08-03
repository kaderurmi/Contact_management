@extends('layouts.app')

@section('content')
<div id="details">
    <h1>Contact Details</h1>
    <p><span>Name: </span>{{ $contact->name }}</p>
    <p> <span>Email: </span> {{ $contact->email }}</p>
    <p><span>Phone:</span> {{ $contact->phone }}</p>
    <p><span>Address:</span> {{ $contact->address }}</p>
    <p><span>Created At:</span> {{ $contact->created_at }}</p>
    <p><span>Updated At:</span> {{ $contact->updated_at }}</p>

    <br>
    <a  class=" linkw bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button  class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Delete</button>
    </form>
    <a  class=" linkw bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ route('contacts.index') }}">Back to List</a>
</div>
@endsection
