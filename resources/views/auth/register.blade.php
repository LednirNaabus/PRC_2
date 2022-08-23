<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div class="grid md:grid-cols-2 sm:grid-cols-12 text-sm">

                <div class="mt-0 p-2">
                    <label for="client_name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Establishment Name <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <x-jet-input id="client_name" class="block mt-1 w-full" type="text" name="client_name" :value="old('client_name')" required autofocus/>
                </div>

                <div class="mt-0 p-2">
                    <label for="account_type" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Establishment Type <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <select name="account_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                    <option value="1">School</option>
                    <option value="2">Hospital</option>
                    </select>
                </div>

            </div>  

            <div class="grid md:grid-cols-1 sm:grid-cols-12 text-sm">
    
                <div class="mt-0 p-2">
                    <label for="client_address" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Establishment Address <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <x-jet-input id="client_address" class="block mt-1 w-full" type="text" name="client_address" :value="old('client_address')" required/>
                </div>

            </div>   

            <div class="grid md:grid-cols-1 sm:grid-cols-12 text-sm">

                <div class="mt-0 p-2">
                    <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Representative Name <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required/>
                </div>

            </div>    

             

            <div class="hidden grid md:grid-cols-2 sm:grid-cols-12 text-sm">
    
                <div class="mt-0 p-2">
                    <label for="position" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Position <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <x-jet-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')"/>
                </div>

            
            </div>

            <div class="grid md:grid-cols-2 sm:grid-cols-12 text-sm">

                <div class="mt-0 p-2">
                    <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Email <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" autocomplete="email" required/>
                    

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                </div>

                <div class="mt-0 p-2">
                    <label for="mobile_number" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Contact <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <x-jet-input id="mobile_number" maxlength="11" class="block mt-1 w-full" type="text" name="mobile_number" :value="old('mobile_number')" required/>
                
                    @error('mobile_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
                
                </div>

            </div>

            <div class="grid md:grid-cols-2 sm:grid-cols-12 text-sm">

                <div class="mt-0 p-2">
                    <label for="password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Password <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-0 p-2">
                    <label for="password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Confirm Password <small class="animated flash text-danger" style="font-size: 6px; padding: 1px; color:#ff0000">Required</small></label>
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var startTimer;
        var startTimer1;

        $('#email').on('keyup', function () {
            clearTimeout(startTimer);
            let email = $(this).val();
            startTimer = setTimeout(checkEmail, 500, email);
        });

        $('#email').on('keydown', function () {
            clearTimeout(startTimer);
        });

        function checkEmail(email) {
            $('#email-error').remove();
            if (email.length > 1) {
                $.ajax({
                    type: 'post',
                    url: "{{ route('checkEmail') }}",
                    data: {
                        email: email,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success == false) {
                            $('#email').after('<div id="email-error" class="text-danger" <strong>'+data.message[0]+'<strong></div>');
                        } else {
                            $('#email').after('<div id="email-error" class="text-success" <strong>'+data.message+'<strong></div>');
                        }

                    }
                });
            } else {
                $('#email').after('<div id="email-error" class="text-danger" <strong>Email address can not be empty.<strong></div>');
            }
        }



        $('#mobile_number').on('keyup', function () {
            clearTimeout(startTimer);
            let mobile_number = $(this).val();
            startTimer1 = setTimeout(checkMobile, 500, mobile_number);
        });

        $('#mobile_number').on('keydown', function () {
            clearTimeout(startTimer1);
        });


        function checkMobile(mobile_number) {
            $('#mobile_number-error').remove();
            if (mobile_number.length > 1) {
                $.ajax({
                    type: 'post',
                    url: "{{ route('checkMobile') }}",
                    data: {
                        mobile_number: mobile_number,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success == false) {
                            $('#mobile_number').after('<div id="mobile_number-error" class="text-danger" <strong>'+data.message[0]+'<strong></div>');
                        } else {
                            $('#mobile_number').after('<div id="mobile_number-error" class="text-success" <strong>'+data.message+'<strong></div>');
                        }

                    }
                });
            } else {
                $('#mobile_number').after('<div id="mobile_number-error" class="text-danger" <strong>Mobile Number can not be empty.<strong></div>');
            }
        }    



    });
</script>
