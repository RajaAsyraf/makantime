<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsInInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('token');
            $table->dropColumn('is_going');
            $table->dropColumn('response_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('token');
            $table->boolean('is_going')->default(false);
            $table->timestamp('response_at')->nullable();
        });
    }
}
