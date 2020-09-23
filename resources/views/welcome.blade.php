@extends('layouts.app')

@section('content')
<div class="bg-gray-200 min-h-screen pt-2 font-mono my-16">
    <div class="flex justify-end pr-10">
        <a class="mr-5 text-blue-600 border p-2 rounded" href="/add-person">ADD PERSON</a>
        <a class="text-green-600 border p-2 rounded" href="/add-organization">ADD ORGANIZATION</a>
    </div>
   <div class="container mx-auto">
       <div class="inputs w-full max-w-2xl p-6 mx-auto">
           <h2 class="text-2xl text-gray-900">Person and Organization List</h2>
           <div class="mt-6 border-t border-gray-400 pt-4 mb-5">
               <h1 class="text-xl mb-2">Registered Person</h1>
               <div>
                   @foreach ($person as $item)
                   <div class="border-b border-gray-400 mb-3">
                    <div class="flex justify-between">
                        <h2>Name: {{$item->first_name}} {{$item->last_name}}</h2>
                        <div>
                            <a class="text-green-500" href="/edit-person/{{$item->id}}">EDIT</a>
                            <a class="text-red-500" href="/delete-person/{{$item->id}}">DELETE</a>
                        </div>
                    </div>   
                    <p>Email:{{$item->email}}</p>
                    <p>Organization:</p>
                        @foreach ($item->organizations as $org)
                          <p class="ml-5">{{ $org->name }}</p>
                        @endforeach
                   </div>
                   @endforeach
               </div>
           </div>

           <div class="mt-6 pt-4">
               <h1 class="text-xl mb-2">Organization List</h1>
               <div>
                   @foreach ($organization as $item)
                   <div class="border-b border-gray-400 mb-3">
                    <div class="flex justify-between">
                        <h2>Name: {{$item->name}}</h2>
                        <div>
                            <a class="text-green-500" href="/edit-organization/{{$item->id}}">EDIT</a>
                            <a class="text-red-500" href="/delete-organization/{{$item->id}}">DELETE</a>
                        </div>
                    </div>   
                    <p>Member:</p>
                        @foreach ($item->users as $person)
                          <p class="ml-5">{{$person->first_name}} {{$person->last_name}}</p>
                        @endforeach
                   </div>
                   @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
