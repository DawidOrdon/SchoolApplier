@include('navbar.main')

<div class="flex items-center justify-center w-full text-2xl p-4">
    Przywracanie hasła
</div>
<div class="flex items-center justify-center w-full ">
   <div class="w-1/4 text-center p-4">
       {{ __('Zapomniałeś hasła? Nie ma problemu. Po prostu podaj nam swój adres e-mail, a my wyślemy Ci link do resetowania hasła, który pozwoli Ci wybrać nowe.') }}
   </div>


</div>
<div class="flex items-center justify-center w-full ">

    @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('email')}}"/>
                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    E-mail</label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Wyślj link do resetu hasła') }}
                </x-button>
            </div>
        </form>
</div>
@include('footer.main')
