<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('status');
            $table->dateTimetz('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('nickname');
            $table->string('contact_number');
            $table->binary('profile_picture');
            $table->binary('resume_file');
            $table->boolean('resume_public');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_desired_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('title');
            $table->string('type');
            $table->double('salary');
            $table->string('relocation');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_work_experience', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('job_title');
            $table->string('company');
            $table->string('country');
            $table->string('city');
            $table->date('start');
            $table->date('end');
            $table->text('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_education_background', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('degree');
            $table->string('school');
            $table->string('field_of_study');
            $table->string('country');
            $table->string('city');
            $table->date('start');
            $table->date('end');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('skill');
            $table->integer('years');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->text('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_social_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('name');
            $table->string('link');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_military_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('country');
            $table->string('branch');
            $table->string('rank');
            $table->date('start');
            $table->date('end');
            $table->text('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('title');
            $table->date('date_awarded');
            $table->text('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->text('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_patents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('patent_number');
            $table->string('title');
            $table->string('url');
            $table->date('date_published');
            $table->text('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_publications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('title');
            $table->string('url');
            $table->date('date_published');
            $table->text('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_language', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('language');
            $table->string('status');
            $table->timestamps();
        });
        
        Schema::create('applicant_government_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('type');
            $table->string('doc_file');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('applicant_video_intro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->binary('video_file');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('nickname');
            $table->string('email')->unique();
            $table->string('company_name');
            $table->integer('company_size');
            $table->string('contact_person');
            $table->string('contact_number');
            $table->text('how');
            $table->string('status');
            $table->timestamps();
        });
        

        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id');
            $table->string('title');
            $table->string('company');
            $table->text('description');
            $table->string('location');
            $table->string('type');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('request_job_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id');
            $table->string('type');
            $table->double('minimum_salary');
            $table->double('maximum_salary');
            $table->integer('number_required_applicants');
            $table->text('remarks');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('request_applicant_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id');
            $table->integer('number_of_years_experience');
            $table->string('education_level');
            $table->string('license');
            $table->string('language');
            $table->text('remarks');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('job_matching', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('applicant_id');
            $table->integer('employer_id');
            $table->text('remarks');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('user_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('session_id');
            $table->string('line');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('customer_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('comments');
            $table->integer('rating');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('applicants');
        Schema::dropIfExists('applicant_desired_jobs');
        Schema::dropIfExists('applicant_work_experience');
        Schema::dropIfExists('applicant_education_background');
        Schema::dropIfExists('applicant_skills');
        Schema::dropIfExists('applicant_certifications');
        Schema::dropIfExists('applicant_social_links');
        Schema::dropIfExists('applicant_military_service');
        Schema::dropIfExists('applicant_awards');
        Schema::dropIfExists('applicant_organizations');
        Schema::dropIfExists('applicant_patents');
        Schema::dropIfExists('applicant_publications');
        Schema::dropIfExists('applicant_language');
        Schema::dropIfExists('applicant_government_documents');
        Schema::dropIfExists('applicant_video_intro');
        Schema::dropIfExists('employers');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('request_job_detail');
        Schema::dropIfExists('request_applicant_detail');
        Schema::dropIfExists('job_matching');
        Schema::dropIfExists('user_logs');
        Schema::dropIfExists('customer_reviews');
    }
}
