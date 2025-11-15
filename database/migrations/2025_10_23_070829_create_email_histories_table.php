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
         Schema::create('email_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->nullable()->constrained('email_templates')->onDelete('set null');
        
            $table->morphs('emailable'); // emailable_id, emailable_type

            $table->string('subject');
            $table->text('body');
            $table->json('attachments')->nullable();
            $table->enum('status', ['pending', 'sent', 'failed', 'queued'])->default('pending');
            $table->timestamp('sent_at')->nullable();

            $table->foreignId('sent_by')->nullable()->constrained('users')->onDelete('set null');

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_histories');
    }
};
