@section('style')
    <link rel="stylesheet" href="{{asset('/backend/plugins/tag-editor/jquery.tag-editor.css')}}">
@endsection

@section('script')
    <script src="{{asset('/backend/plugins/tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{asset('/backend/plugins/tag-editor/jquery.tag-editor.min.js')}}"></script>
    <script type="text/javascript">

        var options = {};

        @if($post->exists)
            options = {
            initialTags: {!! json_encode($post->tags->pluck('name')) !!},
        };
        @endif

        $('input[name=post_tags]').tagEditor(options);

//         simplified way
{{--        @if($post->exists)--}}
{{--            options = {--}}
{{--            initialTags: {!! $post->tags_list !!},--}}
{{--        };--}}
{{--        @endif--}}
        $('input[name=post_tags]').tagEditor(options);
    </script>
@endsection

@section('script')
    <script type="text/javascript" >
        $('ul.pagination').addClass('no-margin pagination-sm');

        $('#title').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                    .replace(/[^a-z0-9-]+/g, '-')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });

        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
        var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true
        });

        $('#draft-btn').click(function(e) {
            e.preventDefault();
            $('#published_at').val();
            $('#post-form').submit();
        });

    </script>
@endsection

