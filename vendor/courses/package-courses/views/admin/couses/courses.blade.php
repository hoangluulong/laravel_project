@extends('package-courses::admin.courses.course')

<div class="container-fluid">
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="navbar-brand" href="#">Courses</div>
        <a href="{{ route('diary.create') }}" class="btn btn-primary btn-sm ml-auto" type="button">Add Diary</a>
    </nav>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course semaster</th>
                            <th>Course year</th>
                            <th>Subject id</th>
                            <th>Status</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->course}}</td>
                            <td>{{$course->course_semaster}}</td>
                            <td>{{$course->course_year}}</td>
                            @if ($course->status === 1)
                            <td><input type="checkbox" checked /></td>
                            @else 
                            <td><input type="checkbox" /></td>
                            @endif
                            <td>edit
                                <!-- <a class="px-2" href="{{ route('diary.edit',['id'=>$diary->diary_id]) }}"><span class="fas fa-pencil-alt"></span></a>
                                <a class="px-2" href="{{ route('diary.delete',['diary_id'=>$diary->diary_id]) }}"><span class="fas fa-trash-alt"></span></a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Diary Name</strong></td>
                            <td><strong>User Name</strong></td>
                            <td><strong>Weeks</strong></td>
                            <td><strong>Status</strong></td>
                            <td><strong>Operations</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                        Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav
                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#"
                                    aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                        aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
