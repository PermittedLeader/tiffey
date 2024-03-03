<form method="post" action="{{ route('profile.destroy') }}">
    @csrf
    @method('delete')
    <x-tiffey::card collapsible="true" open="false">
        <x-slot:header>
            {{ __('Delete Account') }}
        </x-slot:header>
        <x-slot:subtitle>
            {{ __('Before deleting your account, please download any data or information that you wish to retain.') }}
        </x-slot:subtitle>
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        <x-tiffey::input 
            name="password" 
            type="password" 
            label="{{ __('Password') }}" 
            required 
            autocomplete="current-password" />
        <x-slot:footerActions>
            <x-tiffey::form-button color="bg-danger-mid">
                {{ __('Delete Account') }}
            </x-tiffey::form-button>
        </x-slot:footerActions>
    </x-tiffey::card>
</form>
