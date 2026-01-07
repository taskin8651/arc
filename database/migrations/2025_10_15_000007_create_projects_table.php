<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('location')->nullable();
            $table->string('client_name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('conclusion')->nullable();
            $table->longText('video_url')->nullable();
            $table->string('year')->nullable();
            $table->string('site_area')->nullable();
            $table->string('project_space')->nullable();
            $table->string('total_manpower')->nullable();
            $table->string('estimate_cost')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
