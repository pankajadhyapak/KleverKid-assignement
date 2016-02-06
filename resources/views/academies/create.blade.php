@extends('layout')

@section('page_header')
    <div class="page-header">
        <div class="container">
            <h2>Create New Academy </h2>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">New Academy</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('academies.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                    <label for="user_name">User Name</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}">
                                    @if ($errors->has('user_name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('user_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('academy_name') ? ' has-error' : '' }}">
                                    <label for="academy_name">Academy Name</label>
                                    <input type="text" class="form-control" id="academy_name" name="academy_name" value="{{ old('academy_name') }}">
                                    @if ($errors->has('academy_name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('academy_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('timeslots') ? ' has-error' : '' }}">
                                    <label for="timeslots">Time slots</label>
                                    <input type="text" class="form-control" id="timeslots" name="timeslots" value="{{ old('timeslots') }}">
                                    @if ($errors->has('timeslots'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('timeslots') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                    <label for="tags">Tags </label>
                                    <select name="tags[]" id="tags" class="form-control" multiple>
                                        @foreach($tags as $id => $tag)
                                            <option value="{{ $id }}"  {{ old('tags') ? in_array($id, old('tags')) ? 'selected':'' : ''}}>{{ $tag }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tags'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        

                        

                        


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" >{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">
                                    @if ($errors->has('latitude'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('latitude') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">
                                    @if ($errors->has('longitude'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('longitude') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save and Add Images">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script type="text/javascript">
        $('#tags').select2();
    </script>
@stop
