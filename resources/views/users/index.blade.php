@extends('layouts.admin')
@section('content')
   <div class="page-title">
     <div class="title_left">
       <h3>User <small>Some examples to get you started</small></h3>
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
    <div class="x_panel">
      <div class="x_title">
         <h2>Table design <small>Custom design</small></h2>
         <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
         </ul>
         <div class="clearfix"></div>
      </div>

      <div class="x_content">
         <div class="table-responsive">
          <table id="datatable-fixed-header" class="table table-striped">
             <thead>
              <tr class="headings">
                 <th class="text-center">No </th>
                 <th class="text-center">Name</th>
                 <th class="text-center">Email </th>
                 <th class="text-center">Role</th>
                 <th class="text-center">Created at </th>
                 <th class="text-center"><span class="nobr">Action</span>
                 </th>
                 <th class="bulk-actions" colspan="7">
                   <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                 </th>
              </tr>
             </thead>

             <tbody>
                @foreach ($users as $user)
                   <tr class="even pointer">
                     <td class="text-center">{{++$no}}</td>
                     <td class="text-center">{{$user->name}}</td>
                     <td class="text-center">{{$user->email}}</td>
                     <td class="text-center"></td>
                     <td class="text-center">{{$user->created_at}}</td>
                     <td class="text-center">
                        <a href="{{url('users', $user->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> </a>
                     </td>
                  </tr>
                @endforeach
             </tbody>
          </table>
         </div>
      </div>
    </div>
   </div>
@endsection
