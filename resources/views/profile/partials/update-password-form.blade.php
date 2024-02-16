<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')
    <x-tiffey::card>
        <x-slot:header>
            {{ __('Update Password') }}
        </x-slot:header>
        <x-slot:subtitle>
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </x-slot:subtitle>

        <x-tiffey::input 
            name="current_password" 
            type="password" 
            label="{{ __('Current Password') }}" 
            required 
            autocomplete="current-password" />

        <x-tiffey::input
            type="password"
            name="password"
            label="{{ __('New Password') }}"
            autocomplete="new-password"
        />

        <x-tiffey::input
            type="password"
            name="password_confirmation"
            label="{{ __('Confirm New Password') }}"
            autocomplete="new-password"
        />

        @if (session('status') === 'password-updated')
            <x-tiffey::alert 
                level="success"
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)">
                {{ __('Saved.') }}
            </x-tiffey::alert>
        @endif
        
        <x-slot:footerActions>
            <x-tiffey::form-button color="bg-brand-mid">
                {{ __('Save') }}
            </x-tiffey::form-button>
        </x-slot:footerActions>
    </x-tiffey::card>
</form>
