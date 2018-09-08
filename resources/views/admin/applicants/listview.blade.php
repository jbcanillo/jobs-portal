@extends('layout/admin_container')
@section('content')
        <div class="card">
          <div class="card-header card-header-tabs card-header-info">
            <h4 class="card-title"><i class="material-icons">assignment_ind</i> Applicants 
              <span class="pull-right">
                <a href="{{action('ApplicantsController@create')}}" class="btn btn-sm btn-success"><i class="material-icons">add</i></a>
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
                        <th class="mdl-data-table__cell--non-numeric">Lastname</th>
                        <th class="mdl-data-table__cell--non-numeric">Firstname</th>
                        <th class="mdl-data-table__cell--non-numeric">Middlename</th>
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
             ajax: '{{ url("applicants/show") }}',
             columns: [
                        { data: 'id', name: 'id' },
                        { data: 'lastname', name: 'lastname' },
                        { data: 'firstname', name: 'firstname' },
                        { data: 'middlename', name: 'middlename' },
                        { data: 'status', name: 'status' },
                        { 
                          "render": function ( data, type, full, meta ) { 
                           return '<a href="/applicants/'+full.id+'/edit" class="btn btn-sm btn-warning"><i class="material-icons">edit</i></a><a href="#" onclick="deleteRecord('+full.id+');" class="btn btn-sm btn-danger"><i class="material-icons">close</i></a>';
                           }
                        }  
                     ]
         });
     });
   </script>
   <script type="text/javascript">
      function deleteRecord(id){
            bootbox.confirm({
                      message: "Are you sure you want to delete this applicant record?",
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
                                window.location.href = "/applicants/delete/"+id;
                              }
                            }
                          });
                      }
                  });
      }
  </script>
@endsection