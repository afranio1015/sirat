<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Department;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('point');
            $table->foreignIdFor(Category::class)->references('id')->on('categories')->onDelete('CASCADE');
            $table->foreignIdFor(Department::class)->references('id')->on('departments')->onDelete('CASCADE');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function(Blueprint $table){
            $table->dropForeignIdFor(Category::class); 
            $table->dropForeignIdFor(Department::class);           
        });
        Schema::dropIfExists('tasks');
    }
};
