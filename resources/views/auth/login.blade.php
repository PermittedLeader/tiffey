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
        
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <div>
                        <x-tiffey::input id="email"  type="email" name="email" :value="old('email')" label="{{ __('crud.users.inputs.email') }}" required autofocus />
                    </div>
        
                    <div class="mt-4">
                        <x-tiffey::input id="password"  type="password" name="password" label="{{ __('crud.users.inputs.password') }}" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <x-tiffey::input.checkbox id="remember_me" name="remember" label="{{ __('Remember me') }}"/>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <x-tiffey::form-button class="ml-4">
                            {{ __('Log in') }}
                        </x-tiffey::form-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
    
    
</x-guest-layout>
