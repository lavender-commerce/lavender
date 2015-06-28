<div id="entity-tree">

    <ul class="tree-list" {!! attr($options) !!}>

        @foreach($list as $child)

            @include('layouts.partials.tree.list', ['list' => $child])

        @endforeach

    </ul>

</div>

<script>

    $('a.expand').click(function() {

        // hide/show children
        $(this).parent().find('ul').first().toggle();

        // toggle +/-
        if($(this).text() == "[+]"){ $(this).text("[-]"); }
        else { $(this).text("[+]"); }

    });

    // todo move validation to app.js class
    $('.tree-list').each(function(){

        var list = $(this);

        var field = list.attr('data-field');

        var validate = list.attr('data-validate');

        var checkboxes = list.find('input[type="checkbox"]');

        if(validate){

            var json = $.parseJSON(validate);

            if(json.limit == 1){

                checkboxes.each(function(){

                    $(this).bind('click', function(){

                        var self = this;

                        if(checkboxes.length > 1){

                            checkboxes.each(function () {

                                if(self != this) this.checked = false;

                            });

                        }

                    });

                });


            }

            if(typeof json.hide == 'number'){

                checkboxes.each(function(){

                    if(this.value == json.hide){

                        $(this).parent().remove();

                    }

                });

            }

        }


    });



</script>