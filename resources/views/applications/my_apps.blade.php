@include('.navbar.main')

<div class="flex items-center justify-center ">
    <table>
        <tr>
            <th style="margin-left: 10px">
                Imię
            </th>
            <th style="margin-left: 10px">
                Nazwisko
            </th>
            <th style="margin-left: 10px">
                Nazwa szkoły
            </th>
            <th style="margin-left: 10px">
                Nazwa klasy
            </th>
            <th style="margin-left: 10px">
                status
            </th>
            <th style="margin-left: 10px">
                ponowne generowanie pdf
            </th>
            <th style="margin-left: 10px">
                usuń podanie
            </th>


        </tr>
        @foreach($apps as $app)
            <tr>
                <td>
                    {{$app->first_name}}
                </td>
                <td>
                    {{$app->last_name}}
                </td>
                <td>
                    {{$app->school_name}}
                </td>
                <td>
                    {{$app->class_name}}
                </td>
                <td>
                    {{$app->status}}
                </td>
                <td>
                    <form action="{{url('my_apps/pdf')}}" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="id" value="{{$app->id}}">
                        <button type="submit" value="new" class=" focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2"
                                onclick="return confirm('Uwaga po ponownym wygenerowaniu pdf poprzedni straci ważność')">
                            Generuj
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{url('my_apps/drop')}}" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="id" value="{{$app->id}}">
                        <button type="submit" value="usuń" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                onclick="return confirm('Czy na pewno chcesz usunąć ')">
                            Usuń
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
<div class="flex items-center justify-center ">
    @if($errors->get('id'))
        @foreach($errors->get('id') as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
</div>



@include('.footer.main')
