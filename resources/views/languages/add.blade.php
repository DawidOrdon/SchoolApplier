@include('.navbar.main')
<div class="w-full block items-center justify-center" >
    <div class="w-full p-10 flex items-center justify-center">
       <form method="post" action="{{url('/schools/'.$school_id.'/edit/languages/store')}}">
           @method('post')
           @csrf
           @foreach($languages as $language)
               <label for="lang">{{$language->name}}</label>
               <input id="lang" type="checkbox" name="lang[]" value="{{$language->id}}">
           @endforeach
           <div class="grid md:grid-cols-1 md:gap-6">
               <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
           </div>
       </form>
    </div>
</div>
@include('.footer.main')

