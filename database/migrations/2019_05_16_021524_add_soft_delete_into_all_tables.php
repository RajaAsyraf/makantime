<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeleteIntoAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('group_member_invitations', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('group_restaurant', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('group_users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('invitations', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('invitation_users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('restaurants', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('group_member_invitations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('group_restaurant', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('group_users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('invitation_users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
