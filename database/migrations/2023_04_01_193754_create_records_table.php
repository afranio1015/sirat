<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->date('current_date');                    
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');
            $table->string('object');
            $table->string('interested');
            $table->foreignIdFor(Task::class)->references('id')->on('tasks')->onDelete('CASCADE');
            $table->integer('quantity');  
            $table->integer('total_points');           
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
            $table->dropForeignIdFor(User::class);           
        });
        Schema::dropIfExists('records');
    }
};
