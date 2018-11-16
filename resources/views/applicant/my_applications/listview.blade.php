@extends('layout/applicant_container')
@section('content')
        <div class="card">
          <div class="card-header card-header-tabs card-header-info">
            <h4 class="card-title"><i class="material-icons">file_copy</i> My Applications</h4>
          </div>
          <div class="card-body">
           <div style="overflow-x:auto;">
                <table class="datatable mdl-data-table mdl-shadow--2dp table-hovered responsive" cellspacing="0">
                  <thead>
                      <tr>
                        <th class="mdl-data-table__cell--non-numeric">Job Title</th>
                        <th class="mdl-data-table__cell--non-numeric">Company</th>
                        <th class="mdl-data-table__cell--non-numeric">Location</th>
                        <th class="mdl-data-table__cell--non-numeric">Type</th>
                        <th class="mdl-data-table__cell--non-numeric">No. of Applicants</th>
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
             ajax: '{{ url("applicant/my_applications/show/x") }}',
             columns: [
                        { data: 'job_title', name: 'job_title' },
                        { data: 'company', name: 'company' },
                        { data: 'location', name: 'location' },
                        { data: 'type', name: 'type' },
                        { data: 'number_applicants', name: 'number_applicants' },
                        { data: 'application_status', name: 'application_status' },
                        { 
                          "render": function ( data, type, full, meta ) { 
                           return '<a href="my_applications/show/'+full.id+'" class="btn btn-sm btn-primary"><i class="material-icons">update</i></a>';
                           }
                        }  
                     ]
         });
     });
   </script>
@endsection