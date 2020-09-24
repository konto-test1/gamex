@extends('admin.layout.main')


@section('content')
<div class="container">
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif

    @if (\Session::has('success'))
        <div class="alert alert-success mt-2"><ul class="p-2 m-0"><li>{!! \Session::get('success') !!}</li></ul></div>
    @endif
    <h1>Edycja menu: <span id="menu_id" data-id="{{$current->id}}">{{$current->name}}</span></h1>
    <div id="tree1" class="mb-2"></div>
    <button id="delete" class="btn btn-danger" style="display: none">Usuń</button>
    <button id="update" class="btn btn-warning" style="display: none">Aktualizuj</button>

    <div class="form-group d-flex mt-2">
        <div class="d-flex flex-column form_valid">
            <input type="text" id="form_name" class="form-control" placeholder="Nazwa"> 
            <p class="min_lenght"></p>
        </div>
        <div class="d-flex flex-column form_valid">
            <input type="text" id="form_title" class="form-control" placeholder="Tytuł"> 
            <p class="min_lenght"></p>
        </div>
        <div class="d-flex flex-column form_valid">
            <input type="text" id="form_url" class="form-control" placeholder="URL"> 
            <p class="min_lenght"></p>
        </div>
        <button class="btn btn-primary" id="add">Dodaj</button>
    </div>
</div>
<script>
    $(document).ready(function () {
        //INIT
        $(function () {
            $('#tree1').tree({
                data: {!!json_encode($menu_items) !!},
                autoOpen: true,
                dragAndDrop: true,
                onCanMoveTo: function(moved_node, target_node, position) {
                    if (moved_node.children.length == 0) {
                        console.log(moved_node.children.length)
                        return true;
                    }
                    else {
                        console.log(moved_node.children.length)
                        return false;
                    }
                }
            }); 
        });
        

        //evety
        $('#delete').on('click',
            function () {
                var node = $('#tree1').tree('getSelectedNode');
                $('#tree1').tree('removeNode', node);
                $('#update').addClass('disabled');
                clearFields();
                delete_items();  
            }
        );

        $('#update').on('click', function (event) {
            var node1 = $('#tree1').tree('getSelectedNode');
            if (node1) {
                var newVal = {"name": $('#form_name').val(), "title": $('#form_title').val(), "url": $('#form_url').val()};                
                $('#tree1').tree('updateNode', node1, newVal);
                clearFields();
            }
            sendAjax();
        });



        $('#add').on('click', function () {
            var form_name = $('#form_name').val()
            var form_title = $('#form_title').val()
            var form_url = $('#form_url').val()
            if(form_name.length >= 3 && form_title.length >= 3 && form_url.length >= 3) {
                $('#tree1').tree(
                    'appendNode', {
                        name: form_name,
                        title: form_title,
                        url: form_url,
                    }
                );
                clearFields();
                sendAjax();
                $('.min_lenght').html('');
            } else {
                $('.form_valid').each(function(index) {
                    if( $('.form-control', this).val().length >= 3 ) {
                        $('.min_lenght', this).html('');
                    } else {
                        $('.min_lenght', this).html('minimum 3 znaki');
                    }
                });
            }
        });

    
init_events()



// ==========================================================================================================================================================================
// =======funkcje pomocnicze================================================================================================================================================
// ==========================================================================================================================================================================


    function sendAjax(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/admin/save_items',
            data: {
                menu_id: $('#menu_id').data('id'),
                data: $('#tree1').tree('toJson'),
            },
            success:function(data) {
                $('#tree1').tree('destroy');
                $request = JSON.parse(JSON.stringify(data));                
                $('#tree1').tree({
                    data: $request,
                    autoOpen: true,
                    dragAndDrop: true,
                    onCanMoveTo: function(moved_node, target_node, position) {
                    if (moved_node.children.length == 0) {
                        console.log(moved_node.children.length)
                        return true;
                    }
                    else {
                        console.log(moved_node.children.length)
                        return false;
                    }
                }
                });
                init_events();
            }
        });
    }
    function delete_items(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/admin/delete_items',
            data: {
                menu_id: $('#menu_id').data('id'),
                data: $('#tree1').tree('toJson'),
            },
            success:function(data) {
                $('#tree1').tree('destroy');
                $request = JSON.parse(JSON.stringify(data));                
                $('#tree1').tree({
                    data: $request,
                    autoOpen: true,
                    dragAndDrop: true
                });
                init_events();
            }
        });
    }

    function clearFields(){
        var form_name = $('#form_name').val('');
        var form_title = $('#form_title').val('');
        var form_url = $('#form_url').val('');
        $('#delete, #update').hide();
    }

    function init_events(){
        $('#tree1').on(
            'tree.move',
            function (event) {
                // console.log(event);
                setTimeout(() => {
                    sendAjax() 
                }, 300);
            }
        );
        $('#tree1').on(
            'tree.select',
            function (event) {
                console.log(event);
                $('#delete, #update').show();
                if ($('#tree1').tree('getSelectedNode').name == undefined) {
                    clearFields();
                } else {
                    var node = $('#tree1').tree('getSelectedNode');
                    var form_name = $('#form_name').val(node.name)
                    var form_title = $('#form_title').val(node.title)
                    var form_url = $('#form_url').val(node.url)
                }
            }
        );
    }
})
</script>


<style>
body {
    background: #333;
    color: white;
}
ul li span{
    color: white!important;
}
</style>
@endsection
