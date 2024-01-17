@include('.navbar.main')
<form class="max-w-md mx-auto w-1/3 text-black" action="{{url('/schools/'.$school->id.'/'.$class->id.'/application/save')}}" method="post" enctype="multipart/form-data">
    @method('post')
    @csrf
    @if($errors->get('msg'))
    <div class="relative z-0 w-full mb-5 group">
        @foreach($errors->get('msg') as $error)
            <h1 class="text-red-600 text-3xl">{{$error}}</h1>
            Przejdz do twoich podań <a href="{{url('my_apps')}}">  kliknij tu</a>
        @endforeach
    </div>
    @endif
    <div class="relative z-0 w-full mb-5 group">
        Aplikujesz do {{$school->name}}
    </div>
    <div class="relative z-0 w-full mb-5 group">
        do klasy o profilu {{$class->name}}
    </div>
    <label for="kid" class="block mb-2 text-sm font-medium">Dziecko</label>
    <select id="kid" name="kid" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        @foreach($kids as $kid)
            <option value="{{$kid->id}}">{{$kid->first_name}} {{$kid->lastname}}</option>
        @endforeach
    </select>
    @if($errors->get('kid'))
        @foreach($errors->get('kid') as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <div class="relative z-0 w-full mb-5 group">
        <label for="first_choice">Pierwszy wybór</label>
        <input type="radio" name="choice" value="1" id="first_choice">
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <label for="first_choice">Drugi wybór</label>
        <input type="radio" name="choice" value='2' id="first_choice">
    </div>
    <div class="relative z-0 w-full mb-5 group">
        Jakiego języka chciałbyś się uczyć?
    </div>
    <div class="relative z-0 w-full mb-5 group">
        @foreach($languages as $language)
            <div class="flex items-center mb-4">
                <input id="lang{{$language->id}}" required type="radio" value="{{$language->id}}" name="language" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                <label for="lang{{$language->id}}" class="ms-2 text-sm font-medium">{{$language->name}}</label>
            </div>
        @endforeach
    </div>
    <div class="relative z-0 w-full mb-5 group">
        DODATKOWE INFORMACJE O KANDYDACIE
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <table>
            <tr>
                <td></td>
                <th>Tak</th>
            </tr>
            <tr>
                <td>
                    <label for="info1">
                        Posiadam orzeczenie o stopniu niepełnosprawności wydane przez Powiatowy Zespół do Spraw Orzekania o Niepełnosprawności
                    </label>
                </td>
                <td>
                    <input type="checkbox" name="info1" id="info1" value="1">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="info2">
                        Posiadam opnię Poradni Psychologiczno - Pedagogicznej
                    </label>
                </td>
                <td>
                    <input type="checkbox" name="info2" id="info2" value="1">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="info3">
                        Posiadam orzeczenie Poradni Psychologiczno-Pedagogicznej
                    </label>
                </td>
                <td>
                    <input type="checkbox" name="info3" id="info3" value="1">
                </td>
            </tr>
        </table>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <label for="add_info" class="block mb-2 text-sm font-medium ">Dodatkowe informacje</label>
        <textarea id="add_info" name="add_info" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="Informacje o stanie zdrowia kandydata (np. choroby przewlekłe, cukrzyca,epilepsja, aleregia i inne)"></textarea>
        @if($errors->get('add_info'))
            @foreach($errors->get('add_info') as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
    </div>
    <div class="grid md:grid-cols-1 md:gap-6">
        <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
    </div>
</form>
@include('.footer.main')

