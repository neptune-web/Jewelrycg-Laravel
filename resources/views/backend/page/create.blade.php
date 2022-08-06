@extends('backend.layouts.app', ['activePage' => 'page', 'title' => 'Create Page', 'navName' => 'addpost', 'activeButton' => 'blog'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Create page</h1>
    </div>
    <!-- End Row -->
</div>    
    <form action="{{ route('backend.page.store') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                @csrf
                <div class="card col-md-12 mb-4">
                    <div class="card-body">
                        @include('includes.validation-form')
                        <div class="mb-2">
                            <label for="name" class="w-100 mb-2">Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="w-100 mb-2">Slug:</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="desc" class="w-100 mb-2">Post:</label>
                            <textarea name="post" id="desc" rows="6" class="form-control">{{ old('post') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Card -->
                <div class="card mb-3 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">Organization</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="mb-4 col-12">
                            <div class="col-12">
                                <label class="mb-2" for="">Status</label>
                                <select class="selectpicker w-100" name="status">
                                    <option value="1" selected>Published</option>
                                    <option value="2" >Draft</option>
                                    <option value="3" >Pending Review</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-4 col-12">
                            <label for="category" class="w-100 mb-2">Parent</label>
                            <div class="col-12">
                                <select class="selectpicker " name="parent_id" data-live-search="true" data-container="body">
                                    <option value='0'>None</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>

        <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
        <!-- Card -->
        <div class="card card-sm bg-dark border-dark mx-2">
          <div class="card-body">
            <div class="row justify-content-center justify-content-sm-between">
              <div class="col">
                <button type="button" class="btn btn-ghost-danger">Cancel</button>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <div class="d-flex gap-3">
                  <button type="button" class="btn btn-ghost-light">Save Draft</button>
                  <button type="submit" class="btn btn-primary">Publish</button>
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
        </div>
        <!-- End Card -->
      </div>
    </form>
    <div id="fileManagerContainer"></div>

    <div id='ajaxCalls'>
    </div>
@endsection

@section('js_content')
    <script>
        $(document).ready(function() {
            $('#desc').trumbowyg();
        })
        $(".imgAdd").click(function() {
            $(this).closest(".row").find('.imgAdd').before(
                '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
            );
        });
        $(document).on("click", "i.del", function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change", ".uploadFile", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)
                    return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function() { // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image",
                            "url(" + this.result + ")");
                    }
                }

            });

            $('.select2').select2({
            
            tags: true,
            maximumSelectionLength: 10,
            tokenSeparators: [','],
            placeholder: "Select or type keywords",
            })
        });


        $('#getFileManager').click(function () {
            $.ajax({
                url: "{{ route('backend.file.index') }}",
                success: function (data) {
                    if (!$.trim($('#fileManagerContainer').html()))
                        $('#fileManagerContainer').html(data);

                    $('#fileManagerModal').modal('show');

                    const getSelectedItem = function (selectedId, filePath) {

                        $('#fileManagerId').val(selectedId);
                        $('#fileManagerPreview').attr('src', filePath);
                    }

                    setSelectedItemsCB(getSelectedItem, $('#fileManagerId').val() == '' ? [] : [$('#fileManagerId').val()], false);
                }
            })
        });


    </script>
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/hs.quill.js') }}"></script>
    <script>
    (function() {
        // INITIALIZATION OF QUILLJS EDITOR
        // =======================================================
        HSCore.components.HSQuill.init('.js-quill')
    });
    </script>
@endsection