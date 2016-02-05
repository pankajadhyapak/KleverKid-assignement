@extends('layout')

@section('page_header')
    <div class="page-header">
        <div class="container">
            <h2>Add Images to {{ $academy->academy_name }}</h2>
        </div>
    </div>
@stop

@section('content')



        <form action="/academies/{{$academy->id}}/addImages" class="dropzone" id="imageUpload" method="post">
            {{ csrf_field() }}
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
        </form>

        <div style="margin-top: 20px">
            <a href="/academies/{{$academy->id}}/complete" style="display: none" id="successBtn" class="btn btn-success">Complete</a>

        </div>



@stop


@section('footer')
<script>
    Dropzone.autoDiscover = false;

    $(function() {
        // Now that the DOM is fully loaded, create the dropzone, and setup the
        // event listeners
        var myDropzone = new Dropzone("#imageUpload");
        myDropzone.on("queuecomplete", function() {

            $("#successBtn").css('display','block');
        });
    })
</script>
@stop
