 <div class="form-group">
        {!! Form::label('ideaname','IdeaName:') !!}
        {!! Form::text('ideaname',null, ['class' => 'form-control']) !!}
    </div>

    <!--password-->
    <div class="form-group">
        {!! Form::label('idea','Idea:') !!}
        {!! Form::textarea('idea',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tag_list', 'Tags:') !!}
        {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list','class' => 'form-control','multiple']) !!}
    </div>

    <!--submit-->
    <div class="form-group">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
    </div>
 @section('footer')

     <script>
         $('#tag_list').select2({
             placeholder: 'Choose a tag'

         });
     </script>

 @endsection