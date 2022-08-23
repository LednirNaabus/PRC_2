<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://unpkg.com/flowbite@1.3.4/dist/datepicker.js"></script>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

<div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">
    
    
        <div class="px-4 pt-4">
            <form method="post" action="{{ route('events.update', $event->id) }}">
                @method('PUT')
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md p-2 bg-white">
                    @include('layouts.alert')                            
                    
                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="client"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Client<small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <select name="client_id" id="client_id" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" required>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @if ($client->id==old('client_id', $event->client_id)) selected @endif>{{ strtoupper($client->client_name) }}</option>
                                @endforeach        
                            </select>    
                            @error('client_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div> 

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="title"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Title<small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="title" id="title" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" required 
                                value="{{ old('title', $event->title) }}" />
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>    
                    
                    <div date-rangepicker class="grid md:grid-cols-2 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="start" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Start Date <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input name="start" type="text" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" placeholder="Select start date" value="{{ old('start', date('m/d/Y', strtotime($event->start))) }}" required readonly>
                        </div>
                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="end" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">End Date<small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input name="end" type="text" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" placeholder="Select date end" value="{{ old('end', date('m/d/Y', strtotime($event->end))) }}" required readonly>
                        </div>

                    </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Update Status
                        </button>
                    </div>
                </div>
            </form>
        
  
  
    </div>
  </div>
</x-app-layout>  
