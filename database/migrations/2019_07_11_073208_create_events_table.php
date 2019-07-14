<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->boolean("allDay")->default(false);
            $table->timestamp("start")->useCurrent();
            $table->timestamp("end")->nullable();
            $table->text("url")->nullable();
            $table->boolean("editable")->default(false);
            $table->boolean("startEditable")->default(false);
            $table->boolean("durationEditable")->default(false);
            $table->boolean("resourceEditable")->default(false);
            $table->boolean("overlap")->default(true);
            $table->string("backgroundColor")->default("#ff0000");
            $table->timestamps();
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
        Schema::dropIfExists('events');
    }
}
