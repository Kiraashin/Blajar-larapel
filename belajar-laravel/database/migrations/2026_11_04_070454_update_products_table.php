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
        Schema::table('products', function (Blueprint $table) {
            //
            if(Schema::hasColumn('products', 'stock')){
                $table->dropColumn('stock');
            }
            $table->string('slug')->nullable()->after('name');
            $table->integer('price_art_cartoon')->nullable()->after('price');
            $table->integer('price_art_paper')->nullable()->after('price_art_cartoon');
            $table->integer('price_hvs')->nullable()->after('price_art_paper');
            $table->integer('price_doft')->nullable()->after('price_hvs');
            $table->integer('price_glossy')->nullable()->after('price_doft');
            $table->integer('cutting_price')->nullable()->after('price_glossy');

            $table->text('brief_description')->nullable()->after('cutting_price');
            $table->text('description')->nullable()->after('brief_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'price_art_cartoon',
                'price_art_paper',
                'price_hvs',
                'price_doft',
                'price_glossy',
                'cutting_price',
                'brief_description',
                'description',
            ]);
            $table->tinyInteger('stock')->default(0)->after('name');
        });
    }
};
