@extends('layouts.admin')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Role Show <small>Some examples to get you started</small></h3>
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
    @if (session('danger'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Danger!</strong> {{session('danger') }}
    </div>
    @endif
    <div class="x_panel">
      <div class="x_content">
          <div class="col-md-12">
               <div class="" role="tabpanel" data-example-id="togglable-tabs">
                   <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                       <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Your Permission</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content2" role="tab" id="setting-tab" data-toggle="tab" aria-expanded="false">Permission List</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content4" role="tab" id="setting-tab" data-toggle="tab" aria-expanded="false">Setting</a>
                       </li>
                   </ul>
                   <div id="myTabContent" class="tab-content">
                       <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                          <div class="table-responsive">
                            <form class="" action="{{url('permissionRoles/destroy')}}" method="post">
                               <input type="hidden" name="role" value="{{$role->id}}">
                               {{csrf_field()}}
                           <table id="datatable-fixed-header" class="table table-striped">
                              <thead>
                               <tr class="headings">
                                  <th></th>
                                  <th class="text-center">No </th>
                                  <th class="text-center">Label</th>
                                  <th class="text-center">Permission Name</th>
                                  <th class="text-center">Created at </th>
                               </tr>
                              </thead>

                              <tbody>
                                 @php
                                    $no = 0;
                                 @endphp
                                 @foreach ($permissionRoles as $permissionRole)
                                    <tr class="even pointer">
                                       <td class="text-center">
                                         <input type="checkbox" class="flat" name="permissions[]" value="{{$permissionRole->id}}">
                                       </td>
                                      <td class="text-center">{{++$no}}</td>
                                      <td class="text-center">{{$permissionRole->permission->label}}</td>
                                      <td class="text-center">{{$permissionRole->permission->name_permission}}</td>
                                      <td class="text-center">{{$permissionRole->created_at}}</td>
                                   </tr>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <td colspan="5">
                                    <button type="submit" name="button" class="btn btn-danger btn-block btn-sm" onclick="javasciprt: return confirm('Are you sure to delete permissions')"> <i class="fa fa-trash"></i> Delete Permission</button>
                                 </td>
                                 </tr>
                              </tfoot>
                           </table>
                        </form>
                          </div>
                       </div>
                       <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="table-responsive">
                            <form class="" action="{{url('permissionRoles')}}" method="post">
                               <input type="hidden" name="role" value="{{$role->id}}">
                               {{csrf_field()}}
                           <table id="datatable-fixed-header" class="table table-striped">
                              <thead>
                               <tr class="headings">
                                  <th></th>
                                  <th class="text-center">No </th>
                                  <th class="text-center">Label</th>
                                  <th class="text-center">Permission Name</th>
                                  <th class="text-center">Created at </th>
                               </tr>
                              </thead>

                              <tbody>
                                 @php
                                    $no = 0;
                                 @endphp
                                 @foreach ($permissions as $permission)
                                    <tr class="even pointer">
                                       <td class="text-center">
                                         <input type="checkbox" class="flat" name="permissions[]" value="{{$permission->id}}">
                                       </td>
                                      <td class="text-center">{{++$no}}</td>
                                      <td class="text-center">{{$permission->label}}</td>
                                      <td class="text-center">{{$permission->name_permission}}</td>
                                      <td class="text-center">{{$role->created_at}}</td>
                                   </tr>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <td colspan="5">
                                    <button type="submit" name="button" class="btn btn-primary btn-block btn-sm" onclick="javasciprt: return confirm('Are you sure to set this permissions')"> <i class="fa fa-save"></i> Set Permission</button>
                                 </td>
                                 </tr>
                              </tfoot>
                           </table>
                        </form>
                          </div>
                       </div>
                       <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          <form class="form-horizontal form-label-left" method="post" action="{{url('roles/'.$role->id)}}">
                             {{csrf_field()}}
                             <input type="hidden" name="_method" value="PUT">
                           <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$role->name}}">
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
