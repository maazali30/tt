@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><!-- {{ __('Dashboard') }} --> {{ __('You are logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h3 class="card-title">Task of the Week</h3>
                                    </div>
                                    <div class="ml-auto d-flex no-block align-items-center">
                                        <div class="dl">
                                            <select class="custom-select">
                                                <option value="0">Daily</option>
                                                <option value="1" selected="">Weekly</option>
                                                <option value="2">Monthly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0">Employee</th>
                                                <th class="border-0">Task</th>
                                                <th class="border-0">Start Date</th>
                                                <th class="border-0">End Date</th>
                                                <th class="border-0">Location</th>
                                                <th class="border-0">Status</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-2"><img src="images/user.jpg" alt="user" class="rounded-circle" width="45"></div>
                                                        <div class="">
                                                            <h5 class="mb-0 font-16 font-medium">Kashif</h5><span>kashif@gmail.com</span></div>
                                                    </div>
                                                </td>
                                                <td>AC Repair</td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>Testing</td>
                                                <td><button onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs" type="submit" style="width: 64px;"><i class="fa fa-trash-o" title="Completed"></i> Complete </button></td>
                                                <td class="blue-grey-text  text-darken-4 font-medium"><button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button> <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" title="Delete"></i> Delete </button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-2"><img src="images/user.jpg" alt="user" class="rounded-circle" width="45"></div>
                                                        <div class="">
                                                            <h5 class="mb-0 font-16 font-medium">Kashif</h5><span>kashif@gmail.com</span></div>
                                                    </div>
                                                </td>
                                                <td>AC Repair</td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>Testing</td>
                                                <td><button onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs" type="submit" style="width: 64px;"><i class="fa fa-trash-o" title="Completed"></i> Complete </button></td>
                                                <td class="blue-grey-text  text-darken-4 font-medium"><button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button> <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" title="Delete"></i> Delete </button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-2"><img src="images/user.jpg" alt="user" class="rounded-circle" width="45"></div>
                                                        <div class="">
                                                            <h5 class="mb-0 font-16 font-medium">Kashif</h5><span>kashif@gmail.com</span></div>
                                                    </div>
                                                </td>
                                                <td>AC Repair</td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>Testing</td>
                                                <td><button onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs" type="submit" style="width: 64px;"><i class="fa fa-trash-o" title="Completed"></i> Complete </button></td>
                                                <td class="blue-grey-text  text-darken-4 font-medium"><button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button> <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" title="Delete"></i> Delete </button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-2"><img src="images/user.jpg" alt="user" class="rounded-circle" width="45"></div>
                                                        <div class="">
                                                            <h5 class="mb-0 font-16 font-medium">Kashif</h5><span>kashif@gmail.com</span></div>
                                                    </div>
                                                </td>
                                                <td>AC Repair</td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>Testing</td>
                                                <td><button onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs" type="submit" style="width: 64px;"><i class="fa fa-trash-o" title="Completed"></i> Complete </button></td>
                                                <td class="blue-grey-text  text-darken-4 font-medium"><button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button> <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" title="Delete"></i> Delete </button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-2"><img src="images/user.jpg" alt="user" class="rounded-circle" width="45"></div>
                                                        <div class="">
                                                            <h5 class="mb-0 font-16 font-medium">Kashif</h5><span>kashif@gmail.com</span></div>
                                                    </div>
                                                </td>
                                                <td>AC Repair</td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>Testing</td>
                                                <td><button onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs" type="submit" style="width: 64px;"><i class="fa fa-trash-o" title="Completed"></i> Complete </button></td>
                                                <td class="blue-grey-text  text-darken-4 font-medium"><button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button> <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" title="Delete"></i> Delete </button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-2"><img src="images/user.jpg" alt="user" class="rounded-circle" width="45"></div>
                                                        <div class="">
                                                            <h5 class="mb-0 font-16 font-medium">Kashif</h5><span>kashif@gmail.com</span></div>
                                                    </div>
                                                </td>
                                                <td>AC Repair</td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>
                                                    2020-08-30 11:42:21
                                                </td>
                                                <td>Testing</td>
                                                <td><button onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs" type="submit" style="width: 64px;"><i class="fa fa-trash-o" title="Completed"></i> Complete </button></td>
                                                <td class="blue-grey-text  text-darken-4 font-medium"><button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button> <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" title="Delete"></i> Delete </button></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
