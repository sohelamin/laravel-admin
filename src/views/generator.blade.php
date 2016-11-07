@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Generator</div>
                    <div class="panel-body">

                        <form class="form-horizontal" method="post" action="{{ url('/admin/generator') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="crud_name" class="col-md-4 control-label">Crud Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="crud_name" class="form-control" id="crud_name" placeholder="Posts" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="controller_namespace" class="col-md-4 control-label">Controller Namespace:</label>
                                <div class="col-md-6">
                                    <input type="text" name="controller_namespace" class="form-control" id="controller_namespace" placeholder="Admin">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="model_namespace" class="col-md-4 control-label">Model Namespace:</label>
                                <div class="col-md-6">
                                    <input type="text" name="model_namespace" class="form-control" id="model_namespace" placeholder="App">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="route_group" class="col-md-4 control-label">Route Group Prefix:</label>
                                <div class="col-md-6">
                                    <input type="text" name="route_group" class="form-control" id="route_group" placeholder="admin">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="view_path" class="col-md-4 control-label">View Path:</label>
                                <div class="col-md-6">
                                    <input type="text" name="view_path" class="form-control" id="view_path" placeholder="admin">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="route" class="col-md-4 control-label">Want to add route?</label>
                                <div class="col-md-6">
                                    <select name="route" class="form-control" id="route">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group table-fields">
                                <h4 class="text-center">Table Fields:</h4><br>
                                <div class="entry col-md-10 col-md-offset-2 form-inline">
                                    <input class="form-control" name="fields[]" type="text" placeholder="field_name" required="true">
                                    <select name="fields_type[]" class="form-control">
                                        <option value="string">string</option>
                                        <option value="char">char</option>
                                        <option value="varchar">varchar</option>
                                        <option value="password">password</option>
                                        <option value="email">email</option>
                                        <option value="date">date</option>
                                        <option value="datetime">datetime</option>
                                        <option value="time">time</option>
                                        <option value="timestamp">timestamp</option>
                                        <option value="text">text</option>
                                        <option value="mediumtext">mediumtext</option>
                                        <option value="longtext">longtext</option>
                                        <option value="json">json</option>
                                        <option value="jsonb">jsonb</option>
                                        <option value="binary">binary</option>
                                        <option value="number">number</option>
                                        <option value="integer">integer</option>
                                        <option value="bigint">bigint</option>
                                        <option value="mediumint">mediumint</option>
                                        <option value="tinyint">tinyint</option>
                                        <option value="smallint">smallint</option>
                                        <option value="boolean">boolean</option>
                                        <option value="decimal">decimal</option>
                                        <option value="double">double</option>
                                        <option value="float">float</option>
                                    </select>
                                    <div class="form-control">
                                        <label>Required</label>
                                        <select name="fields_required[]" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-success btn-add inline" type="button">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </div>
                            </div>
                            <p class="help text-center">It will automatically assume form fields based on the migration field type.</p>
                            <br>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <button type="submit" class="btn btn-primary" name="generate">Generate</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() {
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();

            var tableFields = $('.table-fields'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(tableFields);

            newEntry.find('input').val('');
            tableFields.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });

    });
    </script>
@endsection
