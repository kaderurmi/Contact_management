@extends('layouts.app')

@section('content')
 <div class="edit">
    <h1>Edit Contact</h1>
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $contact->name }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $contact->email }}" required>
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $contact->phone }}">
        <label>Address:</label>
        <input type="text" name="address" value="{{ $contact->address }}">
        <button  class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Update</button>
    </form>
</div>
@endsection
