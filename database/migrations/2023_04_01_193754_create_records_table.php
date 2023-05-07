<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;
use App\Models\Working_hour;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();            
            $table->foreignIdFor(Working_hour::class)->references('id')->on('working_hours')->onDelete('CASCADE');
            $table->string('object');
            $table->string('interested');
            $table->foreignIdFor(Task::class)->references('id')->on('tasks')->onDelete('CASCADE');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('records', function(Blueprint $table){
            $table->dropForeignIdFor(Task::class); 
            $table->dropForeignIdFor(Whorkin_hour::class);           
        });
        Schema::dropIfExists('records');
    }
};
