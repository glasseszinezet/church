<div class="widget">
    <div class="widget-heading text-center {{ $panelBg }}"><h5>Personal Data</h5></div>
    <div class="widget-body">

        <div class="row">
            <div class="form-group col-md-4 text-center">
                {!! Form::label('firstName', 'First Name', array('class' => 'control-label')) !!}
                {!! Form::text('firstName', null, array('class' => 'form-control','placeholder' => 'Member First Name....', 'required', 'value' => '')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('lastName', 'Last Name', array('class' => 'control-label')) !!}
                {!! Form::text('lastName', null, array('class' => 'form-control','placeholder' => 'Member Last Name....', 'required')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('otherNames', 'Other Name(s)', array('class' => 'control-label')) !!}
                {!! Form::text('otherNames', null, array('class' => 'form-control','placeholder' => 'Member Other Name(s)....')) !!}
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4 text-center">
                {!! Form::label('gender', 'Gender', array('class' => 'control-label')) !!}
                {!! Form::select('gender',array('M' => "Male", 'F' => 'Female'),null,['class' => 'form-control','placeholder' => '--Select Member Gender--', 'required']) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('nationality', 'Nationality', array('class' => 'control-label')) !!}
                {!! Form::select('nationality',$countries,"gh",['class' => 'form-control','placeholder' => '--Select Member Nationality--', 'required']) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('age', 'Member Age', array('class' => 'control-label')) !!}
                {!! Form::number('age', null, array('class' => 'form-control','placeholder' => 'Member Age....', 'min' => 1, 'required')) !!}
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4 text-center">
                {!! Form::label('dateOfBirth', 'Date Of Birth', array('class' => 'control-label')) !!}
                {!! Form::text('dateOfBirth', null, array('class' => 'form-control datePickerInput disabled','placeholder' => 'Member date of Birth', 'required', 'pattern' => '\d{4}-\d{2}-\d{2}')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('placeOfBirth', 'Place Of Birth', array('class' => 'control-label')) !!}
                {!! Form::text('placeOfBirth', null, array('class' => 'form-control','placeholder' => 'Member place of Birth', 'required')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('homeTown', 'Home Town', array('class' => 'control-label')) !!}
                {!! Form::text('homeTown', null, array('class' => 'form-control','placeholder' => 'Member Home Town', 'required')) !!}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-md-4 text-center">
                {!! Form::label('phone', 'Phone Number', array('class' => 'control-label')) !!}
                {!! Form::tel('phone', null, array('class' => 'form-control','placeholder' => 'Primary Phone number e.g 0200000000', 'required', 'pattern' => '0(2|5)\d{8}')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('alternatePhone', 'Alternate Phone Number', array('class' => 'control-label')) !!}
                {!! Form::tel('alternatePhone', null, array('class' => 'form-control','placeholder' => 'Alternate Phone number e.g 0200000000', 'pattern' => '0(2|5)\d{8}')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('email', 'Email Address', array('class' => 'control-label')) !!}
                {!! Form::email('email', null, array('class' => 'form-control','placeholder' => 'Member E-mail Address', 'required')) !!}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-md-4 text-center">
                {!! Form::label('address', 'Address', array('class' => 'control-label')) !!}
                {!! Form::text('address', null, array('class' => 'form-control','placeholder' => 'Where does the member stay', 'required', 'max' => 200)) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('houseNumber', 'House Number', array('class' => 'control-label')) !!}
                {!! Form::text('houseNumber', null, array('class' => 'form-control','placeholder' => 'House Number','required', 'max' => 200)) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('suburb', 'Suburb/Area', array('class' => 'control-label')) !!}
                {!! Form::text('suburb', null, array('class' => 'form-control','placeholder' => 'Suburb or Area','required', 'max' => 200)) !!}
            </div>
        </div>

    </div>
    <div class="widget-heading text-center {{ $panelBg }}"><h5>Marriage And Family Data</h5></div>
    <div class="widget-body">

        <div class="row">
            <div class="form-group col-md-4 text-center">
                {!! Form::label('marriageStatus', 'Marriage Status', array('class' => 'control-label')) !!}
                {!! Form::select('marriageStatus',array('single' => 'single','married' => "married",'divorced' => "divorced",'widowed' => "widowed"),null,['class' => 'form-control','placeholder' => '--Marriage Status--', 'required']) !!}
            </div>
            <div class="form-group col-md-4 text-center">
                {!! Form::label('nameOfSpouse', 'Spouse Name', array('class' => 'control-label')) !!}
                {!! Form::text('nameOfSpouse', null , ((isset($member) && isset($member->marriageStatus) && $member->marriageStatus == "single") ? array('class' => 'form-control','readonly', 'disabled', 'placeholder' => 'Not required anymore because of you marital status') : array('class' => 'form-control','required', 'placeholder' => 'Spouse Name.....') )) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('spousePhone', 'Spouse Phone', array('class' => 'control-label')) !!}
                {!! Form::tel('spousePhone', null, ((isset($member) && isset($member->marriageStatus) && $member->marriageStatus == "single") ? array('class' => 'form-control', 'pattern' => '0(2|5)\d{8}','readonly', 'disabled', 'placeholder' => 'Not required anymore because of you marital status') : array('class' => 'form-control', 'pattern' => '0(2|5)\d{8}','required', 'placeholder' => 'Spouse\'s Phone Number') )) !!}
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4 text-center">
                {!! Form::label('fathersName', 'Father\'s Name', array('class' => 'control-label')) !!}
                {!! Form::text('fathersName',null,['class' => 'form-control','placeholder' => 'Father\'s Name ', 'required']) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('mothersName', 'Mother\'s Name', array('class' => 'control-label')) !!}
                {!! Form::text('mothersName',null,['class' => 'form-control','placeholder' => 'Mother\'s Name', 'required']) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('numberOfChildren', 'Number Of Children', array('class' => 'control-label')) !!}
                {!! Form::number('numberOfChildren', 0, array('class' => 'form-control','placeholder' => 'Number Of Children', 'min' => 0)) !!}
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12 text-center">
                {!! Form::label('nextOfKin', 'Next Of Kin', array('class' => 'control-label')) !!}
                {!! Form::text('nextOfKin', null, array('class' => 'form-control','placeholder' => 'Member Next Of Kin', 'required')) !!}
            </div>
        </div>


    </div>

    <div class="widget-heading text-center {{ $panelBg }}"><h5>Other Church Information</h5></div>
    <div class="widget-body">

        <div class="row">
            <div class="form-group col-md-4 text-center">
                {!! Form::label('status', 'Member Status', array('class' => 'control-label')) !!}
                {!! Form::select('status',array('active' => 'active','inactive' => 'inactive'),null,['class' => 'form-control','placeholder' => '--Select Member Status--', 'required']) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('dateConfirmed', 'Confirmation Date', array('class' => 'control-label')) !!}
                {!! Form::text('dateConfirmed', null, array('class' => 'form-control datePickerInput','placeholder' => 'When Was the member Confirmed', 'required', 'pattern' => '\d{4}-\d{2}-\d{2}')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('dateBaptized', 'Date Baptised', array('class' => 'control-label')) !!}
                {!! Form::text('dateBaptized',null,['class' => 'form-control datePickerInput','placeholder' => 'When was the member baptised', 'required', 'pattern' => '\d{4}-\d{2}-\d{2}']) !!}
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-4 text-center">
                {!! Form::label('dateMemberJoinedChurch', 'Date Member Joined Church', array('class' => 'control-label')) !!}
                {!! Form::text('dateMemberJoinedChurch', null, array('class' => 'form-control datePickerInput','placeholder' => 'When did the member join the church', 'pattern' => '\d{4}-\d{2}-\d{2}', 'required')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('confirmationMinister', 'Rev Minister - Confirmation ', array('class' => 'control-label')) !!}
                {!! Form::text('confirmationMinister', null, array('class' => 'form-control','placeholder' => 'Which Rev. Minister Baptised the member', 'required')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('baptismMinister', 'Rev Minister - Baptism', array('class' => 'control-label')) !!}
                {!! Form::text('baptismMinister',null,['class' => 'form-control','placeholder' => 'Which Rev. Minister Baptized the member', 'required']) !!}
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4 text-center">
                    {!! Form::label('positionInChurch', 'Position - Church ', array('class' => 'control-label')) !!}
                    {!! Form::select('positionInChurch',$positions, null, array('class' => 'form-control','placeholder' => 'What Position does the member hold in the church', 'required')) !!}
                </div>

                <div class="form-group col-md-4 text-center">
                    {!! Form::label('confirmationLocation', 'Location - Confirmation', array('class' => 'control-label')) !!}
                    {!! Form::text('confirmationLocation',null,['class' => 'form-control','placeholder' => 'Where was the member confirmed', 'required']) !!}
                </div>

                <div class="form-group col-md-4 text-center">
                    {!! Form::label('baptismLocation', 'Location - Baptism', array('class' => 'control-label')) !!}
                    {!! Form::text('baptismLocation',null,['class' => 'form-control','placeholder' => 'where was the member baptised', 'required']) !!}
                </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12 text-center">
                {!! Form::label('churchGroups', 'Church Groups', array('class' => 'control-label')) !!}
                {!! Form::select('churchGroups[]', $groups,(isset($member) && $member->groups()->count() > 0  ? $member->groups()->pluck('id')->toArray() :  null), array('class' => 'form-control select2Field', 'multiple', 'select2Placeholder' => 'Select Groups Member belongs to')) !!}
            </div>
        </div>


    </div>

    <div class="widget-heading text-center {{ $panelBg }}"><h5>Occupation Data</h5></div>
    <div class="widget-body">

        <div class="row">
            <div class="form-group col-md-4 text-center">
                {!! Form::label('occupation', 'Occupation', array('class' => 'control-label')) !!}
                {!! Form::text('occupation', null ,['class' => 'form-control','placeholder' => 'What work does the Member Do ?', 'required']) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('workPhone', 'Work Phone', array('class' => 'control-label')) !!}
                {!! Form::tel('workPhone', null, array('class' => 'form-control','placeholder' => 'work phone phone number e.g 0200000000' , 'required', 'pattern' => '0(2|5)\d{8}')) !!}
            </div>

            <div class="form-group col-md-4 text-center">
                {!! Form::label('employerAddress', 'Work Address', array('class' => 'control-label')) !!}
                {!! Form::text('employerAddress',null,['class' => 'form-control','placeholder' => 'Where is the work place located', 'required']) !!}
            </div>

        </div>
    </div>

    <div class="form-group">
        {!! Form::submit($submitButtonText,['class' => $btnClass.' form-control']) !!}
    </div>
</div>
