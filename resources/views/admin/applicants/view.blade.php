<div class="panel-body">
    <br><br>
    <div class="card card-profile">
        <div class="card-avatar">
           <center><img src="{{ URL::asset('storage'.substr( $applicant->picture,6)) }}" style="width:200px;height:200px;"></center>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $applicant->lastname .", ". $applicant->firstname ." ". $applicant->middlename }}</h4>
            <?php
                $birthdate = new DateTime($applicant->birthdate);
                $now = new DateTime();
                $interval = $now->diff($birthdate);
                $applicant_age = $interval->y;
                echo $applicant->gender . " - " . $applicant_age . " years old";
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-header card-header-tabs card-header-info">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">Details:</span>
                    <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" href="#desired_jobs" data-toggle="tab">
                        <i class="material-icons">find_in_page</i> Desired Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#work_experience" data-toggle="tab">
                        <i class="material-icons">stars</i> Work Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#education_background" data-toggle="tab">
                        <i class="material-icons">extension</i> Education Background</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills" data-toggle="tab">
                        <i class="material-icons">accessibility_new</i> Skills</a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active show" id="desired_jobs">
                    <div style="overflow-x:auto;">
                        <table class='mdl-data-table mdl-shadow--2dp table-hovered responsive" cellspacing="0"' style="width:100%">
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Salary</th>
                            <th>Relocation?</th>
                            <?php 
                                $ctr=1;
                                foreach($desired_jobs_details as $row){
                                    echo "<tr>
                                            <td>".$ctr."</td>
                                            <td>".$row->title."</td>
                                            <td>".$row->type."</td>
                                            <td>".$row->salary."</td>
                                            <td>".$row->relocation."</td>
                                        </tr>";
                                    $ctr++;
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="work_experience">
                    <div style="overflow-x:auto;">
                        <table class='mdl-data-table mdl-shadow--2dp table-hovered responsive" cellspacing="0"' style="width:100%">
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Date Started</th>
                            <th>Date Ended</th>
                            <th>Description</th>
                            <?php 
                                $ctr=1;
                                foreach($work_experience_details as $row){
                                    echo "<tr>
                                            <td>".$ctr."</td>
                                            <td>".$row->job_title."</td>
                                            <td>".$row->company."</td>
                                            <td>".$row->country."</td>
                                            <td>".$row->city."</td>
                                            <td>".$row->start."</td>
                                            <td>".$row->end."</td>
                                            <td>".$row->description."</td>
                                        </tr>";
                                    $ctr++;
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="education_background">
                    <div style="overflow-x:auto;">
                        <table class='mdl-data-table mdl-shadow--2dp table-hovered responsive" cellspacing="0"' style="width:100%">
                            <th>#</th>
                            <th>Degree/Level</th>
                            <th>School/University</th>
                            <th>Field Of Study/Specialization</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Date Started</th>
                            <th>Date Ended</th>
                            <?php 
                                $ctr=1;
                                foreach($education_background_details as $row){
                                    echo "<tr>
                                            <td>".$ctr."</td>
                                            <td>".$row->degree."</td>
                                            <td>".$row->school."</td>
                                            <td>".$row->field_of_study."</td>
                                            <td>".$row->country."</td>
                                            <td>".$row->city."</td>
                                            <td>".$row->start."</td>
                                            <td>".$row->end."</td>
                                        </tr>";
                                    $ctr++;
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="skills">
                    <div style="overflow-x:auto;">
                        <table class='mdl-data-table mdl-shadow--2dp table-hovered responsive" cellspacing="0"' style="width:100%">
                            <th>#</th>
                            <th>Skill</th>
                            <th>Years of Experience</th>
                            <?php 
                                $ctr=1;
                                foreach($skills_details as $row){
                                    echo "<tr>
                                            <td>".$ctr."</td>
                                            <td>".$row->skill."</td>
                                            <td>".$row->years."</td>
                                        </tr>";
                                    $ctr++;
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</table>
</div>