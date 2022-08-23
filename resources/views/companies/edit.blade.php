<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">
        <div class="grid grid-cols-12 bg-white ">
            <div class="col-span-12 px-3 text-center py-6 flex space-x-2 border-b border-solid md:space-x-0 md:space-y-2 md:flex-col md:col-span-2 md:justify-start overflow-x-scroll scrollber-container custom-scrollbar">
                <a href="{{ route('companies.edit',1) }}" class="text-sm p-1 bg-indigo-900 text-white text-center rounded font-bold">Company Info</a>
                <a href="{{ route('departments.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Department</a>
                <a href="{{ route('positions.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Position</a>
                <a href="{{ route('schedules.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Schedule</a>
                <a href="{{ route('rates.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Rate</a>
                <a href="{{ route('leaves.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Leave</a>
                <a href="{{ route('holidays.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Holiday</a>
                <a href="{{ route('ssss.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">SSS</a>
                <a href="{{ route('phics.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Philhealth</a>
                <a href="{{ route('hdmfs.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">PAG-IBIG</a>
                <a href="{{ route('taxs.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">W/Tax</a>
                <a href="{{ route('incomes.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Other Income</a>
                <a href="{{ route('deductions.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Other Deduction</a>
                <a href="{{ route('assets.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Asset</a>
                <a href="{{ route('awards.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Award</a>
            </div>

            <div class="col-span-12 h-full md:col-span-10">
                <div class="px-4 pt-4">
                    <form method="post" action="{{ route('companies.update', 1) }}">
                        @method('PUT')
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md p-2 bg-white">
                            @include('layouts.alert')                            
                            <div class="grid grid-cols-1 text-white text-sm leading-6">
         
                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Company Name <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                                    <input type="text" name="name" id="name" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;" required
                                        value="{{ old('name', $company->name) }}" />
                                    @error('name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
        
                            </div>    

                            <div class="grid md:grid-cols-none sm:grid-cols-12 text-white text-sm leading-6">

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="address" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Address <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                                    <textarea name="address" id="address" class="form-input rounded-md shadow-sm mt-1 p-2 text-gray-900 w-full" rowspan="3" required>{{ old('address', $company->address) }}</textarea>
                                    @error('address')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
        
                            </div>  

                            <div class="grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">
         
                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="zip" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">ZIP Code</label>
                                    <input type="text" name="zip" id="zip" maxlength="5" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('zip', $company->zip) }}" />
                                    @error('zip')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="rdo" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">RDO</label>
                                    <input type="text" name="rdo" id="rdo" maxlength="10" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('rdo', $company->rdo) }}" />
                                    @error('rdo')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="hdmf_code" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">HDMF Code</label>
                                    <input type="text" name="hdmf_code" id="hdmf_code" maxlength="1" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('hdmf_code', $company->hdmf_code) }}" />
                                    @error('hdmf_code')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="tin" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Employer Type</label>
                                    <select name="employer_type" id="employer_type" class="block rounded-md shadow-sm mt-1 block w-full">
                                    <option value="P" @if ("P"==old('employer_type', $company->employer_type)) selected @endif>PRIVATE</option>
                                    <option value="G" @if ("G"==old('employer_type', $company->employer_type)) selected @endif>GOVERNMENT</option>
                                    <option value="O" @if ("O"==old('employer_type', $company->employer_type)) selected @endif>SELF PAYING, EMPLOYED</option>
                                    </select>
                                    @error('roles')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
        
                            </div>

                            <div class="grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">
         
                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="sss" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">SSS</label>
                                    <input type="text" name="sss" id="sss" maxlength="12" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('sss', $company->sss) }}" placeholder="XX-XXXXXXX-X" autocomplete="off" data-mask="00-0000000-0" />
                                    @error('sss')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="phic" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Philhealth</label>
                                    <input type="text" name="phic" id="phic" maxlength="14" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('phic', $company->phic) }}" placeholder="XX-XXXXXXXXX-X" autocomplete="off" data-mask="00-000000000-0" />
                                    @error('phic')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="hdmf" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">PAG-IBIG</label>
                                    <input type="text" name="hdmf" id="hdmf" maxlength="14" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('hdmf', $company->hdmf) }}" placeholder="XXXX-XXXX-XXXX" autocomplete="off" data-mask="0000-0000-0000" />
                                    @error('hdmf')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="tin" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">TIN</label>
                                    <input type="text" name="tin" id="tin" maxlength="11" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('tin', $company->tin) }}" placeholder="XXX-XXX-XXX" autocomplete="off" data-mask="000-000-000" />
                                    @error('tin')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
        
                            </div> 

                            <div class="grid md:grid-cols-2 sm:grid-cols-12 text-white text-sm leading-6">
         
                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="contact_person" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Contact Person <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                                    <input type="text" name="contact_person" id="contact_person" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;" required
                                        value="{{ old('contact_person', $company->contact_person) }}" />
                                    @error('contact_person')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="fax_number" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Fax Number</label>
                                    <input type="text" name="fax_number" id="fax_number" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('fax_number', $company->fax_number) }}" />
                                    @error('fax_number')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
        
                            </div>  

                            <div class="grid md:grid-cols-2 sm:grid-cols-12 text-white text-sm leading-6">
         
                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="telephone_number" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Telephone Number</label>
                                    <input type="text" name="telephone_number" id="telephone_number" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('telephone_number', $company->telephone_number) }}" />
                                    @error('telephone_number')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="mobile_number" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Mobile Number</label>
                                    <input type="text" name="mobile_number" id="mobile_number" maxlength="14" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;"
                                        value="{{ old('mobile_number', $company->mobile_number) }}" placeholder="(XXXX)XXX-XXX" autocomplete="off" data-mask="(0000)000-0000"/>
                                    @error('mobile_number')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
        
                            </div> 

                            <div class="grid grid-cols-1 text-white text-sm leading-6">
         
                                <div class="px-4 py-2 bg-white sm:p-2">
                                    <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Email <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                                    <input type="text" name="email" id="email" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" style="width:100%;" required
                                        value="{{ old('email', $company->email) }}" />
                                    @error('email')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
        
                            </div>
        
                            
        
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>




        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $(document).ready(function() {
        $('#employer_type').select2();

        $('#sss').mask('00-0000000-0');
        $('#phic').mask('00-000000000-0');
        $('#hdmf').mask('0000-0000-0000');
        $('#tin').mask('000-000-000');

        $('#mobile_number').mask('(0000)000-0000');
    });
    
</script>