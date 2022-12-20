<div class="col-xs-9">
    <div class="box">
        <div class="box-body ">
            {{ csrf_field() }}

            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Your Name']) !!}

                @if($errors->has('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email') !!}
                {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Your Email']) !!}

                @if($errors->has('email'))
                    <span class="help-block">{{$errors->first('email')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                {!! Form::label('phone') !!}
                {!! Form::number('phone', null, ['class'=>'form-control', 'placeholder'=>'Your Phone Number']) !!}

                @if($errors->has('phone'))
                    <span class="help-block">{{$errors->first('phone')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('subject') ? 'has-error' : ''}}">
                {!! Form::label('subject') !!}
                {!! Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'Subject']) !!}

                @if($errors->has('subject'))
                    <span class="help-block">{{$errors->first('subject')}}</span>
                @endif
            </div>


            <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('body') !!}
                {!! Form::textarea('body', null, ['rows' => 5, 'class' => 'form-control', 'placeholder' => 'Write your message here']) !!}

                @if($errors->has('body'))
                    <span class="help-block">{{$errors->first('body')}}</span>
                @endif
            </div>

{{--            <div class="form-group col-md-4">
                <label for="year">Current year (antispam)</label>
                <input type="number" name="year" id="year" class="form-control" required />
            </div>--}}

            <div class="form-group col-md-4 {{$errors->has('year') ? 'has-error' : ''}}">
                {!! Form::label('antispam') !!}
                {!! Form::number('year', null, ['class' => 'form-control', 'placeholder' => 'Current year']) !!}

                @if($errors->has('year'))
                    <span class="help-block">{{$errors->first('year')}}</span>
                @endif
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="#" class="btn btn-default">Cancel</a>
        </div>

    </div>
    <!-- /.box -->
</div>


{{--    <div class="box">--}}
{{--        <div class="box-header with-border">--}}
{{--            <h3 class="box-title">Feature Image</h3>--}}
{{--        </div>--}}
{{--        <div class="box-body text-center">--}}
{{--            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">--}}

{{--                <div class="fileinput fileinput-new" data-provides="fileinput">--}}
{{--                    <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">--}}
{{--                        <img src="{{($post->image_thumb_url) ? $post->image_thumb_url: 'https://via.placeholder.com/200x150&text=No+Image'}}"  alt="...">--}}
{{--                    </div>--}}
{{--                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>--}}
{{--                    <div>--}}
{{--                        <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>--}}
{{--                        <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                @if($errors->has('image'))--}}
{{--                    <span class="help-block">{{$errors->first('image')}}</span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
