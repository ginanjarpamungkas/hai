@extends('layouts.admin')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>User Show <small>Some examples to get you started</small></h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
             <button class="btn btn-default" type="button">Go!</button>
           </span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
   @if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong> {{session('success') }}
    </div>
    @endif
    <div class="x_panel">
      <div class="x_content">
          <div class="col-md-12">
               <div class="" role="tabpanel" data-example-id="togglable-tabs">
                   <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                       <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Your Role</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content3" role="tab" id="setting-tab" data-toggle="tab" aria-expanded="false">Setting</a>
                       </li>
                   </ul>
                   <div id="myTabContent" class="tab-content">
                       <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="table-responsive">
                           <table id="datatable-fixed-header" class="table table-striped">
                              <thead>
                               <tr class="headings">
                                  <th class="text-center">No </th>
                                  <th class="text-center">Role</th>
                                  <th class="text-center">Created at </th>
                               </tr>
                              </thead>

                              <tbody>
                                 @php
                                    $no = 0;
                                 @endphp
                                 @foreach ($permissionRoles as $permissionRole)
                                    <tr class="even pointer">
                                      <td class="text-center">{{++$no}}</td>
                                      <td class="text-center">{{$permissionRole->role->name}}</td>
                                      <td class="text-center">{{$permissionRole->created_at}}</td>
                                   </tr>
                                 @endforeach
                              </tbody>
                           </table>
                          </div>
                       </div>
                       <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <form class="form-horizontal form-label-left" method="post" action="{{url('permissions/'.$permission->id)}}">
                             {{csrf_field()}}
                             <input type="hidden" name="_method" value="PUT">
                           <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Label <span class="required">*</span>
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" name="label" required="required" class="form-control col-md-7 col-xs-12" value="{{$permission->label}}">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name Permission<span class="required">*</span>
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" name="name_permission" required="required" class="form-control col-md-7 col-xs-12" value="{{$permission->name_permission}}">
                             </div>
                           </div>
                           <div class="ln_solid"></div>
                           <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                 <button type="submit" class="btn btn-success">Update</button>
                              </div>
                           </div>
                         </form>
                       </div>
                   </div>
               </div>

          </div>
      </div>
    </div>
</div>
@endsection
