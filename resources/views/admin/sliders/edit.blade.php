@extends('admin.layout.main')

@section('content')
    <form action="/admin/sliders/{{$page->id}}" method="post" class="tile">
    <h2>Edytujesz slider:</h2>

    @csrf
    @method('put')
    @foreach($errors->all() as $error)
        <li>{{$error}}</li> 
    @endforeach
    <label>title <input type="text" name="title" value="{{$page->title}}"></label><br>
    <label>opis <input type="text" name="opis" value="{{$page->description}}"></label><br>

    <button>submit</button>
    </form>

    <div class="tile">
    <h3>dodaj slide do sldiera</h3>
        <form action="{{route('slide_items', $page->id)}}" method="post">
        @csrf
        @method('post')
        <label>title <input type="text" name="title" value=""></label><br>
        <label>opis <input type="text" name="description" value=""></label><br>

        <label>more_info <input type="text" name="more_info" value=""></label><br>    
        <label>link <input type="text" name="link" value=""></label><br>
        <label>display <input type="text" name="display" value=""></label><br>
        <label>button_text <input type="text" name="button_text" value=""></label><br>

        <div class="col-md-6">
                Dodaj zdjęcie
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="thumbnail" class="form-control" type="text" name="photo">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                  </div>
        <button>add</button>
    </form>
  </div>
  <div class="tile">
    <h3>wszystkie slidy</h3>
    @foreach ($all_slide as $item)
        <ul>
            <li><img src="{{$item->photo}}" alt="" style="max-width: 100px">{{$item->title}}</li>
        </ul>
    @endforeach
  </div>

















    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
     var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
  
    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
      $('textarea[name=ce]').ckeditor({
        height: 100,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
      });
    </script>
  
    <!-- TinyMCE init -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      var editor_config = {
        path_absolute : "",
        selector: "textarea[name=tm]",
        plugins: [
          "link image"
        ],
        relative_urls: false,
        height: 129,
        file_browser_callback : function(field_name, url, type, win) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
          var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }
  
          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };
  
      tinymce.init(editor_config);
    </script>
  
    <script>
      {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
      $('#lfm').filemanager('image', {prefix: route_prefix});
      $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>
  
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script>
      $(document).ready(function() {
        $('#summernote').summernote();
      });
    </script>
    <script>
      $(document).ready(function(){
  
        // Define function to open filemanager window
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };
  
        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {
  
                    lfm({type: 'image', prefix: '/laravel-filemanager'}, function(url, path) {
                        context.invoke('insertImage', url);
                    });
  
                }
            });
            return button.render();
        };
  
        // Initialize summernote with LFM button in the popover button group
        // Please note that you can add this button to any other button group you'd like
        $('#summernote-editor').summernote({
            toolbar: [
                ['popovers', ['lfm']],
            ],
            buttons: {
                lfm: LFMButton
            }
        })
      });
    </script>
@endsection


