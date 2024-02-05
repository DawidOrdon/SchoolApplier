@include('.navbar.main')
<div class="w-full block items-center justify-center" >
    <div class="flex items-center justify-center w-full ">
        <img src="/images/schools/{{$school->img}}" alt="" width="120" class="mr-4"> <h1 class="text-3xl">{{$school->name}}</h1>
    </div>
    <div class="flex items-center justify-center w-full ">
        <h1 class="text-2xl">O nas</h1>
    </div>
    <div class="flex items-center justify-center w-full mt-2 text-xl">
        {{$school->desc}}
    </div>
    <div class="flex items-center justify-center w-full text-2xl mt-10">
        Nasze Profile
    </div>
    <div class="flex items-center justify-center w-full mt-10">
        <table>
        @foreach($classes as $class)

            <tr class="my-5">
                <td class="pr-3 my-3">
                    <a href="{{url('/schools/'.$school_id.'/'.$class->id.'/application')}}">
                        {{$class->name}}
                    </a>
                </td>
                <td>
                    <a href="{{url('/schools/'.$school_id.'/'.$class->id.'/application')}}">
                        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            Aplikuj
                        </button>
                    </a>
                </td>
            </tr>

        @endforeach
        </table>
    </div>



</div>
@include('.footer.main')

