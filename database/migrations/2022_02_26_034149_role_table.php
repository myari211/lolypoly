<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('98_role', function (Blueprint $table) {
            $table->string('id', 40)->primary()->index();
            $table->string('name');
            $table->string('created_by', 40);
            $table->string('updated_by', 40);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('98_user')->insert([
            'id' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            'email' => 'admin@feellas.id',
            'phone_number' => '081234567890',
            'type_user' => 'ADM',
            'password' => Hash::make('admin123'),
            'role_id' => '7be3a1aa-4049-11ec-9356-0242ac130003',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
        ]);

        DB::table('98_admin')->insert([
            'id' => 'c123wqe-4049-11ec-9356-0242ac130003',
            'name' => 'admin',
            'user_id' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
        ]);

        DB::table('98_role')->insert([
            'id' => '7be3a1aa-4049-11ec-9356-0242ac130003',
            'name' => 'Super Admin',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 'c4f913ac-4049-11ec-9356-0242ac130003',
            'updated_by' => 'c4f913ac-4049-11ec-9356-0242ac130003'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('98_role');
    }
}
