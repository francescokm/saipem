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
        \DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::statement($this->dropView());
    }

    private function createView(): string

    {

        return <<<SQL
            CREATE OR REPLACE VIEW view_all_company AS 
                SELECT 
                    x.company_code_1 code_1, x.company_name name_1, 
                    xx.company_code_2 code_2, xx.company_name name_2 
                FROM company_1 x, company_2 xx 
                WHERE xx.company_code_1 = x.company_code_1 AND x.company_code_1 = 'SP';        
            SQL;
    }

    private function dropView(): string
    {

        return <<<SQL
            DROP VIEW IF EXISTS `view_all_company`;
            SQL;

    }
};
