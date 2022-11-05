    <script src="{{ asset('libs/jqueryui/js/jquery.js') }}"></script>
    <script src="{{ asset('libs/jqueryui/js/jquery-ui.js') }}"></script>
    <script>
        $( function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
        } );
    </script>
    <script type="text/javascript">
    $('#sortable').sortable({
        axis: 'y',
        update: function (event, ui) {
            var data = $(this).sortable('serialize');
            var position = ui.position.top;
            var id = ui.item.attr('data-id');

            // POST to server using $.post or $.ajax
            $.ajax({
                data: {
                    position: position,
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                type: 'POST',
                url: '{{ route('demo.position.post') }}',
                success : function(r){
                    if(r == "1") {
                        console.log("position changé avec succès");
                    } else {
                        console.log("echec changement de position");
                    }
                }

            });
        }
    });


    </script>
