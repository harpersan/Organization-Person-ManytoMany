@extends('layouts.app')

@section('content')
<div class="bg-gray-200 min-h-screen pt-2 font-mono my-16">
   <div class="container mx-auto">
       <div class="inputs w-full max-w-2xl p-6 mx-auto">
           <h2 class="text-2xl text-gray-900">Register</h2>
           <form class="mt-6 border-t border-gray-400 pt-4" method="POST" action="/store-person">
            @csrf
               <div class='flex flex-wrap -mx-3 mb-6'>
                   <div class='w-full md:w-full px-3 mb-6'>
                       <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>email address</label>
                       <input name="email" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='email' placeholder='Enter email'  required>
                   </div>
                   <div class='w-full md:w-full px-3 mb-6'>
                       <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>first name</label>
                       <input name="first_name" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter first name'  required>
                   </div>
                   <div class='w-full md:w-full px-3 mb-6'>
                       <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>last name</label>
                       <input name="last_name" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter last name'  required>
                   </div>

                   <div class='w-full md:w-full px-3 mb-6'>
                     <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>pick organization</label>
                     @foreach ($organizations as $item)
                     <div class="flex items-center">
                        <input type="checkbox" name="organization[{{$item->id}}]" id="{{$item->name}}">
                        <label for="{{$item->name}}" class="ml-2">{{$item->name}}</label>
                     </div>
                     @endforeach
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
