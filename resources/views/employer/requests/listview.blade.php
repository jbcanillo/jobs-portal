@extends('layout/employer_container')
@section('content')
        <div class="card">
          <div class="card-header card-header-tabs card-header-info">
            <h4 class="card-title"><i class="material-icons">assignment</i> Job Requests 
              <span class="pull-right">
                <a href="{{action('EmployersRequestController@create')}}" class="btn btn-sm btn-success"><i class="material-icons">add</i></a>
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
            @if (\Session::has('error'))
              <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ \Session::get('error') }}</strong>
              </div><br />
            @endif 
           <div style="overflow-x:auto;">
                <table class="datatable mdl-data-table mdl-shadow--2dp table-hovered responsive" cellspacing="0">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th class="mdl-data-table__cell--non-numeric">Title</th>
                        <th class="mdl-data-table__cell--non-numeric">Company</th>
                        <th class="mdl-data-table__cell--non-numeric">Location</th>
                        <th class="mdl-data-table__cell--non-numeric">Type</th>
                        <th class="mdl-data-table__cell--non-numeric">Status</th>
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
             ajax: '{{ url("/employer/requests/show") }}',
             columns: [
                        { data: 'id', name: 'id' },
                        { data: 'job_title', name: 'job_title' },
                        { data: 'company', name: 'company' },
                        { data: 'location', name: 'location' },
                        { data: 'type', name: 'type' },
                        { data: 'status', name: 'status' },
                        { 
                          "render": function ( data, type, full, meta ) { 
                           return '<a href="/employer/requests/show/'+full.id+'" class="btn btn-sm btn-default"><i class="material-icons">visibility</i></a><a href="#" onclick="editRecord('+full.id+',\''+full.status+'\');" class="btn btn-sm btn-warning"><i class="material-icons">edit</i></a><a href="#" onclick="deleteRecord('+full.id+',\''+full.status+'\');" class="btn btn-sm btn-danger"><i class="material-icons">close</i></a>';
                           }
                        }  
                     ]
         });
     });
   </script>
   <script type="text/javascript">
      function deleteRecord(id,status){
        if(status=="Open"){
            bootbox.confirm({
                      message: "Are you sure you want to delete this request?",
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
                                window.location.href = "/employer/requests/delete/"+id;
                              }
                            }
                          });
                      }
                  });
        }else{
          bootbox.alert({
                        message: "You cannot delete this record if the status is no longer 'Open'.",
                        size: 'small'
                    });
        }
      }
      function editRecord(id,status){
        if(status=="Open"){
          window.location.href = "/employer/requests/"+id+"/edit";
        }else{
          bootbox.alert({
                        message: "You cannot edit this record if the status is no longer 'Open'.",
                        size: 'small'
                    });
        }
      }
  </script>
@endsection