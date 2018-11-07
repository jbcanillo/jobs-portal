@extends('layout/admin_container')
@section('content')
        <div class="card">
          <div class="card-header card-header-tabs card-header-info">
            <h4 class="card-title"><i class="material-icons">assignment</i> Job Requests 
              <span class="pull-right">
                <a href="{{action('RequestsController@create')}}" class="btn btn-sm btn-success"><i class="material-icons">add</i></a>
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
             ajax: '{{ url("requests/show") }}',
             columns: [
                        { data: 'id', name: 'id' },
                        { data: 'job_title', name: 'job_title' },
                        { data: 'company', name: 'company' },
                        { data: 'location', name: 'location' },
                        { data: 'type', name: 'type' },
                        { data: 'status', name: 'status' },
                        { 
                          "render": function ( data, type, full, meta ) { 
                           return '<a href="/requests/process/'+full.id+'" class="btn btn-sm btn-success"><i class="material-icons">search</i></a><a href="/requests/'+full.id+'/edit" class="btn btn-sm btn-warning"><i class="material-icons">edit</i></a><a href="#" onclick="deleteRecord('+full.id+');" class="btn btn-sm btn-danger"><i class="material-icons">close</i></a>';
                           }
                        }  
                     ],
                     dom: 'Bfrtip',
                      buttons: [
                          'copyHtml5',
                          'excelHtml5',
                          'csvHtml5',
                          'pdfHtml5'
                      ]
         });
     });
   </script>
   <script type="text/javascript">
      function deleteRecord(id){
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
                                window.location.href = "/requests/delete/"+id;
                              }
                            }
                          });
                      }
                  });
      }
  </script>
@endsection