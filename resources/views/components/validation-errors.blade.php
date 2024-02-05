@if ($errors->any())
    <div {{ $attributes }}>
        <div class=" text-red-600">{{ __('Coś poszło nie tak') }}</div>

        <ul class="mt-3 list-disc list-inside text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
