@extends('admin.layouts.index')
@section('title','Services')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Services</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Services</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
<div class="content-body">
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    @if (\Session::has('success'))
                                                    <div class="alert alert-success">
                                                     <strong>Success!</strong> {!! \Session::get('success') !!}
                                                    </div>
                                    @endif
                                    @if (\Session::has('error'))
                                                    <div class="alert alert-danger">
                                                      <strong>Danger!</strong> {!! \Session::get('error') !!}
                                                    </div>
                                    @endif 
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Service Name</th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                            </thead>
                                            <tbody>
                                              @foreach($services as $service)
                                              @php
                                               $service_category = App\Master_category::where('id',$service->category_id)->first();
                                              @endphp
                                                <tr>
                                                    <td>{{$service->service_name}}</td>
                                                    <td>{!!$service->description!!}</td>
                                                    <td>@if(!empty($service_category->name)) {{$service_category->name}} @endif</td>
                                                    <td><a class="btn btn-outline-warning" href="{{ route('services.edit',$service->id) }}">Edit</a></td>
                                                    <!-- <td><a class="btn btn-outline-warning" href="{{ route('services.destroy',2) }}">Delete</a></td>  -->
                                                    <td>
                                                        <form action="{{route('services.destroy',[$service->id])}}" method="POST">
                                                         @method('DELETE')
                                                         @csrf
                                                         <button class="btn btn-outline-warning" type="submit">Delete</button>               
                                                        </form>
                                                    </td>
                                                </tr>
                                              @endforeach 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Service Name</th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
@endsection