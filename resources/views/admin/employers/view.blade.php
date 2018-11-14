<div class="panel-body">
    <br><br>
    <div class="card card-profile" style="background-color: white;">
        <div class="card-avatar">
            <?php if(isset($employer->picture)){ ?>
                <center><img src="{{ URL::asset('storage'.substr( $employer->picture,6)) }}" width="200px" height="200px"></center>
            <?php }else{ ?>
                <center><img src="{{ asset('img/no_pic.png') }}" width='200px' height='200px'></center><br><hr>
            <?php } ?>
        </div>
        <div class="card-body">
            <h3>{{ $employer->company_name }}</h3>
            <?php
                if($employer->nickname!=''){
                    $nickname = ' "'.$employer->nickname.'"';
                }else{
                    $nickname = '';
                }
            ?>
            <h4 class="card-title">{{ $employer->lastname .', '. $employer->firstname .' '. $employer->middlename . $nickname}}</h4>
            <label><b>About Us</b></label>
            <p class="card-description"><i>{{ $employer->about_me}}</i></p>
            <div style="overflow-x:auto">
                <table class="mdl-data-table mdl-js-data-table mdl-data-table-default-non-numeric" cellspacing="0" style="width:100%; text-align:left;">
                    <tr>
                        <td><b>Email Address:</b></td><td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td><b>Company Address:</b></td><td>{{ $employer->company_address }}</td>
                    </tr>
                    <tr>
                        <td><b>Company Size:</b></td><td>{{ $employer->company_size }} employees</td>
                    </tr>
                    <tr>
                        <td><b>Contact Person(s):</b></td><td>{{ $employer->contact_person }}</td>
                    </tr>
                    <tr>
                        <td><b>Contact Number:</b></td><td>{{ $employer->contact_number }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>