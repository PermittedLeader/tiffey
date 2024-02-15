@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-dark dark:text-danger-mid">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-danger-dark dark:text-red-mid">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
