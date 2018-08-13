@extends('layout/admin_container')
@section('content')
        <div class="card">
          <div class="card-header card-header-tabs card-header-info">
            <h4 class="card-title"><i class="material-icons">person</i> Users 
              <span class="pull-right">
                <a href="{{action('UsersController@create')}}" class="btn btn-sm btn-success"><i class="material-icons">add</i></a>
              </span>
            </h4>
          </div>
          <div class="card-body">
            @if (\Session::has('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ \Session::get('success') }}</strong>
              </div><br />
            @endif 
           <div style="overflow-x:auto;">
                <table class="datatable mdl-data-table mdl-shadow--2dp table-hovered responsive" cellspacing="0">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th class="mdl-data-table__cell--non-numeric">Username</th>
                        <th class="mdl-data-table__cell--non-numeric">Email</th>
                        <th class="mdl-data-table__cell--non-numeric">Role</th>
                        <th class="mdl-data-table__cell--non-numeric">Status</th>
                        <th class="mdl-data-table__cell--non-numeric">Last Login</th>
                        <th class="mdl-data-table__cell--non-numeric">Manage</th>
                      </tr>
                  </thead>
                </table>
              </div>
          </div>
        </div> 
@endsection
@section('datatable')
  <script type="text/javascript">
    $(document).ready(function() {
         $('.datatable').DataTable({
             processing: true,
             serverSide: true,
             rowId: 'id',
             ajax: '{{ url("users/show") }}',
             columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'role', name: 'role' },
                        { data: 'status', name: 'status' },
                        { data: 'last_login', name: 'last_login' },
                        { 
                          "render": function ( data, type, full, meta ) { 
                           return '<a href="/users/'+full.id+'/edit" class="btn btn-sm btn-warning"><i class="material-icons">edit</i></a><a href="#" onclick="deleteRecord('+full.id+');" class="btn btn-sm btn-danger"><i class="material-icons">close</i></a>';
                           }
                        }  
                     ]
         });
     });
   </script>
   <script type="text/javascript">
      function deleteRecord(id){
            bootbox.confirm({
                      message: "Are you sure you want to delete this user account?",
                      buttons: {
                          confirm: {
                              label: 'Yes',
                              className: 'btn-sm btn-success'
                          },
                          cancel: {
                              label: 'No',
                              className: 'btn-sm btn-danger'
                          }
                      },
                      callback: function (result) {
                          $.ajax({
                            type:"GET",
                            //url:"/users/delete/"+id,
                            success: function( msg ) {
                              if(result==true){
                                window.location.href = "/users/delete/"+id;
                              }
                            }
                          });

                      }
                  });
      }
  </script>
@endsection