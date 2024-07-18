<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('product_details', 'qty') && Schema::hasColumn('product_details', 'qty_type')) {
            Schema::table('product_details', function (Blueprint $table) {
                $table->dropColumn("qty");
                $table->dropColumn("qty_type");
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable("product_details")) {
            Schema::table('product_details', function (Blueprint $table) {
                $table->string("qty")->after('name');
                $table->string("qty_type",50);
            });
        }

    }
};
