<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('p_id');
            $table->string('title',100);
            $table->string('weight',10);
            $table->string('unit',10);
            $table->text('description');
            $table->string('file1',255);
            $table->string('file2',255);
            $table->string('file3',255);
            $table->string('file4',255);
            $table->boolean('availability')->nullable();
            $table->string('code',50);
            $table->enum('status', ['Active', 'Disable']);
            $table->double('price', 8, 2);

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('cat_id')->on('categories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
