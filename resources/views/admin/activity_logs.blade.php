@extends('layout/admin_container')
@section('content')
        <div class="card">
          <div class="card-header card-header-tabs card-header-info">
            <h4 class="card-title"><i class="material-icons">find_in_page</i> Activity Logs 
              <span class="pull-right">
                <a href="#" onclick="clearLogs();" class="btn btn-sm btn-danger"><i class="material-icons">restore_from_trash</i></a>
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
                        <th>User ID</th>
                        <th>Affected Table</th>
                        <th>IP Address</th>
                        <th>Before</th>
                        <th>After</th>
                        <th>Event</th>
                        <th>Created At</th>
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
             ajax: '{{ url("activity_logs/load") }}',
             columns: [
                        { data: 'id', name: 'id' },
                        { data: 'user_id', name: 'user_id' },
                        { data: 'observable_type', name: 'observable_type' },
                        { data: 'ip_address', name: 'ip_address' },
                        { data: 'before', name: 'before' },
                        { data: 'after', name: 'after' },
                        { data: 'event', name: 'event' },
                        { data: 'created_at', name: 'created_at' }
                     ]
         });
     });
   </script>
   <script type="text/javascript">
      function clearLogs(){
            bootbox.confirm({
                      message: "This will clear all logs which are more than 30 days, do you want to proceed?",
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
                            success: function( msg ) {
                              if(result==true){
                                window.location.href = "/activity_logs/delete/0";
                              }
                            }
                          });
                      }
                  });
      }
  </script>
@endsection