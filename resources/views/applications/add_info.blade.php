@include('.navbar.main')
<form method="post" action="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$app_id.'/add_info/save')}}">
    @csrf
    @method('post')
    <div class="flex items-center justify-center w-full">
        <div class="grid md:grid-cols-5 md:gap-6">
            <div class="grid md:grid-cols-1 md:gap-6 col-span-5">
                {{$app->first_name}} {{$app->last_name}}
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <img src="/images/certificate1/{{$app->certificate_photo1}}" alt="" >
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <img src="/images/certificate2/{{$app->certificate_photo2}}" alt="" >
            </div>
            <div class="relative z-0 w-full mb-5 group col-span-3">
                <table>
                    <tr>
                       <th>Kryterium</th>
                       <th>Punkty</th>
                    </tr>
                    <tr>
                        <td><label for="strip">Pasek</label></td>
                        <td>
                            <input type="checkbox" name="strip" value="7" id="strip">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="vol">Wolontariat</label></td>
                        <td>
                            <input type="checkbox" name="vol" value="3" id="vol">
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">Konkursy</th>
                    </tr>
                    <tr>
                        <td colspan="2">uzyskanie w zawodach wiedzy będących konkursem o zasięgu ponadwojewódzkim organizowanym przez kuratorów oświaty na podstawie zawartych porozumień:</td>
                    </tr>
                    <tr>
                        <td><label for="add_11">tytułu finalisty konkursu przedmiotowego</label></td>
                        <td>
                            <input type="checkbox" name="add_1" value="10" id="add_11" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_12">tytułu laureata konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_1" value="7" id="add_12" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_13">tytułu laureata konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_1" value="5" id="add_13" onclick="uncheckOthers(this)">
                        </td>
                    </tr>



                    <tr>
                        <td colspan="2">uzyskanie w zawodach wiedzy będących konkursem o zasięgu międzynarodowym lub ogólnopolskim albo turniejem o zasięgu ogólnopolskim, przeprowadzanymi zgodnie z przepisami wydanymi na podstawie art. 32a ust. 4 i art. 22 ust. 2 pkt 8 ustawy:</td>
                    </tr>
                    <tr>
                        <td><label for="add_21">tytułu finalisty konkursu z przedmiotu lub przedmiotów artystycznych objętych ramowym planem nauczania szkoły artystycznej</label></td>
                        <td>
                            <input type="checkbox" name="add_2" value="10" id="add_21" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_22">tytułu laureata turnieju z przedmiotu lub przedmiotów artystycznych nieobjętych ramowym planem nauczania szkoły artystycznej</label></td>
                        <td>
                            <input type="checkbox" name="add_2" value="4" id="add_22" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_23">tytułu finalisty turnieju z przedmiotu lub przedmiotów artystycznych nieobjętych ramowym planem nauczania szkoły artystycznej</label></td>
                        <td>
                            <input type="checkbox" name="add_2" value="3" id="add_23" onclick="uncheckOthers(this)">
                        </td>
                    </tr>



                    <tr>
                        <td colspan="2">uzyskanie w zawodach wiedzy będących konkursem o zasięgu wojewódzkim organizowanym przez kuratora oświaty:</td>
                    </tr>
                    <tr>
                        <td><label for="add_31">dwóch lub więcej tytułów finalisty konkursu przedmiotowego</label></td>
                        <td>
                            <input type="checkbox" name="add_3" value="10" id="add_31" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_32">dwóch lub więcej tytułów laureata konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_3" value="7" id="add_32" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_33">dwóch lub więcej tytułów finalisty konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_3" value="5" id="add_33" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_34">tytułu finalisty konkursu przedmiotowego</label></td>
                        <td>
                            <input type="checkbox" name="add_3" value="7" id="add_34" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_35">tytułu laureata konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_3" value="5" id="add_35" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_36">tytułu laureata konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_3" value="3" id="add_36" onclick="uncheckOthers(this)">
                        </td>
                    </tr>




                    <tr>
                        <td colspan="2">uzyskanie w zawodach wiedzy będących konkursem albo turniejem, o zasięgu ponadwojewódzkim lub wojewódzkim, przeprowadzanymi zgodnie z przepisami wydanymi na podstawie art. 32a ust. 4 i art. 22 ust. 2 pkt 8 ustawy:</td>
                    </tr>
                    <tr>
                        <td><label for="add_41">dwóch lub więcej tytułów finalisty konkursu przedmiotowego</label></td>
                        <td>
                            <input type="checkbox" name="add_4" value="10" id="add_41" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_42">dwóch lub więcej tytułów laureata konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_4" value="7" id="add_42" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_43">dwóch lub więcej tytułów finalisty konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_4" value="5" id="add_43" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_44">tytułu finalisty konkursu przedmiotowego</label></td>
                        <td>
                            <input type="checkbox" name="add_4" value="7" id="add_44" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_45">tytułu laureata konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_4" value="3" id="add_45" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_46">tytułu finalisty konkursu tematycznego lub interdyscyplinarnego</label></td>
                        <td>
                            <input type="checkbox" name="add_4" value="2" id="add_46" onclick="uncheckOthers(this)">
                        </td>
                    </tr>





                    <tr>
                        <td colspan="2">uzyskanie wysokiego miejsca w zawodach wiedzy innych niż wymienione w pkt 1–4, artystycznych lub sportowych, organizowanych przez kuratora oświaty lub inne podmioty działające na terenie szkoły, na szczeblu:</td>
                    </tr>
                    <tr>
                        <td><label for="add_51">międzynarodowym</label></td>
                        <td>
                            <input type="checkbox" name="add_5" value="4" id="add_51" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_52">krajowym</label></td>
                        <td>
                            <input type="checkbox" name="add_5" value="3" id="add_52" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_53">wojewódzkim</label></td>
                        <td>
                            <input type="checkbox" name="add_5" value="2" id="add_53" onclick="uncheckOthers(this)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="add_54">powiatowym</label></td>
                        <td>
                            <input type="checkbox" name="add_5" value="1" id="add_54" onclick="uncheckOthers(this)">
                        </td>
                    </tr>





                </table>
                <div class="grid md:grid-cols-1 md:gap-6">
                    <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
                </div>
            </div>


        </div>
    </div>
</form>
<script>
    function uncheckOthers(checkbox) {
        const checkboxes = document.getElementsByName(checkbox.name);
        checkboxes.forEach(cb => {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    }
</script>
@include('.footer.main')
