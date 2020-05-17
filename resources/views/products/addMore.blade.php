@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')
<div class="container">
    <script type="text/javascript">
        $(function () {
            $('.add').click(function () {
                var n = ($('.resultbody tr').length - 0) + 1;
                var tr = '<tr><td class="no">' + n + '</td>' +
                    '<td><input type="text" class="name form-control" name="name[]" value="{{ old('name') }}"></td>' +
                '<td><input type="text" class="fname form-control" name="fname[]" value="{{ old('fname') }}"></td>' +
                '<td><input type="text" class="rollno form-control" name="rollno[]" value="{{ old('rollno') }}"></td>' +
                '<td><input type="text" class="obtainedmarks form-control" name="obtainedmarks[]" value="{{ old('email') }}"></td>' +
                '<td><input type="text" class="totalmarks form-control" name="totalmarks[]"></td>' +
                '<td><input type="text" class="percentage form-control" name="percentage[]"></td>' +
                '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
                $('.resultbody').append(tr);
            });

            $('.resultbody').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
            });

            $('.resultbody').delegate('.obtainedmarks , .totalmarks', 'keyup', function () {
                var tr = $(this).parent().parent();
                var obtainedmarks = tr.find('.obtainedmarks').val() - 0;
                var totalmarks = tr.find('.totalmarks').val() - 0;

                var percentage = (obtainedmarks / totalmarks) * 100;
                tr.find('.percentage').val(percentage);
            });
        });
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Results</div>
                    @if(count($errors) >0 )
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/addmore') }}">
                            {!! csrf_field() !!}
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Roll No</th>
                                    <th>Obtained Marks</th>
                                    <th>Total Marks</th>
                                    <th>%</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody class="resultbody">
                                <tr>
                                    <td class="no">1</td>
                                    <td>
                                        <input type="text" class="name form-control" name="name[]"
                                               value="{{ old('name') }}">
                                    </td>
                                    <td>
                                        <input type="text" class="fname form-control" name="fname[]"
                                               value="{{ old('fname') }}">
                                    </td>
                                    <td>
                                        <input type="text" class="rollno form-control"
                                               name="rollno[]" value="{{ old('rollno') }}">
                                    </td>
                                    <td>
                                        <input type="text" class="obtainedmarks form-control"
                                               name="obtainedmarks[]" value="{{ old('email') }}">
                                    </td>
                                    <td>
                                        <input type="text" class="totalmarks form-control"
                                               name="totalmarks[]">
                                    </td>
                                    <td>
                                        <input type="text" class="percentage form-control"
                                               name="percentage[]">
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-danger delete"
                                               value="x">
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <center><input type="button" class="btn btn-lg btn-primary add"
                                           value="Add New Item">
                                <input type="submit" class="btn btn-lg btn-default" value="Submit">
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- First Row End -->
    </div>
</div>

    @endsection


