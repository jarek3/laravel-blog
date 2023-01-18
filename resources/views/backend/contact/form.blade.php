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
            <a href="{{ route('contact.show') }}" class="btn btn-default">Cancel</a>
        </div>

    </div>
    <!-- /.box -->
</div>