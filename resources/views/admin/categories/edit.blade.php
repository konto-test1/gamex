@extends('admin.layout.main')

@section('content')
<form action="/admin/categories/{{$page->id}}" method="post" class="tile">
    <h2>Edytujesz kategorię:</h2>

    @csrf
    @method('put')
    @foreach($errors->all() as $error) 
        <li>{{$error}}</li> 
    @endforeach

 
        Grafika w tle
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="thumb">
        </div> 
        <img id="holder" style="margin-top:15px;max-height:100px;">
 

    <label>title <input type="text" name="title" value="{{$page->name}}"></label><br>
    <label>opis <input type="text" name="opis" value="{{$page->description}}"></label><br>
    
    {{-- <label>thumb<input type="text" name="thumb" value="{{$page->thumb}}"></label><br> --}}
    <label>slider title green<input type="text" name="text_green" value="{{$page->text_green}}"></label><br>
    <label>slider title white<input type="text" name="text_white" value="{{$page->text_white}}"></label><br>

    <label>title SEO<input type="text" name="seo_title" value="{{$page->seo_title}}"></label><br>
    <label>desc SEO<input type="text" name="seo_description" value="{{$page->seo_description}}"></label><br>


    <label>Szablon strony:
        <select name="templates">
            @foreach ($templates as $template)
                <option value="{{ $template }}" @if($template == $page->templates) selected @endif >{{ $template }}</option>
            @endforeach
        </select>
    </label><br>
    <button>submit</button>
    </form>




    
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


