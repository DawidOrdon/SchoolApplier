@include('navbar.main')
<div class="flex items-center justify-center w-full">
    Dodaj dane dziecka
</div>

<div class="flex items-center justify-center w-full" >
    <form class="max-w-md mx-auto w-1/3 text-black" action="{{route('kids.store')}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
{{--    Imie    --}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('first_name')}}"/>
            <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Imię</label>
            @if($errors->get('first_name'))
                @foreach($errors->get('first_name') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    Drugie Imie    --}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="second_name" id="second_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('second_name')}}"/>
            <label for="second_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Drugie Imię</label>
            @if($errors->get('second_name'))
                @foreach($errors->get('second_name') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    Nazwisko    --}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('last_name')}}"/>
            <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Nazwisko</label>
            @if($errors->get('last_name'))
                @foreach($errors->get('last_name') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    Pesel    --}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="pesel" id="pesel" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('pesel')}}"/>
            <label for="pesel" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Pesel</label>
            @if($errors->get('pesel'))
                @foreach($errors->get('pesel') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    data urodzenia    --}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="date" name="birth_date" id="birth_date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('birth_date')}}"/>
            <label for="birth_date" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Data urodzenia</label>
            @if($errors->get('birth_date'))
                @foreach($errors->get('birth_date') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    email--}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('email')}}"/>
            <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                email</label>
            @if($errors->get('email'))
                @foreach($errors->get('email') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    tel--}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" pattern="[0-9]{9}" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('phone')}}"/>
            <label for="phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Numer telefonu (123456789)
            </label>
            @if($errors->get('phone'))
                @foreach($errors->get('phone') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    2 rodzic--}}
        <div class="relative z-0 w-full mb-5 group">
            <label for="s_parent" class="block mb-2 text-sm font-medium">Drugi rodzic</label>
            <select id="s_parent" name="s_parent" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                @foreach($parents as $parent)
                    <option value="{{$parent->id}}">{{$parent->first_name}} {{$parent->lastname}}</option>
                @endforeach
                <option value="-1">Brak</option>
            </select>
            @if($errors->get('phone'))
                @foreach($errors->get('phone') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    Dane ukończonej placówki--}}
        <div class="grid md:grid-cols-2 md:gap-6">
            Dane ukończonej szkoły
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="school_number" id="school_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('school_number')}}"/>
                <label for="school_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Numer
                </label>
                @if($errors->get('school_number'))
                    @foreach($errors->get('school_number') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="school_city" id="school_city" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('school_city')}}"/>
                <label for="school_city" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Miasto </label>
                @if($errors->get('school_city'))
                    @foreach($errors->get('school_city') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="school_commune" id="school_commune" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('school_commune')}}"/>
                <label for="school_commune" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Powiat
                </label>
                @if($errors->get('school_commune'))
                    @foreach($errors->get('school_commune') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="school_voivodeship" id="school_voivodeship" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('school_voivodeship')}}"/>
                <label for="school_voivodeship" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Województwo</label>
                @if($errors->get('school_voivodeship'))
                    @foreach($errors->get('school_voivodeship') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
        </div>
{{--    Przycisk do kopiowania danych adresowych--}}
        <div class="relative z-0 w-full mb-5 group">
            <input id="address_data" name="address_data" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="address_data" class="ms-2 text-sm font-medium">Dane adresowe takie same jak moje</label>
        </div>
{{--    Dane adresowe--}}
{{--    Ulica i numer--}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('address')}}"/>
            <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Ulica i numer</label>
            @if($errors->get('address'))
                @foreach($errors->get('address') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    Kod pocztowy i poczta--}}
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="zipcode" id="zipcode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('zipcode')}}"/>
                <label for="zipcode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Kod pocztowy
                </label>
                @if($errors->get('zipcode'))
                    @foreach($errors->get('zipcode') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="post" id="post" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('post')}}"/>
                <label for="post" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Poczta</label>
                @if($errors->get('post'))
                    @foreach($errors->get('post') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
        </div>
{{--    Miasto gmina--}}
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="city" id="city" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('city')}}"/>
                <label for="city" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Miasto</label>
                @if($errors->get('city'))
                    @foreach($errors->get('city') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="commune" id="commune" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('commune')}}"/>
                <label for="commune" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Gmina</label>
                @if($errors->get('commune'))
                    @foreach($errors->get('commune') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
        </div>
{{--    Powiat województwo--}}
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="county" id="county" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('county')}}"/>
                <label for="county" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Powiat</label>
                @if($errors->get('county'))
                    @foreach($errors->get('county') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="voivodeship" id="voivodeship" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('voivodeship')}}"/>
                <label for="voivodeship" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Województwo</label>
                @if($errors->get('voivodeship'))
                    @foreach($errors->get('voivodeship') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
        </div>
{{--    Przycisk do wysyłania--}}
        <div class="grid md:grid-cols-1 md:gap-6">
            <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
        </div>

    </form>

</div>


@include('footer.main')
