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
        Schema::create('setting_invitation', function (Blueprint $table) {
            $table->id();
            $table->string('invitation_name', 255);
            $table->string('bride_fullname', 255);
            $table->string('groom_fullname', 255);
            $table->string('bride_nickname', 100);
            $table->string('groom_nickname', 100);
            $table->string('bride_instagram', 100)->nullable();
            $table->string('groom_instagram', 100)->nullable();
            $table->string('bride_father_name', 255);
            $table->string('bride_mother_name', 255);
            $table->string('groom_father_name', 255);
            $table->string('groom_mother_name', 255);
            $table->integer('bride_child_number')->unsigned();
            $table->integer('groom_child_number')->unsigned();
            $table->string('quotes_source', 255)->nullable();
            $table->text('quotes_content')->nullable();
            $table->string('akad_day', 50);
            $table->date('akad_date');
            $table->string('akad_clock', 50);
            $table->string('akad_venue', 255);
            $table->text('akad_address');
            $table->string('akad_maps', 255)->nullable();
            $table->string('resepsi_day', 50);
            $table->date('resepsi_date');
            $table->string('resepsi_clock', 50);
            $table->string('resepsi_venue', 255);
            $table->text('resepsi_address');
            $table->string('resepsi_maps', 255)->nullable();
            $table->text('maps_iframe')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_invitation');
    }
};
