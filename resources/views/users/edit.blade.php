<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<x-app-layout>
    <x-slot name="header">
    </x-slot>

<div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">
    
    <div class="grid grid-cols-12 bg-white ">

        <div class="col-span-12 px-3 text-center py-6 flex space-x-2 border-b border-solid md:space-x-0 md:space-y-2 md:flex-col md:col-span-2 md:justify-start overflow-x-scroll scrollber-container custom-scrollbar">
            <a href="{{ route('users.index') }}" class="text-sm p-1 bg-indigo-900 text-white text-center rounded font-bold" title="Users">User</a>

            @if (Auth::user()->user_type=="1" || Auth::user()->user_type=="2")      
                <a href="{{ route('users.registration') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="Registration for Approval">Registration for Approval</a>
            @endif
        </div>
  
      <div class="col-span-12 h-full md:col-span-10">
        <div class="px-4 pt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('PUT')
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md p-2 bg-white">
                    @include('layouts.alert')                            
                    <div class="grid md:grid-cols-3 sm:grid-cols-12 text-white text-sm leading-6">
 
                        <div class="hidden px-4 py-2 bg-white sm:p-2">
                            

                            <label for="last_name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Last Name <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="last_name" id="last_name" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full"
                                value="{{ old('last_name', $user->last_name) }}" />
                            @error('last_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="hidden px-4 py-2 bg-white sm:p-2">
                            <label for="first_name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">First Name <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="first_name" id="first_name" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full"
                                value="{{ old('first_name', $user->first_name) }}" />
                            @error('first_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="hidden px-4 py-2 bg-white sm:p-2">
                            <label for="middle_name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Middle Name</label>
                            <input type="text" name="middle_name" id="middle_name" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" 
                                value="{{ old('middle_name', $user->middle_name) }}" />
                            @error('middle_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>    

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="client_name"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Establishment Name <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="client_name" id="client_name" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" required 
                                value="{{ old('client_name', $user->client_name) }}" />
                            @error('client_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>    

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="client_address"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Establishment Address <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="client_address" id="client_address" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" required 
                                value="{{ old('client_address', $user->client_address) }}" />
                            @error('client_address')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>  
                    
                    <div class="grid md:grid-cols-3 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class=" px-4 py-2 bg-white sm:p-2 col-span-1">
                            <label for="name"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Representative Name <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="name" id="name" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full"  
                                value="{{ old('name', $user->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="hidden px-4 py-2 bg-white sm:p-2 col-span-1">
                            <label for="position"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Position <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="position" id="position" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" 
                                value="{{ old('position', $user->position) }}" />
                            @error('position')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Email <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full"
                                value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="grid md:grid-cols-3 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-1">
                            <label for="mobile_number" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Mobile No. <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="mobile_number" id="mobile_number" maxlength='11' class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full"
                                value="{{ old('mobile_number', $user->mobile_number) }}" autocomplete="off" data-mask="00000000000" required/>
                            @error('mobile_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="account_type" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Account Type <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <select name="account_type" id="account_type" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2">
                            <option value="" @if (""==old('account_type', $user->account_type)) selected @endif>Admin</option>
                            <option value="1" @if ("1"==old('account_type', $user->account_type)) selected @endif>School</option>
                            <option value="2" @if ("2"==old('account_type', $user->account_type)) selected @endif>Hospital</option>
                            </select>
                            @error('account_type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="user_type" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Role <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <select name="user_type" id="user_type" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2">
                            @if (Auth::user()->user_type<>"2")
                                <option value="1" @if ("1"==old('user_type', $user->user_type)) selected @endif>System Administrator</option>
                            @endif
                            <option value="2" @if ("2"==old('user_type', $user->user_type)) selected @endif>User Administrator</option>
                            <option value="3" @if ("3"==old('user_type', $user->user_type)) selected @endif>Level 1 Accreditor</option>
                            <option value="4" @if ("4"==old('user_type', $user->user_type)) selected @endif>Level 2 Accreditor</option>
                            <option value="6" @if ("6"==old('user_type', $user->user_type)) selected @endif>Surveyor</option>
                            <option value="5" @if ("5"==old('user_type', $user->user_type)) selected @endif>Client</option>
                            </select>
                            @error('user_type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Update User
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
  
  
    </div>
  </div>
</x-app-layout>  