<x-guest-layout>
    <div class="flex justify-center place-items-center h-screen">
        <div class="w-96">
            <x-card>
                <div class="flex flex-row place-items-center justify-center my-4">
                    @if (App::environment('production'))
                        <div class="flex pt-0 border-r-2 mr-2">
                            <x-tiffey::icon.logo class="h-16 w-auto pt-3 mr-2"/> 
                        </div> 
                        <div class="text-brand-mid mr-6">
                            <a class="not-decorated" href="/">
                                {{config('app.name')}}
                            </a>
                        </div>
                    @else
                        <div class="flex pt-0 border-r-2 mr-2">
                            <x-tiffey::icon.logo class="h-16 w-auto pt-3 mr-2"/> 
                        </div>
                        <div class="text-black bg-brand-mid mr-6 px-1">
                            <a class="not-decorated" href="/">
                                {{config('app.name')}} - {{ App::environment() }}
                            </a>
                        </div>
                    @endif
                </div>
                
                <x-tiffey::validation-errors />
        
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-success-mid">
                        {{ session('status') }}
                    </div>
                @endif
        
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="block">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-tiffey::input type="password" label="Password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-input type="password" label="Confirm Password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-tiffey::form-button>
                            {{ __('Reset Password') }}
                        </x-tiffey::form-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
    
    
</x-guest-layout>
<x-guest-layout>
    <div class="flex justify-center place-items-center h-screen">
        <div class="w-96">
            <x-card>
                <div class="flex flex-row place-items-center justify-center my-4">
                    @if (App::environment('production'))
                        <div class="flex pt-0 border-r-2 mr-2">
                            <x-icon.logo class="h-16 w-auto pt-3 mr-2"/> 
                        </div> 
                        <div class="text-brand-mid mr-6">
                            <a class="not-decorated" href="/">
                                {{config('app.name')}}
                            </a>
                        </div>
                    @else
                        <div class="flex pt-0 border-r-2 mr-2">
                            <x-icon.logo class="h-16 w-auto pt-3 mr-2"/> 
                        </div>
                        <div class="text-black bg-brand-mid mr-6 px-1">
                            <a class="not-decorated" href="/">
                                {{config('app.name')}} - DEV
                            </a>
                        </div>
                    @endif
                </div>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="block">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-forms.button>
                            {{ __('Reset Password') }}
                        </x-forms.button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>


</x-guest-layout>
