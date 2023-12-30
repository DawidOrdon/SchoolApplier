@include('.navbar.main')
<div class="flex items-center justify-center w-full">

    <form class="max-w-md mx-auto w-1/3 text-black" action="{{url('user/kids/'.$kid->id.'/certificate_store')}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="grid grid-cols-2">
        @foreach($subjects as $subject)
            <div class="relative z-0 w-full mb-5 group">
                <div class="grid grid-cols-4">
                    <div class="col-span-2">
                        <label for="{{$subject->id}}" class="block mb-2 text-sm font-medium">{{$subject->name}}</label>
                    </div>
                    <div class="col-span-2">
                        <select id="{{$subject->id}}" name="subjects[{{$subject->id}}]" required class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="">Wybierz ocene</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="col-span-4">
                        @if($errors->get($subject->id))
                            @foreach($errors->get($subject->id) as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="relative z-0 w-full mb-5 group">
            Awers
        </div>
        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="flex items-center space-x-6">
                <div class="shrink-0">
                    <img id='preview_img1' class="h-16 w-16 object-cover rounded-full" src="" alt="img" />
                </div>
                <label class="block">
                    <span class="sr-only">Choose profile photo</span>
                    <input type="file" name="image" onchange="loadFile(event,'preview_img1')" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100
                          " />
                </label>
            </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            Rewers
        </div>
        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="flex items-center space-x-6">
                <div class="shrink-0">
                    <img id='preview_img2' class="h-16 w-16 object-cover rounded-full" src="" alt="img" />
                </div>
                <label class="block">
                    <span class="sr-only">Choose profile photo</span>
                    <input type="file" name="image" onchange="loadFile(event,'preview_img2')" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100
                          " />
                </label>
            </div>
        </div>
        <div class="grid md:grid-cols-1 md:gap-6">
            <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
        </div>
    </form>
</div>

<script>
    var loadFile = function(event,name) {

        var input = event.target;
        var file = input.files[0];
        var type = file.type;

        var output = document.getElementById(name);

        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@include('.footer.main')
