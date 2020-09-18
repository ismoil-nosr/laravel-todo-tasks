<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_task', function (Blueprint $table) {     
            $table->foreignId('task_id')
                  ->constrained('tasks')
                  ->onDelete('cascade');

            $table->foreignId('tag_id')
                  ->constrained('tags')
                  ->onDelete('cascade');

            $table->primary(['task_id', 'tag_id']);	
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_task');
    }
}
