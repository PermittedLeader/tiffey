<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    <x-tiffey::card>
        <x-slot:header>
            {{ __('Profile Information') }}
        </x-slot:header>
        <x-slot:subtitle>
            {{ __("Update your account's profile information and email address.") }}
        </x-slot:subtitle>
        @csrf
        @method('patch')

        <x-tiffey::input 
                label="{{ __('Name') }}" 
                name="name"
                value="{{ old('name', $user->name) }}" 
                autofocus 
                autocomplete="name" 
                required 
            />

        <x-tiffey::input
            label="{{ __('Email') }}"
            name="email"
            value="{{ old('email', $user->email) }}" 
            autocomplete="username" 
            required 
        />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                {{ __('Your email address is unverified.') }}

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                    <x-tiffey::form-button>
                        {{ __('Click here to re-send the verification email.') }}
                    </x-tiffey::form-button>
                </form>

                @if (session('status') === 'verification-link-sent')
                    <x-tiffey::alert level="info">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </x-tiffey::alert>
                @endif
            </div>
        @endif
        <x-slot:footerActions>
            <x-tiffey::form-button color="bg-brand-mid">
                {{ __('Save') }}
            </x-tiffey::form-button>
        </x-slot:footerActions>
            
            @if (session('status') === 'profile-updated')
                <x-tiffey::alert level="success" x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)">
                    {{ __('Saved.') }}
                </x-tiffey::alert>
            @endif
    </x-tiffey::card>
</form>
