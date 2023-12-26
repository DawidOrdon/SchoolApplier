@include('.navbar.main')
<div class="flex items-center justify-center w-full">

    <form class="max-w-md mx-auto w-1/3 text-black" action="{{route('schools.store')}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('email')}}"/>
            <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adres email</label>
            @if($errors->get('email'))
                @foreach($errors->get('email') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="school_name" id="school_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('school_name')}}"/>
            <label for="school_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nazwa szkoły</label>
            @if($errors->get('school_name'))
                @foreach($errors->get('school_name') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="url" id="url" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('url')}}"/>
            <label for="url" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adres strony www</label>
            @if($errors->get('url'))
                @foreach($errors->get('url') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" pattern="[0-9]{9}" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('phone')}}"/>
            <label for="phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numer telefonu (123456789)</label>
            @if($errors->get('phone'))
                @foreach($errors->get('phone') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="address" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('address')}}"/>
                <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ulica i numer</label>
                @if($errors->get('address'))
                    @foreach($errors->get('address') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="city" id="city" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('city')}}"/>
                <label for="city" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Miasto</label>
                @if($errors->get('city'))
                    @foreach($errors->get('city') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="county" id="county" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('county')}}"/>
                <label for="county" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Powiat</label>
                @if($errors->get('county'))
                    @foreach($errors->get('county') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="voivodeship" id="voivodeship" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('voivodeship')}}"/>
                <label for="voivodeship" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Województwo</label>
                @if($errors->get('voivodeship'))
                    @foreach($errors->get('voivodeship') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="grid md:grid-cols-1 md:gap-6">
                <div class="flex items-center space-x-6">
                    <div class="shrink-0">
                        <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="" alt="img" />
                    </div>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" name="image" onchange="loadFile(event)" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100
                          " />
                    </label>
                </div>

            <script>
                var loadFile = function(event) {

                    var input = event.target;
                    var file = input.files[0];
                    var type = file.type;

                    var output = document.getElementById('preview_img');

                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                };
            </script>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" list="email-list" name="admin" id="admin" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('admin')}}"/>
            <label for="admin" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adres email admina szkoły</label>
            <datalist id="email-list">
                @foreach($emails as $email)
                    <option value="{{$email['email']}}"></option>
                @endforeach

            </datalist>
            @if($errors->get('admin'))
                @foreach($errors->get('admin') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="desc" id="desc" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('desc')}}"/>
            <label for="desc" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Krótki opis</label>
            @if($errors->get('desc'))
                @foreach($errors->get('desc') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>

        <div class="grid md:grid-cols-1 md:gap-6">
            <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
        </div>
    </form>
</div>


@include('.footer.main')
