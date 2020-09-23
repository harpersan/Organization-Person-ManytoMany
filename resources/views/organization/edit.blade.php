@extends('layouts.app')

@section('content')
<div class="bg-gray-200 min-h-screen pt-2 font-mono my-16">
   <div class="container mx-auto">
       <div class="inputs w-full max-w-2xl p-6 mx-auto">
           <h2 class="text-2xl text-gray-900">Edit Organization</h2>
       <form class="mt-6 border-t border-gray-400 pt-4" method="POST" action="/update-organization/{{ $organization->id }}">
            @csrf
               <div class='flex flex-wrap -mx-3 mb-6'>
                   <div class='w-full md:w-full px-3 mb-6'>
                       <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Organization Name</label>
                   <input value="{{ $organization->name }}" name="name" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter organization'  required>
                   </div>
                  <div class="pl-3">
                     <button class="appearance-none bg-gray-200 text-gray-900 px-4 py-1 shadow-sm border border-gray-400 rounded-md mr-3" type="submit">Save</button>
                  </div>
                   </div>
               </div>
           </form>
       </div>
   </div>
</div>
@endsection
